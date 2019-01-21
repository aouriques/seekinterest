<?php
return [
    'service_manager' => [
        'factories' => [
            \Account\V1\Rest\User\UserResource::class => \Account\V1\Rest\User\UserResourceFactory::class,
            \Account\V1\Rest\User\UserTableGatewayMapper::class => \Account\V1\Rest\User\UserTableGatewayMapperFactory::class,
            \Account\V1\Rest\User\UserTableGateway::class => \Account\V1\Rest\User\UserTableGatewayFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'account.rest.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'Account\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'account.rest.user',
        ],
    ],
    'zf-rest' => [
        'Account\\V1\\Rest\\User\\Controller' => [
            'listener' => \Account\V1\Rest\User\UserResource::class,
            'route_name' => 'account.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Account\V1\Rest\User\UserEntity::class,
            'collection_class' => \Account\V1\Rest\User\UserCollection::class,
            'service_name' => 'User',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Account\\V1\\Rest\\User\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Account\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.account.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Account\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.account.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Account\V1\Rest\User\UserEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'account.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => \Zend\Hydrator\ObjectPropertyHydrator::class,
            ],
            \Account\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'account.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Account\\V1\\Rest\\User\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
    'module-db-config' => [
        'Account\\V1\\Rest\\User' => [
            'adapter_name' => 'dbAdapter',
            'table_name' => 'users',
            'hydrator_name' => \Zend\Hydrator\ObjectPropertyHydrator::class,
            'entity_identifier_name' => 'id',
            'table_service' => 'Account\\V1\\Rest\\User\\UserTableGateway',
            'table_mapper' => 'Account\\V1\\Rest\\User\\UserTableGatewayMapper',
        ],
    ],
];
