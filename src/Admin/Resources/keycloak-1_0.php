<?php

require 'Definitions/keycloak-1_0.php';

return array(
    'name'        => 'Keycloak',
    'baseUri' => $config['baseUri'],
    'apiVersion'  => '1.0',
    'operations'  => array(

        // Attack Detection

        'clearAllLoginFailures' => array(
            'uri' => 'auth/admin/realms/{realm}/attack-detection/brute-force/users',
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
            'uri' => 'auth/admin/realms/{realm}/attack-detection/brute-force/users/{userId}',
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
            'uri' => 'auth/admin/realms/{realm}/attack-detection/brute-force/users/{userId}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/authenticator-providers',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/client-authenticator-providers',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/config-description/{providerId}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/config/{id}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/config/{id}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/config/{id}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/executions',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/executions/{executionId}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/executions/{executionId}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/executions/{executionId}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/executions/{executionId}/lower-priority',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/executions/{executionId}/raise-priority',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows/{flowAlias}/copy',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows/{flowAlias}/executions',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows/{flowAlias}/executions',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows/{flowAlias}/executions/execution',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows/{flowAlias}/executions/flow',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows/{id}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows/{id}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/flows/{id}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/form-action-providers',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/form-providers',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/per-client-config-description',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/register-required-action',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/required-actions',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/required-actions/{alias}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/required-actions/{alias}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/required-actions/{alias}',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/required-actions/{alias}/lower-priority',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/required-actions/{alias}/raise-priority',
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
            'uri' => 'auth/admin/realms/{realm}/authentication/unregistered-required-actions',
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
            'uri' => 'auth/admin/realms/{realm}/clients/{id}/certificates/{attr}',
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
            'uri' => 'auth/admin/realms/{realm}/clients/{id}/certificates/{attr}/download',
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
            'uri' => 'auth/admin/realms/{realm}/clients/{id}/certificates/{attr}/generate',
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
            'uri' => 'auth/admin/realms/{realm}/clients/{id}/certificates/{attr}/generate-and-download',
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
            'uri' => 'auth/admin/realms/{realm}/clients/{id}/certificates/{attr}/upload',
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
            'uri' => 'auth/admin/realms/{realm}/clients/{id}/certificates/{attr}/upload-certificate',
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

        // Users

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
            ) + $UserRepresentation
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

        //Roles

        'getClientRoleUsers' => array(
            'uri'         => 'auth/admin/realms/{realm}/clients/{id}/roles/{role-name}/users',
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

        'getClientRoles' => array(
            'uri'         => 'auth/admin/realms/{realm}/clients/{id}/roles',
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
            'uri'         => 'auth/admin/realms/{realm}/clients/{id}/roles/{role-name}',
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

    ) //End of Operations Array
);//End of return array
