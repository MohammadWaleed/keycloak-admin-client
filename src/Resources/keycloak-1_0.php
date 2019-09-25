<?php


return array(
    'name'        => 'Keycloak',
    'baseUri' => $config['baseUri'],
    'apiVersion'  => '1.0',
    'operations'  => array(
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