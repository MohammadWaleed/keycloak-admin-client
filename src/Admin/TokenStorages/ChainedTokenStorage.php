<?php

namespace Keycloak\Admin\TokenStorages;

class ChainedTokenStorage implements TokenStorage
{
    /**
     * @var array|TokenStorage[]
     */
    private $storages;

    public function __construct(TokenStorage ...$storages)
    {
        $this->storages = $storages;
    }

    public function getToken()
    {
        foreach ($this->storages as $storage) {
            $token = $storage->getToken();
            if ($token) {
                return $token;
            }
        }

        return null;
    }

    public function saveToken(array $token)
    {
        foreach ($this->storages as $storage) {
            $storage->saveToken($token);
        }
    }
}