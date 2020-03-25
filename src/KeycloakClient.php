<?php

namespace Keycloak\Admin;

use Keycloak\Admin\Middleware\RefreshToken;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;

/**
 * Class KeycloakClient
 *
 * @package Keycloak\Admin\Client
 */
class KeycloakClient extends GuzzleClient
{

    /**
     * Factory to create new KeycloakClient instance.
     *
     * @param array $config
     *
     * @return \Keycloak\Admin\KeycloakClient
     */
    public static function factory($config = array())
    {
        $default = array(
            'username' => null,
            'password' => null,
            'realm'    => 'master',
            'version'  => '1.0',
            'baseUri' => null,
        );

        // Create client configuration
        $config = self::parseConfig($config, $default);

        $file = 'keycloak-' . str_replace('.', '_', $config['version']) . '.php';

        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());
        $stack->push(new RefreshToken());

        $config['handler'] = $stack;

        // Create the new Keycloak Client with our Configuration
        return new self(
            new Client($config),
            new Description(include __DIR__ . "/Resources/{$file}"),
            null,
            function ($arg) {
                return json_decode($arg->getBody(), true);
            },
            null,
            $config
        );
    }


    public function getCommand($name, array $params = [])
    {
        $params['realm'] = $this->getRealm();

        return parent::getCommand($name, $params);
    }

    /**
     * Sets the BaseUri used by the Keycloak Client
     *
     * @param string $baseUri
     */
    public function setBaseUri($baseUri)
    {
        $this->setConfig('baseUri', $baseUri);
    }
    /**
     * Sets the Realm name used by the Keycloak Client
     *
     * @param string $realm
     */
    public function getBaseUri()
    {
        $this->getConfig('baseUri');
    }


    /**
     * Sets the Realm name used by the Keycloak Client
     *
     * @param string $realm
     */
    public function setRealm($realm)
    {
        $this->setConfig('realm', $realm);
    }

    /**
     * Gets the Realm name being used by the Keycloak Client
     *
     * @return string|null Value of the realm or NULL
     */
    public function getRealm()
    {
        return $this->getConfig('realm');
    }

    /**
     * Sets the API Version used by the Keycloak Client.
     * Changing the API Version will attempt to load a new Service Definition for that Version.
     *
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->setConfig('version', $version);
    }

    /**
     * Gets the Version being used by the Keycloak Client
     *
     * @return string|null Value of the Version or NULL
     */
    public function getVersion()
    {
        return $this->getConfig('version');
    }


    /**
     * Attempt to parse config and apply defaults
     *
     * @param  array  $config
     * @param  array  $default
     *
     * @return array Returns the updated config array
     */
    protected static function parseConfig($config, $default)
    {
        array_walk($default, function ($value, $key) use (&$config) {
            if (empty($config[$key]) || !isset($config[$key])) {
                $config[$key] = $value;
            }
        });
        return $config;
    }
}
