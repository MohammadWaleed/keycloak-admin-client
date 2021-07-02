<?php

namespace Keycloak\Admin\TokenStorages;

class RuntimeTokenStorage implements TokenStorage
{
    /**
     * @var ?array
     */
    private $token = null;

    public function getToken()
    {
        return $this->token;
    }

    public function saveToken(array $token)
    {
        $this->token = $token;
    }
}