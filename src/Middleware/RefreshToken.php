<?php

namespace Keycloak\Admin\Client\Middleware;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;

class RefreshToken
{
    private  $token = null;

    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {

            $cred =  $this->refreshTokenIfNeeded($this->token, $options);
            $this->token = $cred;
            $request = $request->withHeader('Authorization', 'Bearer ' . $cred['access_token']);
            return $handler($request, $options);
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

        $credentials = $this->getAccessToken($credentials, true, $options);

        if (empty($credentials['access_token'])) {
            $this->credentials = null;
        }
        return $credentials;
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
        $url = "auth/realms/" . $options['realm'] . "/protocol/openid-connect/token";
        $params = [
            'client_id' => 'admin-cli',
            'grant_type' => $refresh ? 'refresh_token' : 'password',
        ];

        if ($refresh) {
            $params['refresh_token'] = $credentials['refresh_token'];
        } else {
            $params['username'] = $options['username'];
            $params['password'] = $options['password'];
        }

        if (!empty($options['client_secret'])) {
            $params['client_secret'] = $options['client_secret'];
        }

        $token = [];

        try {
            $httpClient = new Client(['base_uri' => $options['baseUri']]);
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
