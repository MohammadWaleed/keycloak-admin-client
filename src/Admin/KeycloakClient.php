<?php

namespace Keycloak\Admin;

use Keycloak\Admin\Middleware\RefreshToken;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\Serializer;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Keycloak\Admin\Classes\FullBodyLocation;

/**
 * Class KeycloakClient
 *
 * @package Keycloak\Admin\Client
 * 
 * @method array clearAllLoginFailures(array $args = array()) { @command Keycloak clearAllLoginFailures }
 * @method array getBruteForceUserStatus(array $args = array()) { @command Keycloak getBruteForceUserStatus }
 * @method array clearUserLoginFailures(array $args = array()) { @command Keycloak clearUserLoginFailures }
 * 
 * @method array getAuthenticatorProviders(array $args = array()) { @command Keycloak getAuthenticatorProviders }
 * @method array getClientAuthenticatorProviders(array $args = array()) { @command Keycloak getClientAuthenticatorProviders }
 * @method array getAuthenticatorConfigInfo(array $args = array()) { @command Keycloak getAuthenticatorConfigInfo }
 * @method array getAuthenticatorConfig(array $args = array()) { @command Keycloak getAuthenticatorConfig }
 * @method array updateAuthenticatorConfig(array $args = array()) { @command Keycloak updateAuthenticatorConfig }
 * @method array deleteAuthenticatorConfig(array $args = array()) { @command Keycloak deleteAuthenticatorConfig }
 * @method array createAuthenticationExecution(array $args = array()) { @command Keycloak createAuthenticationExecution }
 * @method array getAuthenticationExecution(array $args = array()) { @command Keycloak getAuthenticationExecution }
 * @method array deleteAuthenticationExecution(array $args = array()) { @command Keycloak deleteAuthenticationExecution }
 * @method array updateAuthenticationExecution(array $args = array()) { @command Keycloak updateAuthenticationExecution }
 * @method array lowerAuthenticationExecutionPriority(array $args = array()) { @command Keycloak lowerAuthenticationExecutionPriority }
 * @method array raiseAuthenticationExecutionPriority(array $args = array()) { @command Keycloak raiseAuthenticationExecutionPriority }
 * @method array createAuthenticationFlow(array $args = array()) { @command Keycloak createAuthenticationFlow }
 * @method array getAuthenticationFlows(array $args = array()) { @command Keycloak getAuthenticationFlows }
 * @method array copyAuthenticationFlow(array $args = array()) { @command Keycloak copyAuthenticationFlow }
 * @method array getAuthenticationFlowExecutions(array $args = array()) { @command Keycloak getAuthenticationFlowExecutions }
 * @method array updateAuthenticationFlowExecutions(array $args = array()) { @command Keycloak updateAuthenticationFlowExecutions }
 * @method array createAuthenticationFlowExecution(array $args = array()) { @command Keycloak createAuthenticationFlowExecution }
 * @method array addAuthenticationFlowExecution(array $args = array()) { @command Keycloak addAuthenticationFlowExecution }
 * @method array getAuthenticationFlow(array $args = array()) { @command Keycloak getAuthenticationFlow }
 * @method array updateAuthenticationFlow(array $args = array()) { @command Keycloak updateAuthenticationFlow }
 * @method array deleteAuthenticationFlow(array $args = array()) { @command Keycloak deleteAuthenticationFlow }
 * @method array getFormActionProviders(array $args = array()) { @command Keycloak getFormActionProviders }
 * @method array getFormProviders(array $args = array()) { @command Keycloak getFormProviders }
 * @method array getClientsConfigDescriptions(array $args = array()) { @command Keycloak getClientsConfigDescriptions }
 * @method array createRequiredAction(array $args = array()) { @command Keycloak createRequiredAction }
 * @method array getRequiredActions(array $args = array()) { @command Keycloak getRequiredActions }
 * @method array getAliasRequiredAction(array $args = array()) { @command Keycloak getAliasRequiredAction }
 * @method array updateRequiredAction(array $args = array()) { @command Keycloak updateRequiredAction }
 * @method array deleteRequiredAction(array $args = array()) { @command Keycloak deleteRequiredAction }
 * @method array lowerRequiredActionPriority(array $args = array()) { @command Keycloak lowerRequiredActionPriority }
 * @method array raiseRequiredActionPriority(array $args = array()) { @command Keycloak raiseRequiredActionPriority }
 * @method array getUnregisteredRequiredActions(array $args = array()) { @command Keycloak getUnregisteredRequiredActions }
 * 
 * @method array getClientKeyInfo(array $args = array()) { @command Keycloak getClientKeyInfo }
 * @method array getClientKeyStore(array $args = array()) { @command Keycloak getClientKeyStore }
 * @method array generateClientCertificate(array $args = array()) { @command Keycloak generateClientCertificate }
 * @method array generateDownloadClientCertificate(array $args = array()) { @command Keycloak generateDownloadClientCertificate }
 * @method array uploadClientCertificateAndPrivateKey(array $args = array()) { @command Keycloak uploadClientCertificateAndPrivateKey }
 * @method array uploadClientCertificateOnly(array $args = array()) { @command Keycloak uploadClientCertificateOnly }
 * 
 * @method array createClientInitialAccessToken(array $args = array()) { @command Keycloak createClientInitialAccessToken }
 * @method array getClientInitialAccessTokens(array $args = array()) { @command Keycloak getClientInitialAccessTokens }
 * @method array deleteClientInitialAccessToken(array $args = array()) { @command Keycloak deleteClientInitialAccessToken }
 * 
 * @method array getClientRegistrationPolicyProviders(array $args = array()) { @command Keycloak deleteClientInitialAccessToken }
 * 
 * @method array addGroupClientRoleMappings(array $args = array()) { @command Keycloak addGroupClientRoleMappings }
 * @method array getGroupClientRoleMappings(array $args = array()) { @command Keycloak getGroupClientRoleMappings }
 * @method array deleteGroupClientRoleMappings(array $args = array()) { @command Keycloak deleteGroupClientRoleMappings }
 * @method array getAvailableGroupClientRoleMappings(array $args = array()) { @command Keycloak getAvailableGroupClientRoleMappings }
 * @method array getGroupClientRoleMappingsWithComposite(array $args = array()) { @command Keycloak getGroupClientRoleMappingsWithComposite }
 * @method array addUserClientRoleMappings(array $args = array()) { @command Keycloak addUserClientRoleMappings }
 * @method array getUserClientRoleMappings(array $args = array()) { @command Keycloak getUserClientRoleMappings }
 * @method array deleteUserClientRoleMappings(array $args = array()) { @command Keycloak deleteUserClientRoleMappings }
 * @method array getAvailableUserClientRoleMappings(array $args = array()) { @command Keycloak getAvailableUserClientRoleMappings }
 * @method array getUserClientRoleMappingsWithComposite(array $args = array()) { @command Keycloak getUserClientRoleMappingsWithComposite }
 * 
 * @method array createClientScope(array $args = array()) { @command Keycloak createClientScope }
 * @method array getClientScopes(array $args = array()) { @command Keycloak getClientScopes }
 * @method array getClientScope(array $args = array()) { @command Keycloak getClientScope }
 * @method array updateClientScope(array $args = array()) { @command Keycloak updateClientScope }
 * @method array deleteClientScope(array $args = array()) { @command Keycloak deleteClientScope }
 * 
 * @method array createClient(array $args = array()) { @command Keycloak createClient }
 * @method array getClients(array $args = array()) { @command Keycloak getClients }
 * @method array getClient(array $args = array()) { @command Keycloak getClient }
 * @method array updateClient(array $args = array()) { @command Keycloak updateClient }
 * @method array deleteClient(array $args = array()) { @command Keycloak deleteClient }
 * @method array generateClientSecret(array $args = array()) { @command Keycloak generateClientSecret }
 * @method array getClientSecret(array $args = array()) { @command Keycloak getClientSecret }
 * @method array getClientDefaultScopes(array $args = array()) { @command Keycloak getClientDefaultScopes }
 * @method array setClientScopeAsDefault(array $args = array()) { @command Keycloak setClientScopeAsDefault }
 * @method array removeClientScopeAsDefault(array $args = array()) { @command Keycloak removeClientScopeAsDefault }
 * @method array getClientExampleAccessToken(array $args = array()) { @command Keycloak getClientExampleAccessToken }
 * @method array getClientProtocolMappers(array $args = array()) { @command Keycloak getClientProtocolMappers }
 * @method array getClientAllowedRoleMappingsInContainer(array $args = array()) { @command Keycloak getClientAllowedRoleMappingsInContainer }
 * @method array getClientNotAllowedRoleMappingsInContainer(array $args = array()) { @command Keycloak getClientNotAllowedRoleMappingsInContainer }
 * @method array getClientInstallationConfiguration(array $args = array()) { @command Keycloak getClientInstallationConfiguration }
 * @method array getClientAuthorizationPermissionsStatus(array $args = array()) { @command Keycloak getClientAuthorizationPermissionsStatus }
 * @method array updateClientAuthorizationPermissionsStatus(array $args = array()) { @command Keycloak updateClientAuthorizationPermissionsStatus }
 * @method array registerClientClusterNode(array $args = array()) { @command Keycloak registerClientClusterNode }
 * @method array unregisterClientClusterNode(array $args = array()) { @command Keycloak unregisterClientClusterNode }
 * @method array getClientOfflineSessionsCount(array $args = array()) { @command Keycloak getClientOfflineSessionsCount }
 * @method array getClientOfflineSessions(array $args = array()) { @command Keycloak getClientOfflineSessions }
 * @method array getClientOptionalScopes(array $args = array()) { @command Keycloak getClientOptionalScopes }
 * @method array assignClientOptionalScope(array $args = array()) { @command Keycloak assignClientOptionalScope }
 * @method array unassignClientOptionalScope(array $args = array()) { @command Keycloak unassignClientOptionalScope }
 * @method array pushClientRevocationPolicy(array $args = array()) { @command Keycloak pushClientRevocationPolicy }
 * @method array generateClientRegistrationToken(array $args = array()) { @command Keycloak generateClientRegistrationToken }
 * @method array getServiceAccountDedicatedUser(array $args = array()) { @command Keycloak getServiceAccountDedicatedUser }
 * @method array getClientSessionsCount(array $args = array()) { @command Keycloak getClientSessionsCount }
 * @method array testClientNodesAvailability(array $args = array()) { @command Keycloak testClientNodesAvailability }
 * @method array getClientSessions(array $args = array()) { @command Keycloak getClientSessions }
 * 
 * @method array createComponent(array $args = array()) { @command Keycloak createComponent }
 * @method array getComponents(array $args = array()) { @command Keycloak getComponents }
 * @method array getComponent(array $args = array()) { @command Keycloak getComponent }
 * @method array updateComponent(array $args = array()) { @command Keycloak updateComponent }
 * @method array deleteComponent(array $args = array()) { @command Keycloak deleteComponent }
 * @method array getComponentSubTypes(array $args = array()) { @command Keycloak getComponentSubTypes }
 * 
 * @method array createGroup(array $args = array()) { @command Keycloak createGroup }
 * @method array getGroups(array $args = array()) { @command Keycloak getGroups }
 * @method array getGroupsCount(array $args = array()) { @command Keycloak getGroupsCount }
 * @method array getGroup(array $args = array()) { @command Keycloak getGroup }
 * @method array updateGroup(array $args = array()) { @command Keycloak updateGroup }
 * @method array removeGroup(array $args = array()) { @command Keycloak removeGroup }
 * @method array createChildGroup(array $args = array()) { @command Keycloak createChildGroup }
 * @method array getGroupManagementPermissions(array $args = array()) { @command Keycloak getGroupManagementPermissions }
 * @method array updateGroupManagementPermissions(array $args = array()) { @command Keycloak updateGroupManagementPermissions }
 * @method array getGroupMembers(array $args = array()) { @command Keycloak getGroupMembers }
 * 
 * @method array importIdentityProvider(array $args = array()) { @command Keycloak importIdentityProvider }
 * @method array createIdentityProvider(array $args = array()) { @command Keycloak createIdentityProvider }
 * @method array getIdentityProviders(array $args = array()) { @command Keycloak getIdentityProviders }
 * @method array getIdentityProvider(array $args = array()) { @command Keycloak getIdentityProvider }
 * @method array updateIdentityProvider(array $args = array()) { @command Keycloak updateIdentityProvider }
 * @method array deleteIdentityProvider(array $args = array()) { @command Keycloak deleteIdentityProvider }
 * @method array exportIdentityProviderBrokerConfig(array $args = array()) { @command Keycloak exportIdentityProviderBrokerConfig }
 * @method array getIdentityProviderManagementPermissions(array $args = array()) { @command Keycloak getIdentityProviderManagementPermissions }
 * @method array updateIdentityProviderManagementPermissions(array $args = array()) { @command Keycloak updateIdentityProviderManagementPermissions }
 * @method array getIdentityProviderMapperTypes(array $args = array()) { @command Keycloak getIdentityProviderMapperTypes }
 * @method array createIdentityProviderMapper(array $args = array()) { @command Keycloak createIdentityProviderMapper }
 * @method array getIdentityProviderMappers(array $args = array()) { @command Keycloak getIdentityProviderMappers }
 * @method array getIdentityProviderMapper(array $args = array()) { @command Keycloak getIdentityProviderMapper }
 * @method array updateIdentityProviderMapper(array $args = array()) { @command Keycloak updateIdentityProviderMapper }
 * @method array deleteIdentityProviderMapper(array $args = array()) { @command Keycloak deleteIdentityProviderMapper }
 * @method array getIdentityProviderById(array $args = array()) { @command Keycloak getIdentityProviderById }
 * 
 * @method array createUser(array $args = array()) { @command Keycloak createUser }
 * @method array getUsers(array $args = array()) { @command Keycloak getUsers }
 * @method array getUser(array $args = array()) { @command Keycloak getUser }
 * 
 * @method array getClientRoleUsers(array $args = array()) { @command Keycloak getClientRoleUsers }
 * @method array getClientRoles(array $args = array()) { @command Keycloak getClientRoles }
 * @method array getClientRole(array $args = array()) { @command Keycloak getClientRole }
 * 
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

        $description = new Description(include __DIR__ . "/Resources/{$file}");
        // Create the new Keycloak Client with our Configuration
        return new self(
            new Client($config),
            $description,
            new Serializer($description, [
                "fullBody" => new FullBodyLocation()
            ]),
            function ($response) {
                $responseBody = $response->getBody()->getContents();
                return json_decode($responseBody, true) ?? ['content' => $responseBody];
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
