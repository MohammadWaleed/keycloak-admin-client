<?php

require 'Definitions/keycloak-1_0.php';

return array(
    'name'        => 'Keycloak',
    'baseUri' => $config['baseUri'],
    'apiVersion'  => '1.0',
    'operations'  => array(

        // Attack Detection

        'clearAllLoginFailures' => array(
            'uri' => 'admin/realms/{realm}/attack-detection/brute-force/users',
            'description' => 'Clear any user login failures for all users This can release temporary disabled users',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getBruteForceUserStatus' => array(
            'uri' => 'admin/realms/{realm}/attack-detection/brute-force/users/{userId}',
            'description' => 'Get status of a username in brute force detection',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'userId' => array(
                    'location' => 'uri',
                    'description' => 'User id',
                    'type' => 'string',
                    'required' => true
                )
            )
        ),

        'clearUserLoginFailures' => array(
            'uri' => 'admin/realms/{realm}/attack-detection/brute-force/users/{userId}',
            'description' => 'Clear any user login failures for the user This can release temporary disabled user',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'userId' => array(
                    'location' => 'uri',
                    'description' => 'User id',
                    'type' => 'string',
                    'required' => true
                )
            )
        ),

        // Authentication Management

        'getAuthenticatorProviders' => array(
            'uri' => 'admin/realms/{realm}/authentication/authenticator-providers',
            'description' => 'Get authenticator providers Returns a list of authenticator providers.',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientAuthenticatorProviders' => array(
            'uri' => 'admin/realms/{realm}/authentication/client-authenticator-providers',
            'description' => 'Get client authenticator providers Returns a list of client authenticator providers.',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getAuthenticatorConfigInfo' => array(
            'uri' => 'admin/realms/{realm}/authentication/config-description/{providerId}',
            'description' => 'Get authenticator provider’s configuration description',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'providerId' => array(
                    'location'    => 'uri',
                    'description' => 'The Provider ID',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getAuthenticatorConfig' => array(
            'uri' => 'admin/realms/{realm}/authentication/config/{id}',
            'description' => 'Get authenticator configuration',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Configuration ID',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateAuthenticatorConfig' => array(
            'uri' => 'admin/realms/{realm}/authentication/config/{id}',
            'description' => 'Update authenticator configuration',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Configuration ID',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $AuthenticatorConfigRepresentation
        ),

        'deleteAuthenticatorConfig' => array(
            'uri' => 'admin/realms/{realm}/authentication/config/{id}',
            'description' => 'Delete authenticator configuration',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Configuration ID',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'createAuthenticationExecution' => array(
            'uri' => 'admin/realms/{realm}/authentication/executions',
            'description' => 'Add new authentication execution',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $AuthenticationExecutionRepresentation
        ),

        'getAuthenticationExecution' => array(
            'uri' => 'admin/realms/{realm}/authentication/executions/{executionId}',
            'description' => 'Get Single Execution',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'executionId' => array(
                    'location'    => 'uri',
                    'description' => 'Execution Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'deleteAuthenticationExecution' => array(
            'uri' => 'admin/realms/{realm}/authentication/executions/{executionId}',
            'description' => 'Delete execution',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'executionId' => array(
                    'location'    => 'uri',
                    'description' => 'Execution Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateAuthenticationExecution' => array(
            'uri' => 'admin/realms/{realm}/authentication/executions/{executionId}',
            'description' => 'Update execution with new configuration',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'executionId' => array(
                    'location'    => 'uri',
                    'description' => 'Execution Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $AuthenticationExecutionRepresentation
        ),

        'lowerAuthenticationExecutionPriority' => array(
            'uri' => 'admin/realms/{realm}/authentication/executions/{executionId}/lower-priority',
            'description' => 'Lower execution’s priority',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'executionId' => array(
                    'location'    => 'uri',
                    'description' => 'Execution Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'raiseAuthenticationExecutionPriority' => array(
            'uri' => 'admin/realms/{realm}/authentication/executions/{executionId}/raise-priority',
            'description' => 'Raise execution’s priority',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'executionId' => array(
                    'location'    => 'uri',
                    'description' => 'Execution Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'createAuthenticationFlow' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows',
            'description' => 'Create a new authentication flow',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $AuthenticationFlowRepresentation
        ),

        'getAuthenticationFlows' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows',
            'description' => 'Get authentication flows Returns a list of authentication flows.',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'copyAuthenticationFlow' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows/{flowAlias}/copy',
            'description' => "Copy existing authentication flow under a new name The new name is given as 'newName' attribute of the passed JSON object",
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'flowAlias' => array(
                    'location'    => 'uri',
                    'description' => 'Name of the existing authentication flow',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'newName' => array(
                    'location' => 'json',
                    'description' => "New copy name",
                    'type' => 'string',
                    'required' => true
                ),
            )
        ),

        'getAuthenticationFlowExecutions' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows/{flowAlias}/executions',
            'description' => 'Get authentication executions for a flow',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'flowAlias' => array(
                    'location'    => 'uri',
                    'description' => 'Flow alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateAuthenticationFlowExecutions' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows/{flowAlias}/executions',
            'description' => 'Update authentication executions for a flow',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'flowAlias' => array(
                    'location'    => 'uri',
                    'description' => 'Flow alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $AuthenticationExecutionInfoRepresentation
        ),

        'createAuthenticationFlowExecution' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows/{flowAlias}/executions/execution',
            'description' => 'Add new authentication execution to a flow',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'flowAlias' => array(
                    'location'    => 'uri',
                    'description' => 'Alias of parent flow',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'provider' => array(
                    'location'    => 'json',
                    'description' => 'Provider Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        //I really don't know how this works, but it works
        'addAuthenticationFlowExecution' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows/{flowAlias}/executions/flow',
            'description' => 'Add new flow with new execution to existing flow',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'flowAlias' => array(
                    'location'    => 'uri',
                    'description' => 'Alias of parent authentication flow',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location' => 'json',
                    'description' => "Alias for new Flow / Execution",
                    'type' => 'string',
                    'required' => true
                ),
                'type' => array(
                    'location' => 'json',
                    'description' => "Child type Flow / Execution", // i really don't know about this i'm just speculating here
                    'type' => 'string',
                    'required' => true
                ),
                'provider' => array(
                    'location' => 'json',
                    'description' => "Provider",
                    'type' => 'string',
                    'required' => true
                ),
                'description' => array(
                    'location' => 'json',
                    'description' => "Description",
                    'type' => 'string',
                    'required' => false
                ),
            )
        ),

        'getAuthenticationFlow' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows/{id}',
            'description' => 'Get authentication flow for id',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Flow id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Keycloak gives an error when calling this api even when it's working fine
        'updateAuthenticationFlow' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows/{id}',
            'description' => 'Update authentication flow for id',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Flow id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $AuthenticationFlowRepresentation
        ),

        'deleteAuthenticationFlow' => array(
            'uri' => 'admin/realms/{realm}/authentication/flows/{id}',
            'description' => 'Delete an authentication flow',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Flow id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getFormActionProviders' => array(
            'uri' => 'admin/realms/{realm}/authentication/form-action-providers',
            'description' => 'Get form action providers Returns a list of form action providers.',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getFormProviders' => array(
            'uri' => 'admin/realms/{realm}/authentication/form-providers',
            'description' => 'Get form providers Returns a list of form providers.',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientsConfigDescriptions' => array(
            'uri' => 'admin/realms/{realm}/authentication/per-client-config-description',
            'description' => 'Get configuration descriptions for all clients',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        //If used incorrectly can break login, ok it can break even other apis be careful when using it
        'createRequiredAction' => array(
            'uri' => 'admin/realms/{realm}/authentication/register-required-action',
            'description' => 'Register a new required actions',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'providerId' => array(
                    'location'    => 'json',
                    'description' => 'Provider Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'name' => array(
                    'location'    => 'json',
                    'description' => 'Required action name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getRequiredActions' => array(
            'uri' => 'admin/realms/{realm}/authentication/required-actions',
            'description' => 'Get required actions Returns a list of required actions.',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getAliasRequiredAction' => array(
            'uri' => 'admin/realms/{realm}/authentication/required-actions/{alias}',
            'description' => 'Get required action for alias',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Alias of required action',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateRequiredAction' => array(
            'uri' => 'admin/realms/{realm}/authentication/required-actions/{alias}',
            'description' => 'Update required action',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Alias of required action',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $RequiredActionProviderRepresentation
        ),

        'deleteRequiredAction' => array(
            'uri' => 'admin/realms/{realm}/authentication/required-actions/{alias}',
            'description' => 'Delete required action',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Alias of required action',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'lowerRequiredActionPriority' => array(
            'uri' => 'admin/realms/{realm}/authentication/required-actions/{alias}/lower-priority',
            'description' => 'Lower required action’s priority',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Alias of required action',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'raiseRequiredActionPriority' => array(
            'uri' => 'admin/realms/{realm}/authentication/required-actions/{alias}/raise-priority',
            'description' => 'Raise required action’s priority',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Alias of required action',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getUnregisteredRequiredActions' => array(
            'uri' => 'admin/realms/{realm}/authentication/unregistered-required-actions',
            'description' => 'Get unregistered required actions Returns a list of unregistered required actions.',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Client Attribute Certificate

        'getClientKeyInfo' => array(
            'uri' => 'admin/realms/{realm}/clients/{id}/certificates/{attr}',
            'description' => 'Get key info',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'attr' => array(
                    'location'    => 'uri',
                    'description' => 'attribute prefix', // one acceptable value is jwt.credential
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientKeyStore' => array(
            'uri' => 'admin/realms/{realm}/clients/{id}/certificates/{attr}/download',
            'description' => 'Get a keystore file for the client, containing private key and public certificate',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'attr' => array(
                    'location'    => 'uri',
                    'description' => 'attribute prefix', // one acceptable value is jwt.credential
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $KeyStoreConfig
        ),

        'generateClientCertificate' => array(
            'uri' => 'admin/realms/{realm}/clients/{id}/certificates/{attr}/generate',
            'description' => 'Generate a new certificate with new key pair',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'attr' => array(
                    'location'    => 'uri',
                    'description' => 'attribute prefix', // one acceptable value is jwt.credential
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'generateDownloadClientCertificate' => array(
            'uri' => 'admin/realms/{realm}/clients/{id}/certificates/{attr}/generate-and-download',
            'description' => 'Generate a new keypair and certificate, and get the private key file Generates a keypair and certificate and serves the private key in a specified keystore format.',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'attr' => array(
                    'location'    => 'uri',
                    'description' => 'attribute prefix', // one acceptable value is jwt.credential
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $KeyStoreConfig
        ),

        // need to tell Keycloak team about this, it's not mentioned in the documentation
        'uploadClientCertificateAndPrivateKey' => array(
            'uri' => 'admin/realms/{realm}/clients/{id}/certificates/{attr}/upload',
            'description' => 'Upload certificate and eventually private key',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'attr' => array(
                    'location'    => 'uri',
                    'description' => 'attribute prefix', // one acceptable value is jwt.credential
                    'type'        => 'string',
                    'required'    => true,
                ),
                'file' => array(
                    'location'    => 'multipart',
                    'description' => 'new certificate and private key',
                    'required'    => true,
                ),
                'keystoreFormat' => array(
                    'location'    => 'multipart',
                    'description' => 'Certificate format (Certificate PEM , Public Key PEM , JSON Web Key Set , JKS)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'keyAlias' => array(
                    'location'    => 'multipart',
                    'description' => 'Key Alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'keyPassword' => array(
                    'location'    => 'multipart',
                    'description' => 'Key Password',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'storePassword' => array(
                    'location'    => 'multipart',
                    'description' => 'Store Password',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // need to tell Keycloak team about this, it's not mentioned in the documentation
        'uploadClientCertificateOnly' => array(
            'uri' => 'admin/realms/{realm}/clients/{id}/certificates/{attr}/upload-certificate',
            'description' => 'Upload only certificate, not private key',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'attr' => array(
                    'location'    => 'uri',
                    'description' => 'attribute prefix', // one acceptable value is jwt.credential
                    'type'        => 'string',
                    'required'    => true,
                ),
                'file' => array(
                    'location'    => 'multipart',
                    'description' => 'new certificate and private key',
                    'required'    => true,
                ),
                'keystoreFormat' => array(
                    'location'    => 'multipart',
                    'description' => 'Certificate format (Certificate PEM , Public Key PEM , JSON Web Key Set , JKS)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'keyAlias' => array(
                    'location'    => 'multipart',
                    'description' => 'Key Alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'keyPassword' => array(
                    'location'    => 'multipart',
                    'description' => 'Key Password',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'storePassword' => array(
                    'location'    => 'multipart',
                    'description' => 'Store Password',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Client Initial Access

        'createClientInitialAccessToken' => array(
            'uri' => 'admin/realms/{realm}/clients-initial-access',
            'description' => 'Create a new initial access token.',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ClientInitialAccessCreatePresentation
        ),

        'getClientInitialAccessTokens' => array(
            'uri' => 'admin/realms/{realm}/clients-initial-access',
            'description' => 'Get client initial access tokens.',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'deleteClientInitialAccessToken' => array(
            'uri' => 'admin/realms/{realm}/clients-initial-access/{id}',
            'description' => 'Delete client initial access token.',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Client Registration Policy

        'getClientRegistrationPolicyProviders' => array(
            'uri' => 'admin/realms/{realm}/client-registration-policy/providers',
            'description' => 'Base path for retrieve providers with the configProperties properly filled',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Client Role Mappings

        'addGroupClientRoleMappings' => array(
            'uri' => 'admin/realms/{realm}/groups/{id}/role-mappings/clients/{client}',
            'description' => 'Add client-level roles to the group role mapping',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getGroupClientRoleMappings' => array(
            'uri' => 'admin/realms/{realm}/groups/{id}/role-mappings/clients/{client}',
            'description' => 'Get client-level role mappings for the group, and the app',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'deleteGroupClientRoleMappings' => array(
            'uri' => 'admin/realms/{realm}/groups/{id}/role-mappings/clients/{client}',
            'description' => 'Delete client-level roles from group role mapping',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getAvailableGroupClientRoleMappings' => array(
            'uri' => 'admin/realms/{realm}/groups/{id}/role-mappings/clients/{client}/available',
            'description' => 'Get available client-level roles that can be mapped to the group',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getGroupClientRoleMappingsWithComposite' => array(
            'uri' => 'admin/realms/{realm}/groups/{id}/role-mappings/clients/{client}/composite',
            'description' => 'Get effective client-level role mappings This recurses any composite roles for groups',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'addUserClientRoleMappings' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/role-mappings/clients/{client}',
            'description' => 'Add client-level roles to the user role mapping ',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getUserClientRoleMappings' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/role-mappings/clients/{client}',
            'description' => 'Get client-level role mappings for the user, and the app',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'deleteUserClientRoleMappings' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/role-mappings/clients/{client}',
            'description' => 'Delete client-level roles from user role mapping',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getAvailableUserClientRoleMappings' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/role-mappings/clients/{client}/available',
            'description' => 'Get available client-level roles that can be mapped to the user',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getUserClientRoleMappingsWithComposite' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/role-mappings/clients/{client}/composite',
            'description' => 'Get effective client-level role mappings This recurses any composite roles for users',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Client Scopes

        'createClientScope' => array(
            'uri' => 'admin/realms/{realm}/client-scopes',
            'description' => 'Create a new client scope Client Scope’s name must be unique!',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ClientScopeRepresentation
        ),

        'getClientScopes' => array(
            'uri' => 'admin/realms/{realm}/client-scopes',
            'description' => 'Get client scopes belonging to the realm Returns a list of client scopes belonging to the realm',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientScope' => array(
            'uri' => 'admin/realms/{realm}/client-scopes/{id}',
            'description' => 'Get representation of the client scope',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateClientScope' => array(
            'uri' => 'admin/realms/{realm}/client-scopes/{id}',
            'description' => 'Update the client scope',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ClientScopeRepresentation
        ),

        'deleteClientScope' => array(
            'uri' => 'admin/realms/{realm}/client-scopes/{id}',
            'description' => 'Delete the client scope',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Clients

        'createClient' => array(
            'uri'         => 'admin/realms/{realm}/clients',
            'description' => 'Create a new client Client’s client_id must be unique!',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ClientRepresentation
        ),

        'getClients' => array(
            'uri'         => 'admin/realms/{realm}/clients',
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

        'getClient' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}',
            'description' => 'Get representation of the client',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'updateClient' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}',
            'description' => 'Update the client',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ClientRepresentation
        ),

        'deleteClient' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}',
            'description' => 'Delete the client',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'generateClientSecret' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/client-secret',
            'description' => 'Generate a new secret for the client',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientSecret' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/client-secret',
            'description' => 'Get the client secret',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientDefaultScopes' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/default-client-scopes',
            'description' => 'Get default client scopes.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'setClientScopeAsDefault' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/default-client-scopes/{clientScopeId}',
            'description' => 'Set client scope as default scope',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'Client Scope Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'removeClientScopeAsDefault' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/default-client-scopes/{clientScopeId}',
            'description' => 'Remove client scope from default scopes ',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'Client Scope Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientExampleAccessToken' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/evaluate-scopes/generate-example-access-token',
            'description' => 'Create JSON with payload of example access token',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'scope' => array(
                    'location'    => 'query',
                    'description' => 'Scope',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'userId' => array(
                    'location'    => 'query',
                    'description' => 'User Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientProtocolMappers' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/evaluate-scopes/protocol-mappers',
            'description' => 'Return list of all protocol mappers, which will be used when generating tokens issued for particular client.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'scope' => array(
                    'location'    => 'query',
                    'description' => 'Scope',
                    'type'        => 'string',
                    'required'    => false,
                ),
            )
        ),

        'getClientAllowedRoleMappingsInContainer' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/evaluate-scopes/scope-mappings/{roleContainerId}/granted',
            'description' => 'Get effective scope mapping of all roles of particular role container, which this client is defacto allowed to have in the accessToken issued for him.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roleContainerId' => array(
                    'location'    => 'uri',
                    'description' => 'either realm name OR client UUID',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'scope' => array(
                    'location'    => 'query',
                    'description' => 'Scope',
                    'type'        => 'string',
                    'required'    => false,
                ),
            )
        ),

        'getClientNotAllowedRoleMappingsInContainer' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/evaluate-scopes/scope-mappings/{roleContainerId}/not-granted',
            'description' => 'Get roles, which this client doesn’t have scope for and can’t have them in the accessToken issued for him.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roleContainerId' => array(
                    'location'    => 'uri',
                    'description' => 'either realm name OR client UUID',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'scope' => array(
                    'location'    => 'query',
                    'description' => 'Scope',
                    'type'        => 'string',
                    'required'    => false,
                ),
            )
        ),

        'getClientInstallationConfiguration' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/installation/providers/{providerId}',
            'description' => 'Generate client adapter configuration takes one of these (keycloak-oidc-keycloak-json, keycloak-oidc-jboss-subsystem-cli, keycloak-oidc-jboss-subsystem, keycloak-saml, keycloak-saml-subsystem-cli, keycloak-saml-subsystem) ',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'providerId' => array(
                    'location'    => 'uri',
                    'description' => 'Provider Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientAuthorizationPermissionsStatus' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/management/permissions',
            'description' => 'Return object stating whether client Authorization permissions have been initialized or not and a reference',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateClientAuthorizationPermissionsStatus' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/management/permissions',
            'description' => 'Update client Authorization permissions  initialization and a reference',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ManagementPermissionReference
        ),

        'registerClientClusterNode' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/nodes',
            'description' => 'Register a cluster node with the client Manually register cluster node to this client - usually it’s not needed to call this directly as adapter should handle by sending registration request to Keycloak',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'node' => array(
                    'location' => 'json',
                    'description' => "New node host",
                    'type' => 'string',
                    'required' => true
                ),
            )
        ),

        'unregisterClientClusterNode' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/nodes/{node}',
            'description' => 'Unregister a cluster node from the client ',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'node' => array(
                    'location' => 'uri',
                    'description' => "Node host",
                    'type' => 'string',
                    'required' => true
                ),
            )
        ),

        'getClientOfflineSessionsCount' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/offline-session-count',
            'description' => 'Get application offline session count Returns a number of offline user sessions associated with this client { "count": number }',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientOfflineSessions' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/offline-sessions',
            'description' => 'Get offline sessions for client Returns a list of offline user sessions associated with this client',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'first' => array(
                    'location'    => 'query',
                    'description' => 'Paging offset',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'max' => array(
                    'location'    => 'query',
                    'description' => 'Maximum results size (defaults to 100)',
                    'type'        => 'integer',
                    'required'    => false,
                ),
            )
        ),

        'getClientOptionalScopes' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/optional-client-scopes',
            'description' => 'Get optional client scopes.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'assignClientOptionalScope' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/optional-client-scopes/{clientScopeId}',
            'description' => 'Assign client optional scope',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'Client Scope Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'unassignClientOptionalScope' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/optional-client-scopes/{clientScopeId}',
            'description' => 'remove client optional scope assignment',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'Client Scope Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'pushClientRevocationPolicy' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/push-revocation',
            'description' => 'Push the client’s revocation policy to its admin URL If the client has an admin URL, push revocation policy to it.',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'generateClientRegistrationToken' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/registration-access-token',
            'description' => 'Generate a new registration access token for the client',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getServiceAccountDedicatedUser' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/service-account-user',
            'description' => 'Get a user dedicated to the service account',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientSessionsCount' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/session-count',
            'description' => 'Get application session count Returns a number of user sessions associated with this client { "count": number } ',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'testClientNodesAvailability' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/test-nodes-available',
            'description' => "Test if registered cluster nodes are available Tests availability by sending 'ping' request to all cluster nodes.",
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientSessions' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/user-sessions',
            'description' => 'Get user sessions for client Returns a list of user sessions associated with this client',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Component

        'createComponent' => array(
            'uri'         => 'admin/realms/{realm}/components',
            'description' => 'Create new component',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ComponentRepresentation
        ),

        'getComponents' => array(
            'uri'         => 'admin/realms/{realm}/components',
            'description' => 'Get components',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getComponent' => array(
            'uri'         => 'admin/realms/{realm}/components/{id}',
            'description' => 'Get component',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Component id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateComponent' => array(
            'uri'         => 'admin/realms/{realm}/components/{id}',
            'description' => 'Update component',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Component id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ComponentRepresentation
        ),

        'deleteComponent' => array(
            'uri'         => 'admin/realms/{realm}/components/{id}',
            'description' => 'Delete component',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Component id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getComponentSubTypes' => array(
            'uri'         => 'admin/realms/{realm}/components/{id}/sub-component-types',
            'description' => 'List of subcomponent types that are available to configure for a particular parent component.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Component id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'type' => array(
                    'location'    => 'query',
                    'description' => 'Provider type',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Groups

        'createGroup' => array(
            'uri'         => 'admin/realms/{realm}/groups',
            'description' => 'create or add a top level realm groupSet or create child.',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $GroupRepresentation
        ),

        'getGroups' => array(
            'uri'         => 'admin/realms/{realm}/groups',
            'description' => 'Get group hierarchy.',
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
                    'description' => 'Wether to return only name and ids or full objects default true',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
                'first' => array(
                    'location'    => 'query',
                    'description' => 'Pagination offset',
                    'type'        => 'integer',
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
                    'description' => 'search string',
                    'type'        => 'string',
                    'required'    => false,
                ),
            )
        ),

        'getGroupsCount' => array(
            'uri'         => 'admin/realms/{realm}/groups/count',
            'description' => 'Returns the groups counts.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'search' => array(
                    'location'    => 'query',
                    'description' => 'search string',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'top' => array(
                    'location'    => 'query',
                    'description' => 'default is false',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
            )
        ),

        'getGroup' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}',
            'description' => 'Get Group',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateGroup' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}',
            'description' => 'Update group, ignores subgroups.',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $GroupRepresentation
        ),

        'removeGroup' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}',
            'description' => 'Delete Group',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'createChildGroup' => array(
            'uri'         => 'admin/realms/{realm}/groups/{groupId}/children',
            'description' => 'Set or create child.',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'groupId' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $GroupRepresentation
        ),

        'getGroupManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}/management/permissions',
            'description' => 'Return object stating whether client Authorization permissions have been initialized or not and a reference',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateGroupManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}/management/permissions',
            'description' => 'Return object stating whether client Authorization permissions have been initialized or not and a reference',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ManagementPermissionReference
        ),

        'getGroupMembers' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}/members',
            'description' => 'Get users Returns a list of users, filtered according to query parameters',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'briefRepresentation' => array(
                    'location'    => 'query',
                    'description' => 'Only return basic information (only guaranteed to return id, username, created, first and last name, email, enabled state, email verification state, federation link, and access. Note that it means that namely user attributes, required actions, and not before are not returned.)',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
                'first' => array(
                    'location'    => 'query',
                    'description' => 'Pagination offset',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'max' => array(
                    'location'    => 'query',
                    'description' => 'Maximum results size (defaults to 100)',
                    'type'        => 'integer',
                    'required'    => false,
                ),
            )
        ),

        // Identity Providers

        'importIdentityProvider' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/import-config',
            'description' => 'Import identity provider from uploaded JSON file',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'providerId' => array(
                    'location'    => 'multipart',
                    'description' => 'Identity provider id',
                    'required'    => true,
                ),
                'file' => array(
                    'location'    => 'multipart',
                    'description' => 'Identity provider json file',
                    'required'    => true,
                ),
            )
        ),

        'createIdentityProvider' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances',
            'description' => 'Create a new identity provider',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $IdentityProviderRepresentation
        ),

        'getIdentityProviders' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances',
            'description' => 'Get identity providers',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getIdentityProvider' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}',
            'description' => 'Get the identity provider',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateIdentityProvider' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}',
            'description' => 'Update the identity provider',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $IdentityProviderRepresentation
        ),

        'deleteIdentityProvider' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}',
            'description' => 'Delete the identity provider',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'exportIdentityProviderBrokerConfig' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}/export',
            'description' => 'Export public broker configuration for identity provider',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'format' => array(
                    'location'    => 'query',
                    'description' => 'Format to use',
                    'type'        => 'string',
                    'required'    => false,
                ),
            )
        ),

        'getIdentityProviderManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}/management/permissions',
            'description' => 'Return object stating whether client Authorization permissions have been initialized or not and a reference',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateIdentityProviderManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}/management/permissions',
            'description' => 'Return object stating whether client Authorization permissions have been initialized or not and a reference',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ManagementPermissionReference
        ),

        'getIdentityProviderMapperTypes' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}/mapper-types',
            'description' => 'Get mapper types for identity provider',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'createIdentityProviderMapper' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}/mappers',
            'description' => 'Add a mapper to identity provider',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $IdentityProviderMapperRepresentation
        ),

        'getIdentityProviderMappers' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}/mappers',
            'description' => 'Get mappers for identity provider',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getIdentityProviderMapper' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}/mappers/{id}',
            'description' => 'Get mapper by id for the identity provider',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Mapper Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateIdentityProviderMapper' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}/mappers/{id}',
            'description' => 'Update a mapper for the identity provider',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Mapper Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $IdentityProviderMapperRepresentation
        ),

        'deleteIdentityProviderMapper' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/instances/{alias}/mappers/{id}',
            'description' => 'Delete a mapper for the identity provider',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'alias' => array(
                    'location'    => 'uri',
                    'description' => 'Identity provider alias',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Mapper Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getIdentityProviderById' => array(
            'uri'         => 'admin/realms/{realm}/identity-provider/providers/{provider_id}',
            'description' => 'Get identity provider',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'provider_id' => array(
                    'location'    => 'uri',
                    'description' => 'Provider id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Key

        'getRealmKeys' => array(
            'uri'         => 'admin/realms/{realm}/keys',
            'description' => 'Get Realm keys',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Protocol Mappers

        'createClientScopeProtocolMappers' => array(
            'uri'         => 'admin/realms/{realm}/client-scopes/{clientScopeId}/protocol-mappers/add-models',
            'description' => 'Create multiple mappers',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'reps' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $ProtocolMapperRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'createClientScopeProtocolMapper' => array(
            'uri'         => 'admin/realms/{realm}/client-scopes/{clientScopeId}/protocol-mappers/models',
            'description' => 'Create a mapper',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ProtocolMapperRepresentation
        ),

        'getClientScopeProtocolMappers' => array(
            'uri'         => 'admin/realms/{realm}/client-scopes/{clientScopeId}/protocol-mappers/models',
            'description' => 'Get mappers',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientScopeProtocolMapperById' => array(
            'uri'         => 'admin/realms/{realm}/client-scopes/{clientScopeId}/protocol-mappers/models/{mapperId}',
            'description' => 'Get mapper by id',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'mapperId' => array(
                    'location'    => 'uri',
                    'description' => 'Mapper id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateClientScopeProtocolMapper' => array(
            'uri'         => 'admin/realms/{realm}/client-scopes/{clientScopeId}/protocol-mappers/models/{mapperId}',
            'description' => 'Update the mapper',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'mapperId' => array(
                    'location'    => 'uri',
                    'description' => 'Mapper id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ProtocolMapperRepresentation
        ),

        'deleteClientScopeProtocolMapper' => array(
            'uri'         => 'admin/realms/{realm}/client-scopes/{clientScopeId}/protocol-mappers/models/{mapperId}',
            'description' => 'Delete the mapper',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'mapperId' => array(
                    'location'    => 'uri',
                    'description' => 'Mapper id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientScopeProtocolMappersByProtocolName' => array(
            'uri'         => 'admin/realms/{realm}/client-scopes/{clientScopeId}/protocol-mappers/protocol/{protocol}',
            'description' => 'Delete the mapper',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client scope (not name)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'protocol' => array(
                    'location'    => 'uri',
                    'description' => 'Protocol name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'createClientProtocolMappers' => array(
            'uri'         => 'admin/realms/{realm}/clients/{clientId}/protocol-mappers/add-models',
            'description' => 'Create multiple mappers',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'reps' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $ProtocolMapperRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'createClientProtocolMapper' => array(
            'uri'         => 'admin/realms/{realm}/clients/{clientId}/protocol-mappers/models',
            'description' => 'Create a mapper',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ProtocolMapperRepresentation
        ),

        'getClientProtocolMappers' => array(
            'uri'         => 'admin/realms/{realm}/clients/{clientId}/protocol-mappers/models',
            'description' => 'Get mappers',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientProtocolMapperById' => array(
            'uri'         => 'admin/realms/{realm}/clients/{clientId}/protocol-mappers/models/{mapperId}',
            'description' => 'Get mapper by id',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'mapperId' => array(
                    'location'    => 'uri',
                    'description' => 'Mapper id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateClientProtocolMapper' => array(
            'uri'         => 'admin/realms/{realm}/clients/{clientId}/protocol-mappers/models/{mapperId}',
            'description' => 'Update the mapper',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'mapperId' => array(
                    'location'    => 'uri',
                    'description' => 'Mapper id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ProtocolMapperRepresentation
        ),

        'deleteClientProtocolMapper' => array(
            'uri'         => 'admin/realms/{realm}/clients/{clientId}/protocol-mappers/models/{mapperId}',
            'description' => 'Delete the mapper',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'mapperId' => array(
                    'location'    => 'uri',
                    'description' => 'Mapper id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientProtocolMappersByProtocolName' => array(
            'uri'         => 'admin/realms/{realm}/clients/{clientId}/protocol-mappers/protocol/{protocol}',
            'description' => 'Delete the mapper',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientId' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'protocol' => array(
                    'location'    => 'uri',
                    'description' => 'Protocol name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Realms Admin

        'importRealm' => array(
            'uri'         => 'admin/realms/',
            'description' => 'Import a realm Imports a realm from a full representation of that realm.',
            'httpMethod'  => 'POST',
            'parameters'  => $RealmRepresentation
        ),

        'getRealm' => array(
            'uri'         => 'admin/realms/{realm}',
            'description' => 'Get the top-level representation of the realm It will not include nested information like User and Client representations.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateRealm' => array(
            'uri'         => 'admin/realms/{realm}',
            'description' => 'Update the top-level information of the realm Any user, roles or client information in the representation will be ignored.',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $RealmRepresentation
        ),

        'deleteRealm' => array(
            'uri'         => 'admin/realms/{realm}',
            'description' => 'Delete the realm',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getAdminEvents' => array(
            'uri'         => 'admin/realms/{realm}/admin-events',
            'description' => 'Get admin events Returns all admin events, or filters events based on URL query parameters listed here',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'authClient' => array(
                    'location'    => 'query',
                    'description' => 'authClient',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'authIpAddress' => array(
                    'location'    => 'query',
                    'description' => 'authIpAddress',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'authRealm' => array(
                    'location'    => 'query',
                    'description' => 'authRealm',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'authUser' => array(
                    'location'    => 'query',
                    'description' => 'user id',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'dateFrom' => array(
                    'location'    => 'query',
                    'description' => 'dateFrom',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'dateTo' => array(
                    'location'    => 'query',
                    'description' => 'dateTo',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'first' => array(
                    'location'    => 'query',
                    'description' => 'first',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'max' => array(
                    'location'    => 'query',
                    'description' => 'Maximum results size (defaults to 100)',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'operationTypes' => array(
                    'location'    => 'query',
                    'description' => 'operationTypes',
                    'type'        => 'array',
                    'required'    => false,
                ),
                'resourcePath' => array(
                    'location'    => 'query',
                    'description' => 'resourcePath',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'resourceTypes' => array(
                    'location'    => 'query',
                    'description' => 'resourceTypes',
                    'type'        => 'array',
                    'required'    => false,
                ),
            )
        ),

        'deleteAdminEvents' => array(
            'uri'         => 'admin/realms/{realm}/admin-events',
            'description' => 'Delete all admin events',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'clearExternalPublicKeysCache' => array(
            'uri'         => 'admin/realms/{realm}/clear-keys-cache',
            'description' => 'Clear cache of external public keys (Public keys of clients or Identity providers)',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'clearRealmCache' => array(
            'uri'         => 'admin/realms/{realm}/clear-realm-cache',
            'description' => 'Clear realm cache',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'clearUserCache' => array(
            'uri'         => 'admin/realms/{realm}/clear-user-cache',
            'description' => 'Clear user cache',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'importClient' => array(
            'uri'         => 'admin/realms/{realm}/client-description-converter',
            'description' => 'Base path for importing clients under this realm.',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'description' => array(
                    'location'    => 'json',
                    'description' => 'description',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientsSessionStats' => array(
            'uri'         => 'admin/realms/{realm}/client-session-stats',
            'description' => 'Get client session stats Returns a JSON map.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getCredentialRegistrators' => array(
            'uri'         => 'admin/realms/{realm}/credential-registrators',
            'description' => 'Get Credential Registrators',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getDefaultClientScopes' => array(
            'uri'         => 'admin/realms/{realm}/default-default-client-scopes',
            'description' => 'Get realm default client scopes.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'setScopeAsDefaultClientScope' => array(
            'uri'         => 'admin/realms/{realm}/default-default-client-scopes/{clientScopeId}',
            'description' => 'Set scope as realm default client scope.',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'clientScopeId',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'unsetScopeAsDefaultClientScope' => array(
            'uri'         => 'admin/realms/{realm}/default-default-client-scopes/{clientScopeId}',
            'description' => 'Remove scope as realm default client scope.',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'clientScopeId',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getDefaultGroupHierarchy' => array(
            'uri'         => 'admin/realms/{realm}/default-groups',
            'description' => 'Get group hierarchy.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'setGroupAsDefaultGroup' => array(
            'uri'         => 'admin/realms/{realm}/default-groups/{groupId}',
            'description' => 'Set group as default group.',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'groupId' => array(
                    'location'    => 'uri',
                    'description' => 'groupId',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'unsetGroupAsDefaultGroup' => array(
            'uri'         => 'admin/realms/{realm}/default-groups/{groupId}',
            'description' => 'Remove group as default group.',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'groupId' => array(
                    'location'    => 'uri',
                    'description' => 'groupId',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getOptionalClientScopes' => array(
            'uri'         => 'admin/realms/{realm}/default-optional-client-scopes',
            'description' => 'Get realm optional client scopes.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'setScopeAsOptionalClientScope' => array(
            'uri'         => 'admin/realms/{realm}/default-optional-client-scopes/{clientScopeId}',
            'description' => 'Set scope as realm optional client scope.',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'clientScopeId',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'unsetScopeAsOptionalClientScope' => array(
            'uri'         => 'admin/realms/{realm}/default-optional-client-scopes/{clientScopeId}',
            'description' => 'Remove scope as realm optional client scope.',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientScopeId' => array(
                    'location'    => 'uri',
                    'description' => 'clientScopeId',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getAllEvents' => array(
            'uri'         => 'admin/realms/{realm}/events',
            'description' => 'Get events Returns all events, or filters them based on URL query parameters listed here',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'query',
                    'description' => 'App or oauth client name',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'dateFrom' => array(
                    'location'    => 'query',
                    'description' => 'From date',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'dateTo' => array(
                    'location'    => 'query',
                    'description' => 'To date',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'first' => array(
                    'location'    => 'query',
                    'description' => 'Paging offset',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'ipAddress' => array(
                    'location'    => 'query',
                    'description' => 'IP address',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'max' => array(
                    'location'    => 'query',
                    'description' => 'Maximum results size (defaults to 100)',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'type' => array(
                    'location'    => 'query',
                    'description' => 'The types of events to return',
                    'type'        => 'array',
                    'required'    => false,
                ),
                'user' => array(
                    'location'    => 'query',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => false,
                ),
            )
        ),

        'deleteAllEvents' => array(
            'uri'         => 'admin/realms/{realm}/events',
            'description' => 'Delete all events',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getEventsConfig' => array(
            'uri'         => 'admin/realms/{realm}/events/config',
            'description' => 'Get the events provider configuration Returns JSON object with events provider configuration',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateEventsConfig' => array(
            'uri'         => 'admin/realms/{realm}/events/config',
            'description' => 'Update the events provider Change the events provider and/or its configuration',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $RealmEventsConfigRepresentation
        ),

        'getGroupByPath' => array(
            'uri'         => 'admin/realms/{realm}/group-by-path/{path}',
            'description' => 'Get user group by path',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'path' => array(
                    'location'    => 'uri',
                    'description' => 'path',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'logoutAllUsers' => array(
            'uri'         => 'admin/realms/{realm}/logout-all',
            'description' => 'Removes all user sessions.',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'partialExportRealm' => array(
            'uri'         => 'admin/realms/{realm}/partial-export',
            'description' => 'Partial export of existing realm into a JSON file.',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'exportClients' => array(
                    'location'    => 'query',
                    'description' => 'exportClients',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
                'exportGroupsAndRoles' => array(
                    'location'    => 'query',
                    'description' => 'exportGroupsAndRoles',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
            )
        ),

        'partialImportRealm' => array(
            'uri'         => 'admin/realms/{realm}/partialImport',
            'description' => 'Partial import from a JSON file to an existing realm.',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $PartialImportRepresentation
        ),

        'pushRevocationPolicy' => array(
            'uri'         => 'admin/realms/{realm}/push-revocation',
            'description' => 'Push the realm’s revocation policy to any client that has an admin url associated with it.',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'revokeUserSession' => array(
            'uri'         => 'admin/realms/{realm}/sessions/{session}',
            'description' => 'Remove a specific user session.',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'session' => array(
                    'location'    => 'uri',
                    'description' => 'session',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'testLDAPConnection' => array(
            'uri'         => 'admin/realms/{realm}/testLDAPConnection',
            'description' => 'Test LDAP connection',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $TestLdapConnectionRepresentation
        ),

        'testSMTPConnection' => array(
            'uri'         => 'admin/realms/{realm}/testSMTPConnection',
            'description' => 'Test SMTP connection with current logged in user',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $SMTPSettingsRepresentation
        ),

        'getUserManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/users-management-permissions',
            'description' => 'Get User Management Permissions',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateUserManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/users-management-permissions',
            'description' => 'Update User Management Permissions',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ManagementPermissionReference
        ),

        // Role Mapper

        'getGroupRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}/role-mappings',
            'description' => 'Get Group role mappings',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'addGlobalRolesToGroup' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}/role-mappings/realm',
            'description' => 'Add realm-level role mappings to the group',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getGroupRealmRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}/role-mappings/realm',
            'description' => 'Get realm-level role mappings',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'deleteGroupRealmRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}/role-mappings/realm',
            'description' => 'Delete realm-level role mappings',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getAvailableGroupRealmRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}/role-mappings/realm/available',
            'description' => 'Get realm-level role mappings',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getEffectiveGroupRealmRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/groups/{id}/role-mappings/realm/composite',
            'description' => 'Get effective realm-level role mappings This will recurse all composite roles to get the result.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'Group Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getUserRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/role-mappings',
            'description' => 'Get User role mappings',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'addGlobalRolesToUser' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/role-mappings/realm',
            'description' => 'Add realm-level role mappings to the user',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getUserRealmRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/role-mappings/realm',
            'description' => 'Get realm-level role mappings',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'deleteUserRealmRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/role-mappings/realm',
            'description' => 'Delete realm-level role mappings',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getAvailableUserRealmRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/role-mappings/realm/available',
            'description' => 'Get realm-level role mappings',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getEffectiveUserRealmRoleMappings' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/role-mappings/realm/composite',
            'description' => 'Get effective realm-level role mappings This will recurse all composite roles to get the result.',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User Id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        // Roles

        'createClientRole' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles',
            'description' => 'Create a new role for the realm or client',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $RoleRepresentation
        ),

        'getClientRoles' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles',
            'description' => 'Get all roles for the realm or client (Client Specific)',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'getClientRole' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}',
            'description' => 'Get a role by name (Client Specific)',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'updateClientRole' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}',
            'description' => 'Update a role by name',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $RoleRepresentation
        ),

        'deleteClientRole' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}',
            'description' => 'Delete a role for the realm or client by name',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'addCompositeRoleToClientRole' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}/composites',
            'description' => 'Add a composite to the role',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getClientRoleCompositeRoles' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}/composites',
            'description' => 'Get composites of the role',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'deleteCompositeRoleFromClientRole' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}/composites',
            'description' => 'Remove roles from the role’s composite',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getClientRoleCompositeRolesForClient' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}/composites/clients/{client}',
            'description' => 'An app-level roles for the specified app for the role’s composite',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'client id (not name!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientRoleCompositeRolesForRealm' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}/composites/realm',
            'description' => 'Get realm-level roles of the role’s composite',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getClientRoleGroups' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}/groups',
            'description' => 'Return List of Groups that have the specified role name',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'first' => array(
                    'location'    => 'query',
                    'description' => 'first',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'full' => array(
                    'location'    => 'query',
                    'description' => 'if true, return a full representation of the GroupRepresentation objects',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
                'max' => array(
                    'location'    => 'query',
                    'description' => 'Maximum results size (defaults to 100)',
                    'type'        => 'integer',
                    'required'    => false,
                ),
            )
        ),

        'getClientRoleManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}/management/permissions',
            'description' => 'Return object stating whether role Authoirzation permissions have been initialized or not and a reference',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateClientRoleManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}/management/permissions',
            'description' => 'Update object stating whether role Authoirzation permissions have been initialized or not and a reference',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ManagementPermissionReference
        ),

        'getClientRoleUsers' => array(
            'uri'         => 'admin/realms/{realm}/clients/{id}/roles/{role-name}/users',
            'description' => 'Return List of Users that have the specified role name (Client Specific)',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'first' => array(
                    'location' => 'query',
                    'type' => 'integer',
                    'required' => false
                ),
                'max' => array(
                    'location' => 'query',
                    'type' => 'integer',
                    'required' => false
                ),
            ),
        ),

        'createRealmRole' => array(
            'uri'         => 'admin/realms/{realm}/roles',
            'description' => 'Create a new role for the realm or client',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $RoleRepresentation
        ),

        'getRealmRoles' => array(
            'uri'         => 'admin/realms/{realm}/roles',
            'description' => 'Get all roles for the realm or client (Realm Specific)',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'getRealmRole' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}',
            'description' => 'Get a role by name (Realm Specific)',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'updateRealmRole' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}',
            'description' => 'Update a role by name',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $RoleRepresentation
        ),

        'deleteRealmRole' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}',
            'description' => 'Delete a role for the realm or client by name',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'addCompositeRoleToRealmRole' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}/composites',
            'description' => 'Add a composite to the role',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getRealmRoleCompositeRoles' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}/composites',
            'description' => 'Get composites of the role',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'deleteCompositeRoleFromRealmRole' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}/composites',
            'description' => 'Remove roles from the role’s composite',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getRealmRoleCompositeRolesForClient' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}/composites/clients/{client}',
            'description' => 'An app-level roles for the specified app for the role’s composite',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'client id (not name!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getRealmRoleCompositeRolesForRealm' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}/composites/realm',
            'description' => 'Get realm-level roles of the role’s composite',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getRealmRoleGroups' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}/groups',
            'description' => 'Return List of Groups that have the specified role name',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'first' => array(
                    'location'    => 'query',
                    'description' => 'first',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'full' => array(
                    'location'    => 'query',
                    'description' => 'if true, return a full representation of the GroupRepresentation objects',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
                'max' => array(
                    'location'    => 'query',
                    'description' => 'Maximum results size (defaults to 100)',
                    'type'        => 'integer',
                    'required'    => false,
                ),
            )
        ),

        'getRealmRoleManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}/management/permissions',
            'description' => 'Return object stating whether role Authoirzation permissions have been initialized or not and a reference',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateRealmRoleManagementPermissions' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}/management/permissions',
            'description' => 'Update object stating whether role Authoirzation permissions have been initialized or not and a reference',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'description' => 'role’s name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ManagementPermissionReference
        ),

        'getRealmRoleUsers' => array(
            'uri'         => 'admin/realms/{realm}/roles/{role-name}/users',
            'description' => 'Return List of Users that have the specified role name (Realm Specific)',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),

                'role-name' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'first' => array(
                    'location' => 'query',
                    'type' => 'integer',
                    'required' => false
                ),
                'max' => array(
                    'location' => 'query',
                    'type' => 'integer',
                    'required' => false
                ),
            ),
        ),

        // Roles (by ID)

        'getRealmRoleById' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}',
            'description' => 'Get a specific role’s representation',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),

                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'updateRealmRoleById' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}',
            'description' => 'Update the role',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),

                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $RoleRepresentation,
        ),

        'deleteRealmRoleById' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}',
            'description' => 'Delete the role',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),

                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'addCompositeRoleToRealmRoleByRoleId' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}/composites',
            'description' => 'Add a composite to the role',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getRealmRoleCompositeRolesByRoleId' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}/composites',
            'description' => 'Get composites of the role',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'deleteCompositeRoleFromRealmRoleByRoleId' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}/composites',
            'description' => 'Remove roles from the role’s composite',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'roles' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'items' => array(
                        'type' => 'object', 'properties' => $RoleRepresentation
                    ),
                    'required' => true
                ),
            )
        ),

        'getRealmRoleCompositeRolesForClientByRoleId' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}/composites/clients/{client}',
            'description' => 'Get client-level roles for the client that are in the role’s composite',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client' => array(
                    'location'    => 'uri',
                    'description' => 'client id (not name!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getRealmRoleCompositeRolesForRealmByRoleId' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}/composites/realm',
            'description' => 'Get realm-level roles of the role’s composite',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'getRealmRoleManagementPermissionsByRoleId' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}/management/permissions',
            'description' => 'Return object stating whether role Authoirzation permissions have been initialized or not and a reference',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'updateRealmRoleManagementPermissionsByRoleId' => array(
            'uri'         => 'admin/realms/{realm}/roles-by-id/{role-id}/management/permissions',
            'description' => 'Update object stating whether role Authoirzation permissions have been initialized or not and a reference',
            'httpMethod'  => 'PUT',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-id' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $ManagementPermissionReference
        ),

        // Users

        'createUser' => array(
            'uri' => 'admin/realms/{realm}/users',
            'description' => 'Create a new user Username must be unique.',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $UserRepresentation
        ),

        'getUserCount' => array(
            'uri'         => 'admin/realms/{realm}/users/count',
            'description' => 'Get the number of users',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'emailVerified' => array(
                    'location'    => 'query',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
                'email' => array(
                    'location'    => 'query',
                    'type'        => 'string',
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
                'search' => array(
                    'location'    => 'query',
                    'description' => 'A String contained in username, first or last name, or email',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'username' => array(
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                )
            ),
        ),

        'getUsers' => array(
            'uri'         => 'admin/realms/{realm}/users',
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
                'exact' => array(
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                    'enum'        => ['true', 'false'],
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
                    'type'        => 'string',
                    'required'    => false,
                ),
                'username' => array(
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'q' => array(
                    'location'    => 'query',
                    'description' => 'A query to search for custom attributes, in the format \'key1:value2 key2:value2\'',
                    'type'        => 'string',
                    'required'    => false,
                ),
            ),
        ),

        'getUser' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}',
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

        'getUserGroups' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/groups',
            'description' => 'Get the user groups of a specific user',
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

        'getUserGroupsCount' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/groups/count',
            'description' => 'Get the number user groups of a specific user',
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

        'getUserConsents' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/consents',
            'description' => 'Get the consents granted by a user',
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

        'updateUser' => array(
            'uri' => 'admin/realms/{realm}/users/{id}',
            'description' => 'Update a user (Username must be unique)',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $UserRepresentation
        ),

        'deleteUser' => array(
            'uri' => 'admin/realms/{realm}/users/{id}',
            'description' => 'Delete a user',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'executeActionsEmail' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/execute-actions-email',
            'description' => 'Send a update account email to the user An email contains a link the user can click to perform a set of required actions.',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client_id' => array(
                    'location'    => 'query',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'lifespan' => array(
                    'location'    => 'query',
                    'description' => 'Number of seconds after which the generated token expires',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'redirect_uri' => array(
                    'location'    => 'query',
                    'description' => 'Redirect uri',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'actions' => array(
                    'location' => 'fullBody',
                    'type' => 'array',
                    'required' => true
                ),
            ),
        ),

        'sendVerifyEmail' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/send-verify-email',
            'description' => 'Send an email-verification email to the user An email contains a link the user can click to verify their email address.',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'client_id' => array(
                    'location'    => 'query',
                    'description' => 'Client id',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'redirect_uri' => array(
                    'location'    => 'query',
                    'description' => 'Redirect uri',
                    'type'        => 'string',
                    'required'    => false,
                ),
            ),
        ),

        'getUserSessions' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/sessions',
            'description' => 'Get sessions associated with the user',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location' => 'uri',
                    'description' => 'The Realm name',
                    'type' => 'string',
                    'required' => true,
                ),
                'id' => array(
                    'location' => 'uri',
                    'description' => 'User id',
                    'type' => 'string',
                    'required' => true
                )
            )
        ),

        'getUserCredentials' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/credentials',
            'description' => 'Get credentials associated with the user',
            'httpMethod' => 'GET',
            'parameters' => array(
                'realm' => array(
                    'location' => 'uri',
                    'description' => 'The Realm name',
                    'type' => 'string',
                    'required' => true,
                ),
                'id' => array(
                    'location' => 'uri',
                    'description' => 'User id',
                    'type' => 'string',
                    'required' => true
                )
            )
        ),

        'addUserToGroup' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/groups/{groupId}',
            'description' => 'Assign a specific user to a specific group',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'groupId' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'deleteUserFromGroup' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/groups/{groupId}',
            'description' => 'Remove a specific user from a specific group',
            'httpMethod' => 'DELETE',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'groupId' => array(
                    'location'    => 'uri',
                    'description' => 'Group id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ),
        ),

        'resetUserPassword' => array(
            'uri' => 'admin/realms/{realm}/users/{id}/reset-password',
            'description' => 'Set up a new password for the user',
            'httpMethod' => 'PUT',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $CredentialRepresentation,
        ),

        'syncUserStorage' => array(
            'uri'         => 'admin/realms/{realm}/user-storage/{id}/sync',
            'description' => 'Trigger sync of users. Action can be "triggerFullSync" or "triggerChangedUsersSync"',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location' => 'uri',
                    'description' => 'Storage id',
                    'type' => 'string',
                    'required' => true
                ),
                'action' => array(
                    'location' => 'query',
                    'description' => 'Action',
                    'type' => 'string',
                    'required' => false
                )
            )
        ),

        'getSocialLogins' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/federated-identity',
            'description' => 'Get social logins associated with the user',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'removeSocialLogin' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/federated-identity/{providerId}',
            'description' => 'Remove social login associated with the user',
            'httpMethod'  => 'DELETE',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'User id',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'providerId' => array(
                    'location'    => 'uri',
                    'description' => 'The Provider ID',
                    'type'        => 'string',
                    'required'    => true,
                ),
            )
        ),

        'addSocialLogin' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/federated-identity/{providerId}',
            'description' => 'Add social login associated with the user',
            'httpMethod'  => 'POST',
            'parameters'  => array(
                    'realm' => array(
                        'location'    => 'uri',
                        'description' => 'The Realm name',
                        'type'        => 'string',
                        'required'    => true,
                    ),
                    'id' => array(
                        'location'    => 'uri',
                        'description' => 'User id',
                        'type'        => 'string',
                        'required'    => true,
                    ),
                    'providerId' => array(
                        'location'    => 'uri',
                        'description' => 'The Provider ID',
                        'type'        => 'string',
                        'required'    => true,
                    ),
                ) + $FederatedIdentityRepresentation,
        ),

        'impersonateUser' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/impersonation',
            'description' => 'Remove all sessions associated with the user',
            'httpMethod'  => 'POST',
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

        'logoutUser' => array(
            'uri'         => 'admin/realms/{realm}/users/{id}/logout',
            'description' => 'Remove all sessions associated with the user',
            'httpMethod'  => 'POST',
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

    ) //End of Operations Array
);//End of return array
