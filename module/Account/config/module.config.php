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
            'collection_class' => \Account\V1\Rest\User\UserCollection::class,
            'table_service' => \Account\V1\Rest\User\UserTableGateway::class,
            'table_mapper' => \Account\V1\Rest\User\UserTableGatewayMapper::class,
        ],
    ],
    'zf-content-validation' => [
        'Account\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'Account\\V1\\Rest\\User\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Account\\V1\\Rest\\User\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'allowwhitespace' => false,
                            'min' => '2',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [
                            'charlist' => '',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    2 => [
                        'name' => \Zend\Filter\UpperCaseWords::class,
                        'options' => [],
                    ],
                ],
                'name' => 'first_name',
                'field_type' => 'string',
                'error_message' => 'Invalid first name.',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'allowwhitespace' => false,
                            'min' => '2',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [
                            'charlist' => '',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    2 => [
                        'name' => \Zend\Filter\UpperCaseWords::class,
                        'options' => [],
                    ],
                ],
                'name' => 'last_name',
                'field_type' => 'string',
                'error_message' => 'Invalid last name.',
            ],
            2 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\EmailAddress::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => [
                            'table' => 'users',
                            'field' => 'email',
                            'adapter' => 'dbAdapter',
                            'schema' => 'seekinterest',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringToLower::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    2 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'email',
                'field_type' => 'string',
                'error_message' => 'Invalid email.',
            ],
        ],
    ],
];
