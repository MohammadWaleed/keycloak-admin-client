<?php

namespace Keycloak\Admin\Middleware;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Promise\RejectionException;
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

            return $this->refreshTokenIfNeeded($token, $options)->then(function (array $cred) use ($request, $handler, $options) {
                $this->tokenStorage->saveToken($cred);
                $request = $request->withHeader('Authorization', 'Bearer ' . $cred['access_token']);
                return $handler($request, $options);
            })->then(function (ResponseInterface $response) {
                if ($response->getStatusCode() >= 400) {
                    $this->tokenStorage->saveToken([]);
                }

                return $response;
            })->otherwise(function ($reason) {
                $this->tokenStorage->saveToken([]);
                throw $reason;
            });
        };
    }

    /**
     * Check we need to refresh token and refresh if needed
     *
     * @param ?array $credentials
     * @param $options
     * @return PromiseInterface
     */
    protected function refreshTokenIfNeeded($credentials, $options)
    {
        if (!is_array($credentials) || empty($credentials['access_token']) || empty($credentials['refresh_token'])) {
            return $this->getAccessToken($credentials, false, $options);
        }

        if (!$this->tokenExpired($credentials['access_token'])) {
            return new FulfilledPromise($credentials);
        }

        if ($this->tokenExpired($credentials['refresh_token'])) {
            return $this->getAccessToken($credentials, false, $options);
        }

        return $this->getAccessToken($credentials, true, $options);
    }

    /**
     * Get Access Token data
     *
     * @param string $token
     * @return array
     */
    public function getTokenPayload($token)
    {
        if (!is_string($token)) {
            return [];
        }

        $token = explode('.', $token);
        $token = base64_decode($token[1]);

        return json_decode($token, true);
    }

    /**
     * Check token expiration
     *
     * @param string $token
     * @return bool
     */
    public function tokenExpired($token) {
        $info = $this->getTokenPayload($token);
        $exp = $info['exp'] ?? 0;
        if (time() < $exp) {
            return false;
        }
        return true;
    }

    /**
     * Refresh access token
     *
     * @param array|null $credentials
     * @param $refresh
     * @param $options
     * @return PromiseInterface
     */
    public function getAccessToken($credentials, $refresh, $options)
    {
        if ($refresh && empty($credentials['refresh_token'])) {
            return new RejectedPromise("cannot refresh token when the 'refresh_token' is missing");
        }

        $url = "realms/{$options['realm']}/protocol/openid-connect/token";
        $clientId = $options["client_id"] ?? "admin-cli";
        $grantType = $refresh ? "refresh_token" : ($options["grant_type"] ?? "password");
        $params = [
            'client_id' => $clientId,
            'grant_type' => $grantType,
        ];

        if ($grantType === "refresh_token") {
            $params['refresh_token'] = $credentials['refresh_token'];
        } else if ($grantType === "password") {
            $params['username'] = $options['username'];
            $params['password'] = $options['password'];
        } else if ($grantType === "client_credentials") {
            $params['client_secret'] = $options['client_secret'];
        }

        if (!empty($options['client_secret'])) {
            $params['client_secret'] = $options['client_secret'];
        }

        $httpClient = new Client([
            'base_uri' => $options['baseUri'],
            'verify' => isset($options['verify']) ? $options['verify'] : true,
        ]);

        return $httpClient->requestAsync('POST', $url, ['form_params' => $params])->then(function (ResponseInterface $response) {
            if ($response->getStatusCode() !== 200) {
                throw new RejectionException('expected to receive http status code 200 when requesting a token');
            }

            $serializedToken = $response->getBody()->getContents();
            $token = json_decode($serializedToken, true);

            if (!$token) {
                throw new RejectionException('token returned in the response body is not in a valid json');
            }

            return $token;
        });
    }
}
