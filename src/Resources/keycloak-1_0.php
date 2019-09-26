<?php


return array(
    'name'        => 'Keycloak',
    'baseUri' => $config['baseUri'],
    'apiVersion'  => '1.0',
    'operations'  => array(

        //Users

        'createUser' => array(
            'uri' => 'auth/admin/realms/{realm}/users',
            'description' => 'Create a new user Username must be unique.',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                //UserRepresentation
                'access' => array(
                    'location'    => 'json',
                    'type'        => 'object',
                    'required'    => false,
                ),
                'attributes' => array(
                    'location'    => 'json',
                    'type'        => 'object',
                    'required'    => false,
                ),
                'clientConsents' => array(
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => false,
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'clientId' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required'    => false,
                            ),
                            'createdDate' => array(
                                'location' => 'json',
                                'type' => 'integer',
                                'required'    => false,
                            ),
                            'grantedClientScopes' => array(
                                'location' => 'json',
                                'type' => 'array',
                                'required'    => false,
                            ),
                            'lastUpdatedDate' => array(
                                'location' => 'json',
                                'type' => 'integer',
                                'required'    => false,
                            )
                        )
                    )
                ),
                'clientRoles' => array(
                    'location' => 'json',
                    'type' => 'object',
                    'required' => false
                ),
                'createdTimestamp' => array(
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false
                ),
                //CredentialRepresentation
                'credentials' => array(
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'algorithm' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required'    => false,
                            ),
                            //MultivaluedHashMap
                            'config' => array(
                                'location' => 'json',
                                'type' => 'object',
                                'required'    => false,
                                'properties' => array(
                                    'empty' => array(
                                        'location' => 'json',
                                        'type' => 'boolean',
                                        'required' => false
                                    ),
                                    'loadFactor' => array(
                                        'location' => 'json',
                                        'type' => 'number',
                                        'required' => false
                                    ),
                                    'threshold' => array(
                                        'location' => 'json',
                                        'type' => 'integer',
                                        'required' => false
                                    )
                                )
                            ),
                            'counter' => array(
                                'location' => 'json',
                                'type' => 'integer',
                                'required'    => false,
                            ),
                            'createdDate' => array(
                                'location' => 'json',
                                'type' => 'integer',
                                'required'    => false,
                            ),
                            'device' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required'    => false,
                            ),
                            'digits' => array(
                                'location' => 'json',
                                'type' => 'integer',
                                'required'    => false,
                            ),
                            'hashIterations' => array(
                                'location' => 'json',
                                'type' => 'integer',
                                'required'    => false,
                            ),
                            'hashedSaltedValue' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required'    => false,
                            ),
                            'period' => array(
                                'location' => 'json',
                                'type' => 'integer',
                                'required'    => false,
                            ),
                            'salt' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required'    => false,
                            ),
                            'temporary' => array(
                                'location' => 'json',
                                'type' => 'boolean',
                                'required'    => false,
                            ),
                            'type' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required'    => false,
                            ),
                            'value' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required'    => false,
                            )
                        )
                    )
                ),
                'disableableCredentialTypes' => array(
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false
                ),
                'email' => array(
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                ),
                'emailVerified' => array(
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false
                ),
                'enabled' => array(
                    'location' => 'json',
                    'type' => 'boolean',
                    'required' => false
                ),
                //FederatedIdentityRepresentation
                'federatedIdentities' => array(
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false,
                    'items' => array(
                        'type' => 'object',
                        'properties' => array(
                            'identityProvider' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required' => false
                            ),
                            'userId' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required' => false
                            ),
                            'userName' => array(
                                'location' => 'json',
                                'type' => 'string',
                                'required' => false
                            )
                        )
                    )
                ),
                'federationLink' => array(
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                ),
                'firstName' => array(
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                ),
                'groups' => array(
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false
                ),
                'id' => array(
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                ),
                'lastName' => array(
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                ),
                'notBefore' => array(
                    'location' => 'json',
                    'type' => 'integer',
                    'required' => false
                ),
                'origin' => array(
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                ),
                'realmRoles' => array(
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false
                ),
                'requiredActions' => array(
                    'location' => 'json',
                    'type' => 'array',
                    'required' => false
                ),
                'self' => array(
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                ),
                'serviceAccountId' => array(
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                ),
                'username' => array(
                    'location' => 'json',
                    'type' => 'string',
                    'required' => false
                )

            ),
        ),
        'getUsers' => array(
            'uri'         => 'auth/admin/realms/{realm}/users',
            'description' => 'Get users Returns a list of users, filtered according to query parameters',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'briefRepresentation' => array(
                    'location'    => 'query',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
                'email' => array(
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'first' => array(
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'firstName' => array(
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'lastName' => array(
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'max' => array(
                    'location'    => 'query',
                    'description' => 'Maximum results size (defaults to 100)',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'search' => array(
                    'location'    => 'query',
                    'description' => 'A String contained in username, first or last name, or email',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'username' => array(
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false,
                )
            ),
        ),
        'getUser' => array(
            'uri'         => 'auth/admin/realms/{realm}/users/{id}',
            'description' => 'Get representation of the user',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location' => 'uri',
                    'description' => 'User id',
                    'type' => 'string',
                    'required' => true
                )
            )
        ),
        //Clients
        'getClients' => array(
            'uri'         => 'auth/admin/realms/{realm}/clients',
            'description' => 'Get clients belonging to the realm Returns a list of clients belonging to the realm',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientId' => array(
                    'location'    => 'query',
                    'description' => 'filter by clientId',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'viewableOnly' => array(
                    'location'    => 'query',
                    'description' => 'filter clients that cannot be viewed in full by admin',
                    'type'        => 'boolean',
                    'required'    => false,
                )
            ),
        ),
    )
);