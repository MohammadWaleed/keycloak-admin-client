<?php

//Temp Fixes
$Object = [];
$Map = [];
$GroupRepresentation = [];
$ScopeRepresentation = [];
//


$AccessToken_Access = array(
    'roles' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'verify_caller' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
);

$Permission = array(
    'claims' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'rsid' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'rsname' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'scopes' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
);

$AccessToken_CertConf = array(
    'x5t#S256' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$AddressClaimSet = array(
    'country' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'formatted' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'locality' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'postal_code' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'region' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'street_address' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$AuthDetailsRepresentation = array(
    'clientId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'ipAddress' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'realmId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'userId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$AuthenticationExecutionExportRepresentation = array(
    'authenticator' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'authenticatorConfig' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'authenticatorFlow' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'autheticatorFlow' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'flowAlias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'priority' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'requirement' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'userSetupAllowed' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
);

$AuthenticationExecutionInfoRepresentation = array(
    'alias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'authenticationConfig' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'authenticationFlow' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'configurable' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'displayName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'flowId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'index' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'level' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'providerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'requirement' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'requirementChoices' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
);

$AuthenticationExecutionRepresentation = array(
    'authenticator' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'authenticatorConfig' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'authenticatorFlow' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'autheticatorFlow' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'flowId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'parentFlow' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'priority' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'requirement' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$AuthenticatorConfigRepresentation = array(
    'alias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$CertificateRepresentation = array(
    'certificate' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'kid' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'privateKey' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'publicKey' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ClientInitialAccessCreatePresentation = array(
    'count' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'expiration' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
);

$ClientInitialAccessPresentation = array(
    'count' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'expiration' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'remainingCount' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'timestamp' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'token' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ClientScopeEvaluateResource_ProtocolMapperEvaluationRepresentation = array(
    'containerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'containerName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'containerType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'mapperId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'mapperName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'protocolMapper' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ConfigPropertyRepresentation = array(
    'defaultValue' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $Object,
        'required' => false
    ),
    'helpText' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'label' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'options' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'secret' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'type' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$EventRepresentation = array(
    'clientId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'details' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'error' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'ipAddress' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'realmId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'sessionId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'time' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'type' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'userId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$FederatedIdentityRepresentation = array(
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
    ),
);

$GlobalRequestResult = array(
    'failedRequests' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'successRequests' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
);

$IdentityProviderMapperRepresentation = array(
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'identityProviderAlias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'identityProviderMapper' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$IdentityProviderRepresentation = array(
    'addReadTokenRoleOnCreate' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'alias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'displayName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'enabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'firstBrokerLoginFlowAlias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'internalId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'linkOnly' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'postBrokerLoginFlowAlias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'providerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'storeToken' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'trustEmail' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
);

$KeyStoreConfig = array(
    'format' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'keyAlias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'keyPassword' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'realmAlias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'realmCertificate' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'storePassword' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$KeysMetadataRepresentation_KeyMetadataRepresentation = array(
    'algorithm' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'certificate' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'kid' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'providerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'providerPriority' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'publicKey' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'status' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'type' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ManagementPermissionReference = array(
    'enabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'resource' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'scopePermissions' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
);

$MemoryInfoRepresentation = array(
    'free' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'freeFormated' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'freePercentage' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'total' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'totalFormated' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'used' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'usedFormated' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$MultivaluedHashMap = array(
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
    ),
);

$PasswordPolicyTypeRepresentation = array(
    'configType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'defaultValue' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'displayName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'multipleSupported' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
);

$PolicyRepresentation = array(
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'decisionStrategy' => array(
        'location' => 'json',
        'type' => 'string',
        'enum' => ["AFFIRMATIVE", "UNANIMOUS", "CONSENSUS"],
        'required' => false
    ),
    'description' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'logic' => array(
        'location' => 'json',
        'type' => 'string',
        'enum' => ["POSITIVE", "NEGATIVE"],
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'owner' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'policies' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'resources' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'scopes' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'type' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ProfileInfoRepresentation = array(
    'disabledFeatures' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'experimentalFeatures' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'previewFeatures' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
);

$ProtocolMapperRepresentation = array(
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'protocol' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'protocolMapper' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ProviderRepresentation = array(
    'operationalInfo' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'order' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
);

$RealmEventsConfigRepresentation = array(
    'adminEventsDetailsEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'adminEventsEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'enabledEventTypes' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'eventsEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'eventsExpiration' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'eventsListeners' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
);

$RequiredActionProviderRepresentation = array(
    'alias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'defaultAction' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'enabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'priority' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'providerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$RoleRepresentation_Composites = array(
    'client' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'realm' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
);

$ScopeMappingRepresentation = array(
    'client' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'clientScope' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'roles' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'self' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$SpiInfoRepresentation = array(
    'internal' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'providers' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
);

$SynchronizationResult = array(
    'added' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'failed' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'ignored' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'removed' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'status' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'updated' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
);

$SystemInfoRepresentation = array(
    'fileEncoding' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'javaHome' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'javaRuntime' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'javaVendor' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'javaVersion' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'javaVm' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'javaVmVersion' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'osArchitecture' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'osName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'osVersion' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'serverTime' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'uptime' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'uptimeMillis' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'userDir' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'userLocale' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'userName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'userTimezone' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'version' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$TestLdapConnectionRepresentation = array(
    'action' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'bindCredential' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'bindDn' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'componentId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'connectionTimeout' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'connectionUrl' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'startTls' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'useTruststoreSpi' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$UserConsentRepresentation = array(
    'clientId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'createdDate' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'grantedClientScopes' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'lastUpdatedDate' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
);

$UserFederationMapperRepresentation = array(
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'federationMapperType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'federationProviderDisplayName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$UserFederationProviderRepresentation = array(
    'changedSyncPeriod' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'displayName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'fullSyncPeriod' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'lastSync' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'priority' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'providerName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$UserSessionRepresentation = array(
    'clients' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'ipAddress' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'lastAccess' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'start' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'userId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'username' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$AccessToken_Authorization = array(
    'permissions' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $Permission
        ),
        'required' => false
    ),
);

$AdminEventRepresentation = array(
    'authDetails' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $AuthDetailsRepresentation,
        'required' => false
    ),
    'error' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'operationType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'realmId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'representation' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'resourcePath' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'resourceType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'time' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
);

$AuthenticationFlowRepresentation = array(
    'alias' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'authenticationExecutions' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $AuthenticationExecutionExportRepresentation
        ),
        'required' => false
    ),
    'builtIn' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'description' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'providerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'topLevel' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
);

$AuthenticatorConfigInfoRepresentation = array(
    'helpText' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'properties' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ConfigPropertyRepresentation
        ),
        'required' => false
    ),
    'providerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$RoleRepresentation = array(
    'attributes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'clientRole' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'composite' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'composites' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $RoleRepresentation_Composites,
        'required' => false
    ),
    'containerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'description' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ClientMappingsRepresentation = array(
    'client' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'mappings' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $RoleRepresentation
        ),
        'required' => false
    ),
);

$ClientScopeRepresentation = array(
    'attributes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'description' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'protocol' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'protocolMappers' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ProtocolMapperRepresentation
        ),
        'required' => false
    ),
);

$ComponentRepresentation = array(
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $MultivaluedHashMap,
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'parentId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'providerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'providerType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'subType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ComponentTypeRepresentation = array(
    'helpText' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'metadata' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'properties' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ConfigPropertyRepresentation
        ),
        'required' => false
    ),
);

$CredentialRepresentation = array(
    'algorithm' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $MultivaluedHashMap,
        'required' => false
    ),
    'counter' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'createdDate' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'device' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'digits' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'hashIterations' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'hashedSaltedValue' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'period' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'salt' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'temporary' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'type' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'value' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$GroupRepresentation = array(
    'access' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'attributes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'clientRoles' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'path' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'realmRoles' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'subGroups' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $GroupRepresentation
        ),
        'required' => false
    ),
);

$KeysMetadataRepresentation = array(
    'active' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'keys' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $KeysMetadataRepresentation_KeyMetadataRepresentation
        ),
        'required' => false
    ),
);

$MappingsRepresentation = array(
    'clientMappings' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'realmMappings' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $RoleRepresentation
        ),
        'required' => false
    ),
);

$ResourceRepresentation = array(
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'attributes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'displayName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'icon_uri' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'ownerManagedAccess' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'scopes' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ScopeRepresentation
        ),
        'required' => false
    ),
    'type' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'uris' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
);

$RolesRepresentation = array(
    'client' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'realm' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $RoleRepresentation
        ),
        'required' => false
    ),
);

$ComponentExportRepresentation = array(
    'config' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $MultivaluedHashMap,
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'providerId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'subComponents' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $MultivaluedHashMap,
        'required' => false
    ),
    'subType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ScopeRepresentation = array(
    'displayName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'iconUri' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'policies' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $PolicyRepresentation
        ),
        'required' => false
    ),
    'resources' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ResourceRepresentation
        ),
        'required' => false
    ),
);

$ResourceServerRepresentation = array(
    'allowRemoteResourceManagement' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'clientId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'decisionStrategy' => array(
        'location' => 'json',
        'type' => 'string',
        'enum' => ["AFFIRMATIVE", "UNANIMOUS", "CONSENSUS"],
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'policies' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $PolicyRepresentation
        ),
        'required' => false
    ),
    'policyEnforcementMode' => array(
        'location' => 'json',
        'type' => 'string',
        'enum' => ["ENFORCING", "PERMISSIVE", "DISABLED"],
        'required' => false
    ),
    'resources' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ResourceRepresentation
        ),
        'required' => false
    ),
    'scopes' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ScopeRepresentation
        ),
        'required' => false
    ),
);

$ClientRepresentation = array(
    'access' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'adminUrl' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'attributes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'authenticationFlowBindingOverrides' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'authorizationServicesEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'authorizationSettings' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $ResourceServerRepresentation,
        'required' => false
    ),
    'baseUrl' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'bearerOnly' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'clientAuthenticatorType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'clientId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'consentRequired' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'defaultClientScopes' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'defaultRoles' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'description' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'directAccessGrantsEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'enabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'frontchannelLogout' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'fullScopeAllowed' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'implicitFlowEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'nodeReRegistrationTimeout' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'notBefore' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'optionalClientScopes' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'origin' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'protocol' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'protocolMappers' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ProtocolMapperRepresentation
        ),
        'required' => false
    ),
    'publicClient' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'redirectUris' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'registeredNodes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'registrationAccessToken' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'rootUrl' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'secret' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'serviceAccountsEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'standardFlowEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'surrogateAuthRequired' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'webOrigins' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
);

$UserRepresentation = array(
    'access' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'attributes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'clientConsents' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $UserConsentRepresentation
        ),
        'required' => false
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
    'credentials' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $CredentialRepresentation
        ),
        'required' => false
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
    'federatedIdentities' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $FederatedIdentityRepresentation
        ),
        'required' => false
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
    'serviceAccountClientId' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'username' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$ServerInfoRepresentation = array(
    'builtinProtocolMappers' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'clientImporters' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $Map
        ),
        'required' => false
    ),
    'clientInstallations' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'componentTypes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'enums' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'identityProviders' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $Map
        ),
        'required' => false
    ),
    'memoryInfo' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $MemoryInfoRepresentation,
        'required' => false
    ),
    'passwordPolicies' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $PasswordPolicyTypeRepresentation
        ),
        'required' => false
    ),
    'profileInfo' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $ProfileInfoRepresentation,
        'required' => false
    ),
    'protocolMapperTypes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'providers' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'socialProviders' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $Map
        ),
        'required' => false
    ),
    'systemInfo' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $SystemInfoRepresentation,
        'required' => false
    ),
    'themes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
);

$AccessToken = array(
    'acr' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'address' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $AddressClaimSet,
        'required' => false
    ),
    'allowed-origins' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'at_hash' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'auth_time' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'authorization' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $AccessToken_Authorization,
        'required' => false
    ),
    'azp' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'birthdate' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'c_hash' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'category' => array(
        'location' => 'json',
        'type' => 'string',
        'enum' => ["INTERNAL", "ACCESS", "ID", "ADMIN", "USERINFO"],
        'required' => false
    ),
    'claims_locales' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'cnf' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $AccessToken_CertConf,
        'required' => false
    ),
    'email' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'email_verified' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'exp' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'family_name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'gender' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'given_name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'iat' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'iss' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'jti' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'locale' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'middle_name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'name' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'nickname' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'nonce' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'otherClaims' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'phone_number' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'phone_number_verified' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'picture' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'preferred_username' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'profile' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'realm_access' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $AccessToken_Access,
        'required' => false
    ),
    's_hash' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'scope' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'session_state' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'sub' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'trusted-certs' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'typ' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'updated_at' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'website' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'zoneinfo' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
);

$PartialImportRepresentation = array(
    'clients' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ClientRepresentation
        ),
        'required' => false
    ),
    'groups' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $GroupRepresentation
        ),
        'required' => false
    ),
    'identityProviders' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $IdentityProviderRepresentation
        ),
        'required' => false
    ),
    'ifResourceExists' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'policy' => array(
        'location' => 'json',
        'type' => 'string',
        'enum' => ["SKIP", "OVERWRITE", "FAIL"],
        'required' => false
    ),
    'roles' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $RolesRepresentation,
        'required' => false
    ),
    'users' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $UserRepresentation
        ),
        'required' => false
    ),
);

$RealmRepresentation = array(
    'accessCodeLifespan' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'accessCodeLifespanLogin' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'accessCodeLifespanUserAction' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'accessTokenLifespan' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'accessTokenLifespanForImplicitFlow' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'accountTheme' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'actionTokenGeneratedByAdminLifespan' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'actionTokenGeneratedByUserLifespan' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'adminEventsDetailsEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'adminEventsEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'adminTheme' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'attributes' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'authenticationFlows' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $AuthenticationFlowRepresentation
        ),
        'required' => false
    ),
    'authenticatorConfig' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $AuthenticatorConfigRepresentation
        ),
        'required' => false
    ),
    'browserFlow' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'browserSecurityHeaders' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'bruteForceProtected' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'clientAuthenticationFlow' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'clientScopeMappings' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'clientScopes' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ClientScopeRepresentation
        ),
        'required' => false
    ),
    'clients' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ClientRepresentation
        ),
        'required' => false
    ),
    'components' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $MultivaluedHashMap,
        'required' => false
    ),
    'defaultDefaultClientScopes' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'defaultGroups' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'defaultLocale' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'defaultOptionalClientScopes' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'defaultRoles' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'defaultSignatureAlgorithm' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'directGrantFlow' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'displayName' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'displayNameHtml' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'dockerAuthenticationFlow' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'duplicateEmailsAllowed' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'editUsernameAllowed' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'emailTheme' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'enabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'enabledEventTypes' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'eventsEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'eventsExpiration' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'eventsListeners' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'failureFactor' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'federatedUsers' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $UserRepresentation
        ),
        'required' => false
    ),
    'groups' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $GroupRepresentation
        ),
        'required' => false
    ),
    'id' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'identityProviderMappers' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $IdentityProviderMapperRepresentation
        ),
        'required' => false
    ),
    'identityProviders' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $IdentityProviderRepresentation
        ),
        'required' => false
    ),
    'internationalizationEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'keycloakVersion' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'loginTheme' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'loginWithEmailAllowed' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'maxDeltaTimeSeconds' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'maxFailureWaitSeconds' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'minimumQuickLoginWaitSeconds' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'notBefore' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'offlineSessionIdleTimeout' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'offlineSessionMaxLifespan' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'offlineSessionMaxLifespanEnabled' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'otpPolicyAlgorithm' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'otpPolicyDigits' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'otpPolicyInitialCounter' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'otpPolicyLookAheadWindow' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'otpPolicyPeriod' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'otpPolicyType' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'otpSupportedApplications' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'passwordPolicy' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'permanentLockout' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'protocolMappers' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ProtocolMapperRepresentation
        ),
        'required' => false
    ),
    'quickLoginCheckMilliSeconds' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'realm' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'refreshTokenMaxReuse' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'registrationAllowed' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'registrationEmailAsUsername' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'registrationFlow' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'rememberMe' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'requiredActions' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $RequiredActionProviderRepresentation
        ),
        'required' => false
    ),
    'resetCredentialsFlow' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'resetPasswordAllowed' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'revokeRefreshToken' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'roles' => array(
        'location' => 'json',
        'type' => 'object',
        'properties' => $RolesRepresentation,
        'required' => false
    ),
    'scopeMappings' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $ScopeMappingRepresentation
        ),
        'required' => false
    ),
    'smtpServer' => array(
        'location' => 'json',
        'type' => 'object',
        'required' => false
    ),
    'sslRequired' => array(
        'location' => 'json',
        'type' => 'string',
        'required' => false
    ),
    'ssoSessionIdleTimeout' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'ssoSessionIdleTimeoutRememberMe' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'ssoSessionMaxLifespan' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'ssoSessionMaxLifespanRememberMe' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
    'supportedLocales' => array(
        'location' => 'json',
        'type' => 'array',
        'required' => false
    ),
    'userFederationMappers' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $UserFederationMapperRepresentation
        ),
        'required' => false
    ),
    'userFederationProviders' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $UserFederationProviderRepresentation
        ),
        'required' => false
    ),
    'userManagedAccessAllowed' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'users' => array(
        'location' => 'json',
        'type' => 'array',
        'items' => array(
            'type' => 'object', 'properties' => $UserRepresentation
        ),
        'required' => false
    ),
    'verifyEmail' => array(
        'location' => 'json',
        'type' => 'boolean',
        'required' => false
    ),
    'waitIncrementSeconds' => array(
        'location' => 'json',
        'type' => 'integer',
        'required' => false
    ),
);

$SMTPSettingsRepresentation = array(
    'host' => array(
        'location'    => 'json',
        'description' => 'host',
        'type'        => 'string',
        'required'    => false,
    ),
    'port' => array(
        'location'    => 'json',
        'description' => 'port',
        'type'        => 'string',
        'required'    => false,
    ),
    'from' => array(
        'location'    => 'json',
        'description' => 'from',
        'type'        => 'string',
        'required'    => false,
    ),
    'auth' => array(
        'location'    => 'json',
        'description' => 'auth',
        'type'        => 'string',
        'required'    => false,
    ),
    'ssl' => array(
        'location'    => 'json',
        'description' => 'ssl',
        'type'        => 'string',
        'required'    => false,
    ),
    'starttls' => array(
        'location'    => 'json',
        'description' => 'starttls',
        'type'        => 'string',
        'required'    => false,
    ),
    'user' => array(
        'location'    => 'json',
        'description' => 'username',
        'type'        => 'string',
        'required'    => false,
    ),
    'password' => array(
        'location'    => 'json',
        'description' => 'password',
        'type'        => 'string',
        'required'    => false,
    ),
    'replyTo' => array(
        'location'    => 'json',
        'description' => 'replyTo',
        'type'        => 'string',
        'required'    => false,
    ),
    'envelopeFrom' => array(
        'location'    => 'json',
        'description' => 'envelopeFrom',
        'type'        => 'string',
        'required'    => false,
    ),
);
