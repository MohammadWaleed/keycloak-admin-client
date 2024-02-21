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
use Keycloak\Admin\Classes\FullTextLocation;
use Keycloak\Admin\TokenStorages\RuntimeTokenStorage;

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
 * @method array getGroupChildren(array $args = array()) { @command Keycloak getGroupChildren }
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
 * @method array getRealmKeys(array $args = array()) { @command Keycloak getRealmKeys }
 *
 * @method array createClientScopeProtocolMappers(array $args = array()) { @command Keycloak createClientScopeProtocolMappers }
 * @method array createClientScopeProtocolMapper(array $args = array()) { @command Keycloak createClientScopeProtocolMapper }
 * @method array getClientScopeProtocolMappers(array $args = array()) { @command Keycloak getClientScopeProtocolMappers }
 * @method array getClientScopeProtocolMapperById(array $args = array()) { @command Keycloak getClientScopeProtocolMapperById }
 * @method array updateClientScopeProtocolMapper(array $args = array()) { @command Keycloak updateClientScopeProtocolMapper }
 * @method array deleteClientScopeProtocolMapper(array $args = array()) { @command Keycloak deleteClientScopeProtocolMapper }
 * @method array getClientScopeProtocolMappersByProtocolName(array $args = array()) { @command Keycloak getClientScopeProtocolMappersByProtocolName }
 * @method array createClientProtocolMappers(array $args = array()) { @command Keycloak createClientProtocolMappers }
 * @method array createClientProtocolMapper(array $args = array()) { @command Keycloak createClientProtocolMapper }
 * @method array getClientProtocolMapperById(array $args = array()) { @command Keycloak getClientProtocolMapperById }
 * @method array updateClientProtocolMapper(array $args = array()) { @command Keycloak updateClientProtocolMapper }
 * @method array deleteClientProtocolMapper(array $args = array()) { @command Keycloak deleteClientProtocolMapper }
 * @method array getClientProtocolMappersByProtocolName(array $args = array()) { @command Keycloak getClientProtocolMappersByProtocolName }
 *
 * @method array importRealm(array $args = array()) { @command Keycloak importRealm }
 * @method array getRealm(array $args = array()) { @command Keycloak getRealm }
 * @method array updateRealm(array $args = array()) { @command Keycloak updateRealm }
 * @method array deleteRealm(array $args = array()) { @command Keycloak deleteRealm }
 * @method array getAdminEvents(array $args = array()) { @command Keycloak getAdminEvents }
 * @method array deleteAdminEvents(array $args = array()) { @command Keycloak deleteAdminEvents }
 * @method array clearExternalPublicKeysCache(array $args = array()) { @command Keycloak clearExternalPublicKeysCache }
 * @method array clearRealmCache(array $args = array()) { @command Keycloak clearRealmCache }
 * @method array clearUserCache(array $args = array()) { @command Keycloak clearUserCache }
 * @method array importClient(array $args = array()) { @command Keycloak importClient }
 * @method array getClientsSessionStats(array $args = array()) { @command Keycloak getClientsSessionStats }
 * @method array getCredentialRegistrators(array $args = array()) { @command Keycloak getCredentialRegistrators }
 * @method array getDefaultClientScopes(array $args = array()) { @command Keycloak getDefaultClientScopes }
 * @method array setScopeAsDefaultClientScope(array $args = array()) { @command Keycloak setScopeAsDefaultClientScope }
 * @method array unsetScopeAsDefaultClientScope	(array $args = array()) { @command Keycloak unsetScopeAsDefaultClientScope	 }
 * @method array getDefaultGroupHierarchy(array $args = array()) { @command Keycloak getDefaultGroupHierarchy }
 * @method array setGroupAsDefaultGroup(array $args = array()) { @command Keycloak setGroupAsDefaultGroup }
 * @method array unsetGroupAsDefaultGroup(array $args = array()) { @command Keycloak unsetGroupAsDefaultGroup }
 * @method array getOptionalClientScopes(array $args = array()) { @command Keycloak getOptionalClientScopes }
 * @method array setScopeAsOptionalClientScope(array $args = array()) { @command Keycloak setScopeAsOptionalClientScope }
 * @method array unsetScopeAsOptionalClientScope(array $args = array()) { @command Keycloak unsetScopeAsOptionalClientScope }
 * @method array getAllEvents(array $args = array()) { @command Keycloak getAllEvents }
 * @method array deleteAllEvents(array $args = array()) { @command Keycloak deleteAllEvents }
 * @method array getEventsConfig(array $args = array()) { @command Keycloak getEventsConfig }
 * @method array updateEventsConfig(array $args = array()) { @command Keycloak updateEventsConfig }
 * @method array getGroupByPath(array $args = array()) { @command Keycloak getGroupByPath }
 * @method array getLocalizationLocales(array $args = array()) { @command Keycloak getLocalizationLocales }
 * @method array getLocalizationTexts(array $args = array()) { @command Keycloak getLocalizationTexts }
 * @method array updateLocalizationTexts(array $args = array()) { @command Keycloak updateLocalizationTexts }
 * @method array deleteLocalizationTexts(array $args = array()) { @command Keycloak deleteLocalizationTexts }
 * @method array getLocalizationText(array $args = array()) { @command Keycloak getLocalizationText }
 * @method array saveLocalizationText(array $args = array()) { @command Keycloak saveLocalizationText }
 * @method array deleteLocalizationText(array $args = array()) { @command Keycloak deleteLocalizationText }
 * @method array logoutAllUsers(array $args = array()) { @command Keycloak logoutAllUsers }
 * @method array partialExportRealm(array $args = array()) { @command Keycloak partialExportRealm }
 * @method array partialImportRealm(array $args = array()) { @command Keycloak partialImportRealm }
 * @method array pushRevocationPolicy(array $args = array()) { @command Keycloak pushRevocationPolicy }
 * @method array revokeUserSession(array $args = array()) { @command Keycloak revokeUserSession }
 * @method array testLDAPConnection(array $args = array()) { @command Keycloak testLDAPConnection }
 * @method array testSMTPConnection(array $args = array()) { @command Keycloak testSMTPConnection }
 * @method array getUserManagementPermissions(array $args = array()) { @command Keycloak getUserManagementPermissions }
 * @method array updateUserManagementPermissions(array $args = array()) { @command Keycloak updateUserManagementPermissions }
 *
 * @method array getGroupRoleMappings(array $args = array()) { @command Keycloak getGroupRoleMappings }
 * @method array addGlobalRolesToGroup(array $args = array()) { @command Keycloak addGlobalRolesToGroup }
 * @method array getGroupRealmRoleMappings(array $args = array()) { @command Keycloak getGroupRealmRoleMappings }
 * @method array deleteGroupRealmRoleMappings(array $args = array()) { @command Keycloak deleteGroupRealmRoleMappings }
 * @method array getAvailableGroupRealmRoleMappings	(array $args = array()) { @command Keycloak getAvailableGroupRealmRoleMappings	 }
 * @method array getEffectiveGroupRealmRoleMappings	(array $args = array()) { @command Keycloak getEffectiveGroupRealmRoleMappings	 }
 * @method array getUserRoleMappings(array $args = array()) { @command Keycloak getUserRoleMappings }
 * @method array addGlobalRolesToUser(array $args = array()) { @command Keycloak addGlobalRolesToUser }
 * @method array getUserRealmRoleMappings(array $args = array()) { @command Keycloak getUserRealmRoleMappings }
 * @method array deleteUserRealmRoleMappings(array $args = array()) { @command Keycloak deleteUserRealmRoleMappings }
 * @method array getAvailableUserRealmRoleMappings(array $args = array()) { @command Keycloak getAvailableUserRealmRoleMappings }
 * @method array getEffectiveUserRealmRoleMappings(array $args = array()) { @command Keycloak getEffectiveUserRealmRoleMappings }
 *
 * @method array createClientRole (array $args = array()) { @command Keycloak createClientRole }
 * @method array getClientRoles (array $args = array()) { @command Keycloak getClientRoles }
 * @method array getClientRole (array $args = array()) { @command Keycloak getClientRole }
 * @method array updateClientRole (array $args = array()) { @command Keycloak updateClientRole }
 * @method array deleteClientRole (array $args = array()) { @command Keycloak deleteClientRole }
 * @method array addCompositeRoleToClientRole (array $args = array()) { @command Keycloak addCompositeRoleToClientRole }
 * @method array getClientRoleCompositeRoles (array $args = array()) { @command Keycloak getClientRoleCompositeRoles }
 * @method array deleteCompositeRoleFromClientRole (array $args = array()) { @command Keycloak deleteCompositeRoleFromClientRole }
 * @method array getClientRoleCompositeRolesForClient (array $args = array()) { @command Keycloak getClientRoleCompositeRolesForClient }
 * @method array getClientRoleCompositeRolesForRealm (array $args = array()) { @command Keycloak getClientRoleCompositeRolesForRealm }
 * @method array getClientRoleGroups (array $args = array()) { @command Keycloak getClientRoleGroups }
 * @method array getClientRoleManagementPermissions (array $args = array()) { @command Keycloak getClientRoleManagementPermissions }
 * @method array updateClientRoleManagementPermissions (array $args = array()) { @command Keycloak updateClientRoleManagementPermissions }
 * @method array getClientRoleUsers (array $args = array()) { @command Keycloak getClientRoleUsers }
 * @method array createRealmRole (array $args = array()) { @command Keycloak createRealmRole }
 * @method array getRealmRoles (array $args = array()) { @command Keycloak getRealmRoles }
 * @method array getRealmRole (array $args = array()) { @command Keycloak getRealmRole }
 * @method array updateRealmRole (array $args = array()) { @command Keycloak updateRealmRole }
 * @method array deleteRealmRole (array $args = array()) { @command Keycloak deleteRealmRole }
 * @method array addCompositeRoleToRealmRole (array $args = array()) { @command Keycloak addCompositeRoleToRealmRole }
 * @method array getRealmRoleCompositeRoles (array $args = array()) { @command Keycloak getRealmRoleCompositeRoles }
 * @method array deleteCompositeRoleFromRealmRole (array $args = array()) { @command Keycloak deleteCompositeRoleFromRealmRole }
 * @method array getRealmRoleCompositeRolesForClient (array $args = array()) { @command Keycloak getRealmRoleCompositeRolesForClient }
 * @method array getRealmRoleCompositeRolesForRealm (array $args = array()) { @command Keycloak getRealmRoleCompositeRolesForRealm }
 * @method array getRealmRoleGroups (array $args = array()) { @command Keycloak getRealmRoleGroups }
 * @method array getRealmRoleManagementPermissions (array $args = array()) { @command Keycloak getRealmRoleManagementPermissions }
 * @method array updateRealmRoleManagementPermissions (array $args = array()) { @command Keycloak updateRealmRoleManagementPermissions }
 * @method array getRealmRoleUsers (array $args = array()) { @command Keycloak getRealmRoleUsers }
 *
 * @method array getRealmRoleById (array $args = array()) { @command Keycloak getRealmRoleById }
 * @method array updateRealmRoleById (array $args = array()) { @command Keycloak updateRealmRoleById }
 * @method array deleteRealmRoleById (array $args = array()) { @command Keycloak deleteRealmRoleById }
 * @method array addCompositeRoleToRealmRoleByRoleId (array $args = array()) { @command Keycloak addCompositeRoleToRealmRoleByRoleId }
 * @method array getRealmRoleCompositeRolesByRoleId (array $args = array()) { @command Keycloak getRealmRoleCompositeRolesByRoleId }
 * @method array deleteCompositeRoleFromRealmRoleByRoleId (array $args = array()) { @command Keycloak deleteCompositeRoleFromRealmRoleByRoleId }
 * @method array getRealmRoleCompositeRolesForClientByRoleId (array $args = array()) { @command Keycloak getRealmRoleCompositeRolesForClientByRoleId }
 * @method array getRealmRoleCompositeRolesForRealmByRoleId (array $args = array()) { @command Keycloak getRealmRoleCompositeRolesForRealmByRoleId }
 * @method array getRealmRoleManagementPermissionsByRoleId (array $args = array()) { @command Keycloak getRealmRoleManagementPermissionsByRoleId }
 * @method array updateRealmRoleManagementPermissionsByRoleId (array $args = array()) { @command Keycloak updateRealmRoleManagementPermissionsByRoleId }
 *
 * @method array createUser(array $args = array()) { @command Keycloak createUser }
 * @method array getUserCount(array $args = array()) { @command Keycloak getUserCount }
 * @method array getUsers(array $args = array()) { @command Keycloak getUsers }
 * @method array getUser(array $args = array()) { @command Keycloak getUser }
 * @method array getUserGroups(array $args = array()) { @command Keycloak getUserGroups }
 * @method array getUserGroupsCount(array $args = array()) { @command Keycloak getUserGroupsCount }
 * @method array updateUser(array $args = array()) { @command Keycloak updateUser }
 * @method array deleteUser(array $args = array()) { @command Keycloak deleteUser }
 * @method array executeActionsEmail(array $args = array()) { @command Keycloak executeActionsEmail }
 * @method array sendVerifyEmail(array $args = array()) { @command Keycloak sendVerifyEmail }
 * @method array addUserToGroup(array $args = array()) { @command Keycloak addUserToGroup }
 * @method array deleteUserFromGroup(array $args = array()) { @command Keycloak deleteUserFromGroup }
 * @method array resetUserPassword(array $args = array()) { @command Keycloak resetUserPassword }
 * @method array getUserSessions(array $args = array()) { @command Keycloak getUserSessions }
 * @method array getUserCredentials(array $args = array()) { @command Keycloak getUserCredentials }
 * @method array deleteUserCredential(array $args = array()) { @command Keycloak deleteUserCredential }
 * @method array impersonateUser(array $args = array()) { @command Keycloak impersonateUser }
 * @method array logoutUser(array $args = array()) { @command Keycloak logoutUser }
 *
 * @method array getSocialLogins(array $args = array()) { @command Keycloak getSocialLogins }
 * @method array addSocialLogin(array $args = array()) { @command Keycloak addSocialLogin }
 * @method array removeSocialLogin(array $args = array()) { @command Keycloak removeSocialLogin }
 * @method array syncUserStorage(array $args = array()) { @command Keycloak syncUserStorage }
 * @method array getUserConsents(array $args = array()) { @command Keycloak getUserConsents }
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
            'apiVersion'  => '1.0',
            'username' => null,
            'password' => null,
            'realm'    => 'master',
            'baseUri'  => null,
            'verify'   => true,
            'token_storage' => new RuntimeTokenStorage(),
        );

        // Create client configuration
        $config = self::parseConfig($config, $default);

        $file = 'keycloak-' . str_replace('.', '_', $config['apiVersion']) . '.php';

        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());

        $middlewares = isset($config["middlewares"]) && is_array($config["middlewares"]) ? $config["middlewares"] : [];
        foreach ($middlewares as $middleware) {
            if (is_callable($middleware)) {
                $stack->push($middleware);
            }
        }

        $stack->push(new RefreshToken($config['token_storage']));

        $config['handler'] = $stack;

        $serviceDescription = include __DIR__ . "/Resources/{$file}";
        $customOperations = isset($config["custom_operations"]) && is_array($config["custom_operations"]) ? $config["custom_operations"] : [];
        foreach ($customOperations as $operationKey => $operation) {
            // Do not override built-in functionality
            if (isset($serviceDescription['operations'][$operationKey])) {
                continue;
            }
            $serviceDescription['operations'][$operationKey] = $operation;
        }
        $description = new Description($serviceDescription);

        // Create the new Keycloak Client with our Configuration
        return new static(
            new Client($config),
            $description,
            new Serializer($description, [
                "fullBody" => new FullBodyLocation(),
                "fullText" => new FullTextLocation(),
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
        if (!isset($params['realm'])) {
            $params['realm'] = $this->getRealmName();
        }
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
        return $this->getConfig('baseUri');
    }


    /**
     * Sets the Realm name used by the Keycloak Client
     *
     * @param string $realm
     */
    public function setRealmName($realm)
    {
        $this->setConfig('realm', $realm);
    }

    /**
     * Gets the Realm name being used by the Keycloak Client
     *
     * @return string|null Value of the realm or NULL
     */
    public function getRealmName()
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
        $this->setConfig('apiVersion', $version);
    }

    /**
     * Gets the Version being used by the Keycloak Client
     *
     * @return string|null Value of the Version or NULL
     */
    public function getVersion()
    {
        return $this->getConfig('apiVersion');
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
            if (!isset($config[$key])) {
                $config[$key] = $value;
            }
        });
        return $config;
    }
}
