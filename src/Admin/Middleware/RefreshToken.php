<?php

namespace Keycloak\Admin\Middleware;

use GuzzleHttp\Client;
use Keycloak\Admin\TokenStorages\TokenStorage;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RefreshToken
{
    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    public function __construct(TokenStorage $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            $token = $this->tokenStorage->getToken();
            $cred =  $this->refreshTokenIfNeeded($token, $options);
            $this->tokenStorage->saveToken($cred);
            $request = $request->withHeader('Authorization', 'Bearer ' . $cred['access_token']);
            return $handler($request, $options)->then(function (ResponseInterface $response) {
                if ($response->getStatusCode() >= 400) {
                    $this->tokenStorage->saveToken([]);
                }

                return $response;
            }, function ($reason) {
                $this->tokenStorage->saveToken([]);
                throw $reason;
            });
        };
    }

    /**
     * Check we need to refresh token and refresh if needed
     *
     * @param  array $credentials
     * @return array
     */
    protected function refreshTokenIfNeeded($credentials, $options)
    {
        if (!is_array($credentials) || empty($credentials['access_token']) || empty($credentials['refresh_token'])) {
            return $this->getAccessToken($credentials, false, $options);
        }

        $info = $this->parseAccessToken($credentials['access_token']);
        $exp = $info['exp'] ?? 0;

        if (time() < $exp) {
            return $credentials;
        }

        return $this->getAccessToken($credentials, true, $options);
    }

    /**
     * Get Access Token data
     *
     * @param string $token
     * @return array
     */
    public function parseAccessToken($token)
    {
        if (!is_string($token)) {
            return [];
        }

        $token = explode('.', $token);
        $token = base64_decode($token[1]);

        return json_decode($token, true);
    }

    /**
     * Refresh access token
     *
     * @param  string $refreshToken
     * @return array
     */
    public function getAccessToken($credentials, $refresh, $options)
    {
        if ($refresh && empty($credentials['refresh_token'])) {
            return [];
        }
        
        $url = "auth/realms/{$options['realm']}/protocol/openid-connect/token";
        $clientId = $options["client_id"] ?? "admin-cli";
        $grantType = $refresh ? "refresh_token" : ($options["grant_type"] ?? "password");
        $params = [
            'client_id' => $clientId,
            'grant_type' => $grantType,
        ];

        if ($grantType === "refresh_token") {
            $params['refresh_token'] = $credentials['refresh_token'];
        } else if ($grantType === "password"){
            $params['username'] = $options['username'];
            $params['password'] = $options['password'];
        } else if ($grantType === "client_credentials") {
            $params['client_secret'] = $options['client_secret'];
        }

        if (!empty($options['client_secret'])) {
            $params['client_secret'] = $options['client_secret'];
        }

        $token = [];

        try {
            $httpClient = new Client([
                'base_uri' => $options['baseUri'],
                'verify'   => isset($options['verify']) ? $options['verify'] : true,
            ]);
            $response = $httpClient->request('POST', $url, ['form_params' => $params]);

            if ($response->getStatusCode() === 200) {
                $token = $response->getBody()->getContents();
                $token = json_decode($token, true);
            }
        } catch (GuzzleException $e) {
            echo $e->getMessage();
        }

        return $token;
    }
}
