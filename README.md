[![Latest Version](https://img.shields.io/github/v/tag/MohammadWaleed/keycloak-admin-client.svg?style=flat-square)](https://github.com/MohammadWaleed/keycloak-admin-client/releases)

[![Total Downloads](https://img.shields.io/packagist/dt/mohammad-waleed/keycloak-admin-client.svg?style=flat-square)](https://packagist.org/packages/mohammad-waleed/keycloak-admin-client)

[![Donate](https://img.shields.io/badge/Paypal-Donate-blue?style=flat-square)](https://paypal.me/mbarghash?locale.x=en_US)

- [Introduction](#introduction)
- [How to use](#how-to-use)
- [Customization](#customization)
- [Supported APIs](#supported-apis)
	- [Attack Detection](#attack-detection)
	- [Authentication Management](#authentication-management)
	- [Client Attribute Certificate](#client-attribute-certificate)
	- [Client Initial Access](#client-initial-access)
	- [Client Registration Policy](#client-registration-policy)
	- [Client Role Mappings](#client-role-mappings)
	- [Client Scopes](#client-scopes)
	- [Clients](#clients)
	- [Component](#component)
	- [Groups](#groups)
	- [Identity Providers](#identity-providers)
	- [Key](#key)
	- [Protocol Mappers](#protocol-mappers)
	- [Realms Admin](#realms-admin)
	- [Role Mapper](#role-mapper)
	- [Roles](#roles)
	- [Roles (by ID)](#roles-by-id)
	- [Scope Mappings](#scope-mappings)
	- [User Storage Provider](#user-storage-provider)
	- [Users](#users)
	- [Root](#root)


# Introduction

This is a php client to connect to keycloak admin rest apis with no headache.

Features:
1. Easy to use
2. No need to get token or generate it - it's already handled by the client
3. No need to specify any urls other than the base uri
4. No encode/decode for json just data as you expect

Works with Keycloak 7.0+ admin REST API.

https://www.keycloak.org/documentation -> "Administration REST API"


# How to use

#### 1. Create new client 

```php
$client = Keycloak\Admin\KeycloakClient::factory([
    'realm' => 'master',
    'username' => 'admin',
    'password' => '1234',
    'client_id' => 'admin-cli',
    'baseUri' => 'http://127.0.0.1:8180',
]);
```

Since version 0.30, if your Keycloak base URL starts with `auth/`, add it to `baseUri` (e.g. http://127.0.0.1:8180/auth). Base URL for Keycloak versions 7 to 16 have systematically `auth/`. On Keycloak 17+ it depends on your settings.


#### 2. Use it

```php
$client->getUsers();

//Result
// Array of users
/*
[
     [
       "id" => "39839a9b-de08-4d2c-b91a-a6ce2595b1f3",
       "createdTimestamp" => 1571663375749,
       "username" => "admin",
       "enabled" => true,
       "totp" => false,
       "emailVerified" => false,
       "disableableCredentialTypes" => [
         "password",
       ],
       "requiredActions" => [],
       "notBefore" => 0,
       "access" => [
         "manageGroupMembership" => true,
         "view" => true,
         "mapRoles" => true,
         "impersonate" => true,
         "manage" => true,
       ],
     ],
   ]
*/

$client->createUser([
    'username' => 'test',
    'email' => 'test@test.com',
    'enabled' => true,
    'credentials' => [
        [
            'type'=>'password',
            'value'=>'1234',
        ],
    ],
]);
```

# Customization

### Supported credentials

It is possible to change the credential's type used to authenticate by changing the configuration of the keycloak client.

Currently, the following credentials are supported
- password credentials, used by default
  - to authenticate with a user account
  ````php
  $client = Keycloak\Admin\KeycloakClient::factory([
      ...
      'grant_type' => 'password',
      'username' => 'admin',
      'password' => '1234',
  ]);
  ````
- client credentials
  - to authenticate with a client service account
  ````php
  $client = Keycloak\Admin\KeycloakClient::factory([
      ...
      'grant_type' => 'client_credentials',
      'client_id' => 'admin-cli',
      'client_secret' => '84ab3d98-a0c3-44c7-b532-306f222ce1ff',
  ]);
  ````

### Injecting middleware

It is possible to inject [Guzzle client middleware](https://docs.guzzlephp.org/en/stable/handlers-and-middleware.html#middleware) 
in the keycloak client configuration using the `middlewares` keyword.

For example: 
```php 
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;

$client = Keycloak\Admin\KeycloakClient::factory([
    ...
    'middlewares' => [
        // throws exceptions when request fails
        Middleware::httpErrors(),
        // other custom middlewares
        Middleware::mapRequest(function (RequestInterface $request) {
            return $request;
        }),
    ],
]);
```

### Changing how the token is saved and stored

By default, the token is saved at runtime. This means that the previous token is not used when creating a new client.

You can customize how the token is stored in the client configuration by implementing your own `TokenStorage`, 
an interface which describes how the token is stored and retrieved.
```php 
class CustomTokenStorage implements TokenStorage 
{
    public function getToken() 
    {
        // TODO
    }
    
    public function saveToken(array $token)
    {
        // TODO
    }
}

$client = Keycloak\Admin\KeycloakClient::factory([
    ...
    'token_storage' => new CustomTokenStorage(),
]);
```

### Custom Keycloak endpoints

It is possible to inject [Guzzle Service Operations](https://guzzle3.readthedocs.io/webservice-client/guzzle-service-descriptions.html#operations)
in the keycloak client configuration using the `custom_operations` keyword. This way you can extend the built-in supported endpoints with custom.

```php
$client = KeycloakClient::factory([
...
    'custom_operations' => [
        'getUsersByAttribute' => [
            'uri' => '/auth/realms/{realm}/userapi-rest/users/search-by-attr',
            'description' => 'Get users by attribute Returns a list of users, filtered according to query parameters',
            'httpMethod' => 'GET',
            'parameters' => [
                'realm' => [
                    'location' => 'uri',
                    'description' => 'The Realm name',
                    'type' => 'string',
                    'required' => true,
                ],
                'attr' => [
                    'location' => 'query',
                    'type' => 'string',
                    'required' => true,
                ],
                'value' => [
                    'location' => 'query',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],
    ]
]);
```


# Supported APIs

## [Attack Detection](https://www.keycloak.org/docs-api/7.0/rest-api/index.html#_attack_detection_resource)

| API                                                                                   |      Function Name      | Supported |
|---------------------------------------------------------------------------------------|:-----------------------:|:---------:|
| Clear any user login failures for all users This can release temporary disabled users |  clearAllLoginFailures  |    ✔️     |
| Get status of a username in brute force detection                                     | getBruteForceUserStatus |    ✔️     |
| Clear any user login failures for the user This can release temporary disabled user   | clearUserLoginFailures  |    ✔️     |

## [Authentication Management](https://www.keycloak.org/docs-api/7.0/rest-api/index.html#_authentication_management_resource)

| API                                                                                                                       |            Function Name             | Supported |
|---------------------------------------------------------------------------------------------------------------------------|:------------------------------------:|:---------:|
| Get authenticator providers Returns a list of authenticator providers.                                                    |      getAuthenticatorProviders       |    ✔️     |
| Get client authenticator providers Returns a list of client authenticator providers.                                      |   getClientAuthenticatorProviders    |    ✔️     |
| Get authenticator provider’s configuration description                                                                    |      getAuthenticatorConfigInfo      |    ✔️     |
| Get authenticator configuration                                                                                           |        getAuthenticatorConfig        |    ✔️     |
| Update authenticator configuration                                                                                        |      updateAuthenticatorConfig       |    ✔️     |
| Delete authenticator configuration                                                                                        |      deleteAuthenticatorConfig       |    ✔️     |
| Add new authentication execution                                                                                          |    createAuthenticationExecution     |    ✔️     |
| Get Single Execution                                                                                                      |      getAuthenticationExecution      |    ✔️     |
| Delete execution                                                                                                          |    deleteAuthenticationExecution     |    ✔️     |
| Update execution with new configuration                                                                                   |    updateAuthenticationExecution     |    ✔️     |
| Lower execution’s priority                                                                                                | lowerAuthenticationExecutionPriority |    ✔️     |
| Raise execution’s priority                                                                                                | raiseAuthenticationExecutionPriority |    ✔️     |
| Create a new authentication flow                                                                                          |       createAuthenticationFlow       |    ✔️     |
| Get authentication flows Returns a list of authentication flows.                                                          |        getAuthenticationFlows        |    ✔️     |
| Copy existing authentication flow under a new name The new name is given as 'newName' attribute of the passed JSON object |        copyAuthenticationFlow        |    ✔️     |
| Get authentication executions for a flow                                                                                  |   getAuthenticationFlowExecutions    |    ✔️     |
| Update authentication executions for a flow                                                                               |  updateAuthenticationFlowExecutions  |    ✔️     |
| Add new authentication execution to a flow                                                                                |  createAuthenticationFlowExecution   |    ✔️     |
| Add new flow with new execution to existing flow                                                                          |    addAuthenticationFlowExecution    |    ✔️     |
| Get authentication flow for id                                                                                            |        getAuthenticationFlow         |    ✔️     |
| Update authentication flow for id                                                                                         |       updateAuthenticationFlow       |    ✔️     |
| Delete an authentication flow                                                                                             |       deleteAuthenticationFlow       |    ✔️     |
| Get form action providers Returns a list of form action providers.                                                        |        getFormActionProviders        |    ✔️     |
| Get form providers Returns a list of form providers.                                                                      |           getFormProviders           |    ✔️     |
| Get configuration descriptions for all clients                                                                            |     getClientsConfigDescriptions     |    ✔️     |
| Register a new required actions                                                                                           |         createRequiredAction         |    ✔️     |
| Get required actions Returns a list of required actions.                                                                  |          getRequiredActions          |    ✔️     |
| Get required action for alias                                                                                             |        getAliasRequiredAction        |    ✔️     |
| Update required action                                                                                                    |         updateRequiredAction         |    ✔️     |
| Delete required action                                                                                                    |         deleteRequiredAction         |    ✔️     |
| Lower required action’s priority                                                                                          |     lowerRequiredActionPriority      |    ✔️     |
| Raise required action’s priority                                                                                          |     raiseRequiredActionPriority      |    ✔️     |
| Get unregistered required actions Returns a list of unregistered required actions.                                        |    getUnregisteredRequiredActions    |    ✔️     |

## [Client Attribute Certificate](https://www.keycloak.org/docs-api/7.0/rest-api/index.html#_client_attribute_certificate_resource)


| API                                                                                                                                                                 |            Function Name             | Supported |
|---------------------------------------------------------------------------------------------------------------------------------------------------------------------|:------------------------------------:|:---------:|
| Get key info (try with attr = "jwt.credential")                                                                                                                     |           getClientKeyInfo           |    ✔️     |
| Get a keystore file for the client, containing private key and public certificate (note: write response content to a file)                                          |          getClientKeyStore           |    ✔️     |
| Generate a new certificate with new key pair                                                                                                                        |      generateClientCertificate       |    ✔️     |
| Generate a new keypair and certificate, and get the private key file Generates a keypair and certificate and serves the private key in a specified keystore format. |  generateDownloadClientCertificate   |    ✔️     |
| Upload certificate and eventually private key                                                                                                                       | uploadClientCertificateAndPrivateKey |    ✔️     |
| Upload only certificate, not private key                                                                                                                            |     uploadClientCertificateOnly      |    ✔️     |

 ## [Client Initial Access](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_client_initial_access_resource)

| API                                         |         Function Name          | Supported |
|---------------------------------------------|:------------------------------:|:---------:|
| Create a new initial access token.          | createClientInitialAccessToken |    ✔️     |
| GET /{realm}/clients-initial-access         |  getClientInitialAccessTokens  |    ✔️     |
| DELETE /{realm}/clients-initial-access/{id} | deleteClientInitialAccessToken |    ✔️     |

 ## [Client Registration Policy](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_client_registration_policy_resource)

| API                                                                        |            Function Name             | Supported |
|----------------------------------------------------------------------------|:------------------------------------:|:---------:|
| Base path for retrieve providers with the configProperties properly filled | getClientRegistrationPolicyProviders |    ✔️     |

 ## [Client Role Mappings](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_client_role_mappings_resource)

| API                                                                                   |              Function Name              | Supported |
|---------------------------------------------------------------------------------------|:---------------------------------------:|:---------:|
| Add client-level roles to the group role mapping                                      |       addGroupClientRoleMappings        |    ✔️     |
| Get client-level role mappings for the group, and the app                             |       getGroupClientRoleMappings        |    ✔️     |
| Delete client-level roles from group role mapping                                     |      deleteGroupClientRoleMappings      |    ✔️     |
| Get available client-level roles that can be mapped to the group                      |   getAvailableGroupClientRoleMappings   |    ✔️     |
| Get effective client-level role mappings This recurses any composite roles for groups | getGroupClientRoleMappingsWithComposite |    ✔️     |
| Add client-level roles to the user role mapping                                       |        addUserClientRoleMappings        |    ✔️     |
| Get client-level role mappings for the user, and the app                              |        getUserClientRoleMappings        |    ✔️     |
| Delete client-level roles from user role mapping                                      |      deleteUserClientRoleMappings       |    ✔️     |
| Get available client-level roles that can be mapped to the user                       |   getAvailableUserClientRoleMappings    |    ✔️     |
| Get effective client-level role mappings This recurses any composite roles for users  | getUserClientRoleMappingsWithComposite  |    ✔️     |

 ## [Client Scopes](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_client_scopes_resource)

| API                                                                                             |   Function Name   | Supported |
|-------------------------------------------------------------------------------------------------|:-----------------:|:---------:|
| Create a new client scope Client Scope’s name must be unique!                                   | createClientScope |    ✔️     |
| Get client scopes belonging to the realm Returns a list of client scopes belonging to the realm |  getClientScopes  |    ✔️     |
| Get representation of the client scope                                                          |  getClientScope   |    ✔️     |
| Update the client scope                                                                         | updateClientScope |    ✔️     |
| Delete the client scope                                                                         | deleteClientScope |    ✔️     |

 ## [Clients](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_clients_resource)

| API                                                                                                                                                                                                                           |               Function Name                | Supported |
|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:------------------------------------------:|:---------:|
| Create a new client Client’s client_id must be unique!                                                                                                                                                                        |                createClient                |    ✔️     |
| Get clients belonging to the realm Returns a list of clients belonging to the realm                                                                                                                                           |                 getClients                 |    ✔️     |
| Get representation of the client                                                                                                                                                                                              |                 getClient                  |    ✔️     |
| Update the client                                                                                                                                                                                                             |                updateClient                |    ✔️     |
| Delete the client                                                                                                                                                                                                             |                deleteClient                |    ✔️     |
| Generate a new secret for the client                                                                                                                                                                                          |            generateClientSecret            |    ✔️     |
| Get the client secret                                                                                                                                                                                                         |              getClientSecret               |    ✔️     |
| Get default client scopes.                                                                                                                                                                                                    |           getClientDefaultScopes           |    ✔️     |
| Set client scope as default scope                                                                                                                                                                                             |          setClientScopeAsDefault           |    ✔️     |
| Remove client scope from default scopes                                                                                                                                                                                       |         removeClientScopeAsDefault         |    ✔️     |
| Create JSON with payload of example access token                                                                                                                                                                              |        getClientExampleAccessToken         |    ✔️     |
| Return list of all protocol mappers, which will be used when generating tokens issued for particular client.                                                                                                                  |          getClientProtocolMappers          |    ✔️     |
| Get effective scope mapping of all roles of particular role container, which this client is defacto allowed to have in the accessToken issued for him.                                                                        |  getClientAllowedRoleMappingsInContainer   |    ✔️     |
| Get roles, which this client doesn’t have scope for and can’t have them in the accessToken issued for him.                                                                                                                    | getClientNotAllowedRoleMappingsInContainer |    ✔️     |
| Generate client adapter configuration takes one of these (keycloak-oidc-keycloak-json, keycloak-oidc-jboss-subsystem-cli, keycloak-oidc-jboss-subsystem, keycloak-saml, keycloak-saml-subsystem-cli, keycloak-saml-subsystem) |     getClientInstallationConfiguration     |    ✔️     |
| Return object stating whether client Authorization permissions have been initialized or not and a reference                                                                                                                   |  getClientAuthorizationPermissionsStatus   |    ✔️     |
| Update client Authorization permissions  initialization and a reference                                                                                                                                                       | updateClientAuthorizationPermissionsStatus |    ✔️     |
| Register a cluster node with the client Manually register cluster node to this client - usually it’s not needed to call this directly as adapter should handle by sending registration request to Keycloak                    |         registerClientClusterNode          |    ✔️     |
| Unregister a cluster node from the client                                                                                                                                                                                     |        unregisterClientClusterNode         |    ✔️     |
| Get application offline session count Returns a number of offline user sessions associated with this client { "count": number }                                                                                               |       getClientOfflineSessionsCount        |    ✔️     |
| Get offline sessions for client Returns a list of offline user sessions associated with this client                                                                                                                           |          getClientOfflineSessions          |    ✔️     |
| Get optional client scopes.                                                                                                                                                                                                   |          getClientOptionalScopes           |    ✔️     |
| Assign client optional scope                                                                                                                                                                                                  |         assignClientOptionalScope          |    ✔️     |
| remove client optional scope assignment                                                                                                                                                                                       |        unassignClientOptionalScope         |    ✔️     |
| Push the client’s revocation policy to its admin URL If the client has an admin URL, push revocation policy to it.                                                                                                            |         pushClientRevocationPolicy         |    ✔️     |
| Generate a new registration access token for the client                                                                                                                                                                       |      generateClientRegistrationToken       |    ✔️     |
| Get a user dedicated to the service account                                                                                                                                                                                   |       getServiceAccountDedicatedUser       |    ✔️     |
| Get application session count Returns a number of user sessions associated with this client { "count": number }                                                                                                               |           getClientSessionsCount           |    ✔️     |
| Test if registered cluster nodes are available Tests availability by sending 'ping' request to all cluster nodes.                                                                                                             |        testClientNodesAvailability         |    ✔️     |
| Get user sessions for client Returns a list of user sessions associated with this client                                                                                                                                      |             getClientSessions              |    ✔️     |

 ## [Component](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_component_resource)

| API                                                                                           |    Function Name     | Supported |
|-----------------------------------------------------------------------------------------------|:--------------------:|:---------:|
| Create new component                                                                          |   createComponent    |    ✔️     |
| Get components                                                                                |    getComponents     |    ✔️     |
| Get component                                                                                 |     getComponent     |    ✔️     |
| Update component                                                                              |   updateComponent    |    ✔️     |
| Delete component                                                                              |   deleteComponent    |    ✔️     |
| List of subcomponent types that are available to configure for a particular parent component. | getComponentSubTypes |    ✔️     |

 ## [Groups](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_groups_resource)

| API                                                                                                         |          Function Name           | Supported |
|-------------------------------------------------------------------------------------------------------------|:--------------------------------:|:---------:|
| create or add a top level realm groupSet or create child.                                                   |           createGroup            |    ✔️     |
| Get group hierarchy.                                                                                        |            getGroups             |    ✔️     |
| Returns the groups counts.                                                                                  |          getGroupsCount          |    ✔️     |
| Get Group                                                                                                   |             getGroup             |    ✔️     |
| Update group, ignores subgroups.                                                                            |           updateGroup            |    ✔️     |
| Delete Group                                                                                                |           removeGroup            |    ✔️     |
| Set or create child.                                                                                        |         createChildGroup         |    ✔️     |
| Return object stating whether client Authorization permissions have been initialized or not and a reference |  getGroupManagementPermissions   |    ✔️     |
| Return object stating whether client Authorization permissions have been initialized or not and a reference | updateGroupManagementPermissions |    ✔️     |
| Get users Returns a list of users, filtered according to query parameters                                   |         getGroupMembers          |    ✔️     |

 ## [Identity Providers](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_identity_providers_resource)

| API                                                                                                         |                Function Name                | Supported |
|-------------------------------------------------------------------------------------------------------------|:-------------------------------------------:|:---------:|
| Import identity provider from uploaded JSON file                                                            |           importIdentityProvider            |    ✔️     |
| Create a new identity provider                                                                              |           createIdentityProvider            |    ✔️     |
| Get identity providers                                                                                      |            getIdentityProviders             |    ✔️     |
| Get the identity provider                                                                                   |             getIdentityProvider             |    ✔️     |
| Update the identity provider                                                                                |           updateIdentityProvider            |    ✔️     |
| Delete the identity provider                                                                                |           deleteIdentityProvider            |    ✔️     |
| Export public broker configuration for identity provider                                                    |     exportIdentityProviderBrokerConfig      |    ✔️     |
| Return object stating whether client Authorization permissions have been initialized or not and a reference |  getIdentityProviderManagementPermissions   |    ✔️     |
| Return object stating whether client Authorization permissions have been initialized or not and a reference | updateIdentityProviderManagementPermissions |    ✔️     |
| Get mapper types for identity provider (Keycloak gives exception report it)                                 |       getIdentityProviderMapperTypes        |    ✔️     |
| Add a mapper to identity provider                                                                           |        createIdentityProviderMapper         |    ✔️     |
| Get mappers for identity provider                                                                           |         getIdentityProviderMappers          |    ✔️     |
| Get mapper by id for the identity provider                                                                  |          getIdentityProviderMapper          |    ✔️     |
| Update a mapper for the identity provider (not working for some reason gives Null Pointer Exception)        |        updateIdentityProviderMapper         |    ✔️     |
| Delete a mapper for the identity provider                                                                   |        deleteIdentityProviderMapper         |    ✔️     |
| Get identity providers                                                                                      |           getIdentityProviderById           |    ✔️     |

 ## [Key](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_key_resource)

| API            | Function Name | Supported |
|----------------|:-------------:|:---------:|
| Get Realm keys | getRealmKeys  |    ✔️     |

 ## [Protocol Mappers](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_protocol_mappers_resource)

Note: Ids are sent as clientScopeId or clientId and mapperId everything else is just as the keycloak documentation

| API                                         |                Function Name                | Supported |
|---------------------------------------------|:-------------------------------------------:|:---------:|
| Create multiple mappers                     |      createClientScopeProtocolMappers       |    ✔️     |
| Create a mapper                             |       createClientScopeProtocolMapper       |    ✔️     |
| Get mappers                                 |        getClientScopeProtocolMappers        |    ✔️     |
| Get mapper by id                            |      getClientScopeProtocolMapperById       |    ✔️     |
| Update the mapper                           |       updateClientScopeProtocolMapper       |    ✔️     |
| Delete the mapper                           |       deleteClientScopeProtocolMapper       |    ✔️     |
| Get mappers by name for a specific protocol | getClientScopeProtocolMappersByProtocolName |    ✔️     |
| Create multiple mappers                     |         createClientProtocolMappers         |    ✔️     |
| Create a mapper                             |         createClientProtocolMapper          |    ✔️     |
| Get mappers                                 |          getClientProtocolMappers           |    ✔️     |
| Get mapper by id                            |         getClientProtocolMapperById         |    ✔️     |
| Update the mapper                           |         updateClientProtocolMapper          |    ✔️     |
| Delete the mapper                           |         deleteClientProtocolMapper          |    ✔️     |
| Get mappers by name for a specific protocol |   getClientProtocolMappersByProtocolName    |    ✔️     |

 ## [Realms Admin](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_realms_admin_resource)

| API                                                                                                                                               |          Function Name          | Supported |
|---------------------------------------------------------------------------------------------------------------------------------------------------|:-------------------------------:|:---------:|
| Import a realm Imports a realm from a full representation of that realm.                                                                          |           importRealm           |    ✔️     |
| Get the top-level representation of the realm It will not include nested information like User and Client representations.                        |            getRealm             |    ✔️     |
| Update the top-level information of the realm Any user, roles or client information in the representation will be ignored.                        |           updateRealm           |    ✔️     |
| Delete the realm                                                                                                                                  |           deleteRealm           |    ✔️     |
| Get admin events Returns all admin events, or filters events based on URL query parameters listed here                                            |         getAdminEvents          |    ✔️     |
| Delete all admin events                                                                                                                           |        deleteAdminEvents        |    ✔️     |
| Clear cache of external public keys (Public keys of clients or Identity providers)                                                                |  clearExternalPublicKeysCache   |    ✔️     |
| Clear realm cache                                                                                                                                 |         clearRealmCache         |    ✔️     |
| Clear user cache                                                                                                                                  |         clearUserCache          |    ✔️     |
| Base path for importing clients under this realm.                                                                                                 |          importClient           |    ✔️     |
| Get client session stats Returns a JSON map.                                                                                                      |     getClientsSessionStats      |    ✔️     |
| GET /{realm}/credential-registrators                                                                                                              |    getCredentialRegistrators    |    ✔️     |
| Get realm default client scopes.                                                                                                                  |     getDefaultClientScopes      |    ✔️     |
| PUT /{realm}/default-default-client-scopes/{clientScopeId}                                                                                        |  setScopeAsDefaultClientScope   |    ✔️     |
| DELETE /{realm}/default-default-client-scopes/{clientScopeId}                                                                                     | unsetScopeAsDefaultClientScope  |    ✔️     |
| Get group hierarchy.                                                                                                                              |    getDefaultGroupHierarchy     |    ✔️     |
| PUT /{realm}/default-groups/{groupId}                                                                                                             |     setGroupAsDefaultGroup      |    ✔️     |
| DELETE /{realm}/default-groups/{groupId}                                                                                                          |    unsetGroupAsDefaultGroup     |    ✔️     |
| Get realm optional client scopes.                                                                                                                 |     getOptionalClientScopes     |    ✔️     |
| PUT /{realm}/default-optional-client-scopes/{clientScopeId}                                                                                       |  setScopeAsOptionalClientScope  |    ✔️     |
| DELETE /{realm}/default-optional-client-scopes/{clientScopeId}                                                                                    | unsetScopeAsOptionalClientScope |    ✔️     |
| Get events Returns all events, or filters them based on URL query parameters listed here                                                          |          getAllEvents           |    ✔️     |
| Delete all events                                                                                                                                 |         deleteAllEvents         |    ✔️     |
| Get the events provider configuration Returns JSON object with events provider configuration                                                      |         getEventsConfig         |    ✔️     |
| Update the events provider Change the events provider and/or its configuration                                                                    |       updateEventsConfig        |    ✔️     |
| Get user group by path                                                                                                                            |         getGroupByPath          |    ✔️     |
| Removes all user sessions. (Keycloak throws an exception when this one is called)                                                                 |         logoutAllUsers          |     ❌     |
| Partial export of existing realm into a JSON file.                                                                                                |       partialExportRealm        |    ✔️     |
| Partial import from a JSON file to an existing realm.                                                                                             |       partialImportRealm        |    ✔️     |
| Push the realm’s revocation policy to any client that has an admin url associated with it. (Keycloak throws an exception when this one is called) |      pushRevocationPolicy       |     ❌     |
| Remove a specific user session.                                                                                                                   |        revokeUserSession        |    ✔️     |
| Test LDAP connection                                                                                                                              |       testLDAPConnection        |    ✔️     |
| Test SMTP connection with current logged in user                                                                                                  |       testSMTPConnection        |    ✔️     |
| Get User Management Permissions                                                                                                                   |  getUserManagementPermissions   |    ✔️     |
| Update User Management Permissions                                                                                                                | updateUserManagementPermissions |    ✔️     |

 ## [Role Mapper](https://www.keycloak.org/docs-api/10.0/rest-api/index.html#_role_mapper_resource)

| API                                                                                              |           Function Name            | Supported |
|--------------------------------------------------------------------------------------------------|:----------------------------------:|:---------:|
| Get role mappings                                                                                |        getGroupRoleMappings        |    ✔️     |
| Add realm-level role mappings to the group                                                       |       addGlobalRolesToGroup        |    ✔️     |
| Get realm-level role mappings                                                                    |     getGroupRealmRoleMappings      |    ✔️     |
| Delete realm-level role mappings                                                                 |    deleteGroupRealmRoleMappings    |    ✔️     |
| Get realm-level roles that can be mapped                                                         | getAvailableGroupRealmRoleMappings |    ✔️     |
| Get effective realm-level role mappings This will recurse all composite roles to get the result. | getEffectiveGroupRealmRoleMappings |    ✔️     |
| Get role mappings                                                                                |        getUserRoleMappings         |    ✔️     |
| Add realm-level role mappings to the user                                                        |        addGlobalRolesToUser        |    ✔️     |
| Get realm-level role mappings                                                                    |      getUserRealmRoleMappings      |    ✔️     |
| Delete realm-level role mappings                                                                 |    deleteUserRealmRoleMappings     |    ✔️     |
| Get realm-level roles that can be mapped                                                         | getAvailableUserRealmRoleMappings  |    ✔️     |
| Get effective realm-level role mappings This will recurse all composite roles to get the result. | getEffectiveUserRealmRoleMappings  |    ✔️     |

 ## [Roles](https://www.keycloak.org/docs-api/7.0/rest-api/index.html#_roles_resource)

| API                                                                                                                         |             Function Name             | Supported |
|-----------------------------------------------------------------------------------------------------------------------------|:-------------------------------------:|:---------:|
| Create a new role for the realm or client (Client Specific)                                                                 |           createClientRole            |    ✔️     |
| Get all roles for the realm or client (Client Specific)                                                                     |            getClientRoles             |    ✔️     |
| Get a role by name (Client Specific)                                                                                        |             getClientRole             |    ✔️     |
| Update a role by name (Client Specific)                                                                                     |           updateClientRole            |    ✔️     |
| Delete a role by name (Client Specific)                                                                                     |           deleteClientRole            |    ✔️     |
| Add a composite to the role (Client Specific)                                                                               |     addCompositeRoleToClientRole      |    ✔️     |
| Get composites of the role (Client Specific)                                                                                |      getClientRoleCompositeRoles      |    ✔️     |
| Remove roles from the role’s composite (Client Specific)                                                                    |   deleteCompositeRoleFromClientRole   |    ✔️     |
| An app-level roles for the specified app for the role’s composite (Client Specific)                                         | getClientRoleCompositeRolesForClient  |    ✔️     |
| Get realm-level roles of the role’s composite (Client Specific)                                                             |  getClientRoleCompositeRolesForRealm  |    ✔️     |
| Return List of Groups that have the specified role name (Client Specific)                                                   |          getClientRoleGroups          |    ✔️     |
| Return object stating whether role Authoirzation permissions have been initialized or not and a reference (Client Specific) |  getClientRoleManagementPermissions   |    ✔️     |
| Update object stating whether role Authoirzation permissions have been initialized or not and a reference (Client Specific) | updateClientRoleManagementPermissions |    ✔️     |
| Return List of Users that have the specified role name (Client Specific)                                                    |          getClientRoleUsers           |    ✔️     |
| Create a new role for the realm or client                                                                                   |            createRealmRole            |    ✔️     |
| Get all roles for the realm or client                                                                                       |             getRealmRoles             |    ✔️     |
| Get a role by name                                                                                                          |             getRealmRole              |    ✔️     |
| Update a role by name                                                                                                       |            updateRealmRole            |    ✔️     |
| Delete a role by name                                                                                                       |            deleteRealmRole            |    ✔️     |
| Add a composite to the role                                                                                                 |      addCompositeRoleToRealmRole      |    ✔️     |
| Get composites of the role                                                                                                  |      getRealmRoleCompositeRoles       |    ✔️     |
| Remove roles from the role’s composite                                                                                      |   deleteCompositeRoleFromRealmRole    |    ✔️     |
| An app-level roles for the specified app for the role’s composite                                                           |  getRealmRoleCompositeRolesForClient  |    ✔️     |
| Get realm-level roles of the role’s composite                                                                               |  getRealmRoleCompositeRolesForRealm   |    ✔️     |
| Return List of Groups that have the specified role name                                                                     |          getRealmRoleGroups           |    ✔️     |
| Return object stating whether role Authoirzation permissions have been initialized or not and a reference                   |   getRealmRoleManagementPermissions   |    ✔️     |
| Update object stating whether role Authoirzation permissions have been initialized or not and a reference                   | updateRealmRoleManagementPermissions  |    ✔️     |
| Return List of Users that have the specified role name                                                                      |           getRealmRoleUsers           |    ✔️     |

 ## [Roles (by ID)](https://www.keycloak.org/docs-api/7.0/rest-api/index.html#_roles_by_id_resource)

| API                                                                                                       |                Function Name                 | Supported |
|-----------------------------------------------------------------------------------------------------------|:--------------------------------------------:|:---------:|
| Get a specific role’s representation                                                                      |               getRealmRoleById               |    ✔️     |
| Update the role                                                                                           |             updateRealmRoleById              |    ✔️     |
| Delete the role                                                                                           |             deleteRealmRoleById              |    ✔️     |
| Make the role a composite role by associating some child roles                                            |     addCompositeRoleToRealmRoleByRoleId      |    ✔️     |
| Get role’s children Returns a set of role’s children provided the role is a composite.                    |      getRealmRoleCompositeRolesByRoleId      |    ✔️     |
| Remove a set of roles from the role’s composite                                                           |   deleteCompositeRoleFromRealmRoleByRoleId   |    ✔️     |
| Get client-level roles for the client that are in the role’s composite                                    | getRealmRoleCompositeRolesForClientByRoleId  |    ✔️     |
| Get realm-level roles that are in the role’s composite                                                    |  getRealmRoleCompositeRolesForRealmByRoleId  |    ✔️     |
| Return object stating whether role Authoirzation permissions have been initialized or not and a reference |  getRealmRoleManagementPermissionsByRoleId   |    ✔️     |
| Return object stating whether role Authoirzation permissions have been initialized or not and a reference | updateRealmRoleManagementPermissionsByRoleId |    ✔️     |

 ## [Scope Mappings]()

| API                                                                                                                                                                                   | Function Name | Supported |
|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:-------------:|:---------:|
| Get all scope mappings for the client                                                                                                                                                 |               |     ❌     |
| Add client-level roles to the client’s scope                                                                                                                                          |               |     ❌     |
| Get the roles associated with a client’s scope Returns roles for the client.                                                                                                          |               |     ❌     |
| Remove client-level roles from the client’s scope.                                                                                                                                    |               |     ❌     |
| The available client-level roles Returns the roles for the client that can be associated with the client’s scope                                                                      |               |     ❌     |
| Get effective client roles Returns the roles for the client that are associated with the client’s scope.                                                                              |               |     ❌     |
| Add a set of realm-level roles to the client’s scope                                                                                                                                  |               |     ❌     |
| Get realm-level roles associated with the client’s scope                                                                                                                              |               |     ❌     |
| Remove a set of realm-level roles from the client’s scope                                                                                                                             |               |     ❌     |
| Get realm-level roles that are available to attach to this client’s scope                                                                                                             |               |     ❌     |
| Get effective realm-level roles associated with the client’s scope What this does is recurse any composite roles associated with the client’s scope and adds the roles to this lists. |               |     ❌     |
| Get all scope mappings for the client                                                                                                                                                 |               |     ❌     |
| Add client-level roles to the client’s scope                                                                                                                                          |               |     ❌     |
| Get the roles associated with a client’s scope Returns roles for the client.                                                                                                          |               |     ❌     |
| Remove client-level roles from the client’s scope.                                                                                                                                    |               |     ❌     |
| The available client-level roles Returns the roles for the client that can be associated with the client’s scope                                                                      |               |     ❌     |
| Get effective client roles Returns the roles for the client that are associated with the client’s scope.                                                                              |               |     ❌     |
| Add a set of realm-level roles to the client’s scope                                                                                                                                  |               |     ❌     |
| Get realm-level roles associated with the client’s scope                                                                                                                              |               |     ❌     |
| Remove a set of realm-level roles from the client’s scope                                                                                                                             |               |     ❌     |
| Get realm-level roles that are available to attach to this client’s scope                                                                                                             |               |     ❌     |
| Get effective realm-level roles associated with the client’s scope What this does is recurse any composite roles associated with the client’s scope and adds the roles to this lists. |               |     ❌     |

 ## [User Storage Provider]()

| API                                                                                                                    | Function Name | Supported |
|------------------------------------------------------------------------------------------------------------------------|:-------------:|:---------:|
| Need this for admin console to display simple name of provider when displaying client detail KEYCLOAK-4328             |               |     ❌     |
| Need this for admin console to display simple name of provider when displaying user detail KEYCLOAK-4328               |               |     ❌     |
| Remove imported users                                                                                                  |               |     ❌     |
| Trigger sync of users Action can be "triggerFullSync" or "triggerChangedUsersSync"                                     |               |     ❌     |
| Unlink imported users from a storage provider                                                                          |               |     ❌     |
| Trigger sync of mapper data related to ldap mapper (roles, groups, …​) direction is "fedToKeycloak" or "keycloakToFed" |               |     ❌     |

 ## [Users]()

| API                                                                                                                                                                |    Function Name    | Supported |
|--------------------------------------------------------------------------------------------------------------------------------------------------------------------|:-------------------:|:---------:|
| Create a new user Username must be unique.                                                                                                                         |     createUser      |    ✔️     |
| Get users Returns a list of users, filtered according to query parameters                                                                                          |      getUsers       |    ✔️     |
| GET /{realm}/users/count                                                                                                                                           |    getUserCount     |    ✔️     |
| Get representation of the user                                                                                                                                     |       getUser       |   ️️️✔️   |
| Update the user                                                                                                                                                    |     updateUser      |   ️️️✔️   |
| Delete the user                                                                                                                                                    |     deleteUser      |   ️️️✔️   |
| Get consents granted by the user                                                                                                                                   |                     |    ️✔️    |
| Revoke consent and offline tokens for particular client from user                                                                                                  |                     |     ❌     |
| Disable all credentials for a user of a specific type                                                                                                              |                     |     ❌     |
| Send a update account email to the user An email contains a link the user can click to perform a set of required actions.                                          | executeActionsEmail |    ✔️     |
| Get social logins associated with the user                                                                                                                         |                     |    ✔️     |
| Add a social login provider to the user                                                                                                                            |                     |    ✔️     |
| Remove a social login provider from user                                                                                                                           |                     |    ✔️     |
| GET /{realm}/users/{id}/groups                                                                                                                                     |    getUserGroups    |    ✔️     |
| GET /{realm}/users/{id}/groups/count                                                                                                                               | getUserGroupsCount  |    ✔️     |
| PUT /{realm}/users/{id}/groups/{groupId}                                                                                                                           |   addUserToGroup    |    ✔️     | 
| DELETE /{realm}/users/{id}/groups/{groupId}                                                                                                                        | deleteUserFromGroup |    ✔️     |
| Impersonate the user                                                                                                                                               |   impersonateUser   |    ✔️     |
| Remove all user sessions associated with the user Also send notification to all clients that have an admin URL to invalidate the sessions for the particular user. |     logoutUser      |    ✔️     |
| Get offline sessions associated with the user and client                                                                                                           |                     |     ❌     |
| Remove TOTP from the user                                                                                                                                          |                     |     ❌     |
| Set up a new password for the user.                                                                                                                                |  resetUserPassword  |    ✔️     |
| Send an email-verification email to the user An email contains a link the user can click to verify their email address.                                            |   sendVerifyEmail   |    ✔️     |
| Get sessions associated with the user                                                                                                                              |   getUserSessions   |    ✔️     |
| Get credentials associated with the user                                                                                                                           | getUserCredentials  |    ✔️     |

 ## [Root]()

| API                                                                                        | Function Name | Supported |
|--------------------------------------------------------------------------------------------|:-------------:|:---------:|
| Get themes, social providers, auth providers, and event listeners available on this server |               |     ❌     |
| CORS preflight                                                                             |               |     ❌     |
