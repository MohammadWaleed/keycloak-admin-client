# keycloak-admin-php-client

This is a php client to connect to keycloak admin rest apis with no headache.

Features:
1- Easy to use 

2- No need to get token or generate it it's already handled by the client

3- No need to specify any urls other than the base uri

4- No encode/decode for json just data as you expect

works with Keycloak 7.0 admin rest api

https://www.keycloak.org/docs-api/7.0/rest-api/index.html


# How to use

1- Create new client 

```php
$client = Keycloak\Admin\KeycloakClient::factory([
    'realm'=>'master',
    'username'=>'admin',
    'password'=>'1234',
    'client_id'=>'admin-cli',
    'baseUri'=>'http://127.0.0.1:8180'
    ]);
```

2- Use it

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
    'username'=>'test',
    'email'=>'test@test.com',
    'enabled'=>true,
    'credentials'=>[
        [
            'type'=>'password',
            'value'=>'1234'
        ]
    ]
    ]);

```