<?php
return [
    'service_manager' => [
        'factories' => [
            \Interest\V1\Rest\Interest\InterestResource::class => \Interest\V1\Rest\Interest\InterestResourceFactory::class,
            \Interest\V1\Rest\Interest\InterestTableGatewayMapper::class => \Interest\V1\Rest\Interest\InterestTableGatewayMapperFactory::class,
            \Interest\V1\Rest\Interest\InterestTableGateway::class => \Interest\V1\Rest\Interest\InterestTableGatewayFactory::class,
            \Interest\V1\Rest\Event\EventResource::class => \Interest\V1\Rest\Event\EventResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'interest.rest.interest' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/interest[/:interest_id]',
                    'defaults' => [
                        'controller' => 'Interest\\V1\\Rest\\Interest\\Controller',
                    ],
                ],
            ],
            'interest.rest.event' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/event[/:event_id]',
                    'defaults' => [
                        'controller' => 'Interest\\V1\\Rest\\Event\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'interest.rest.interest',
            1 => 'interest.rest.event',
        ],
    ],
    'zf-rest' => [
        'Interest\\V1\\Rest\\Interest\\Controller' => [
            'listener' => \Interest\V1\Rest\Interest\InterestResource::class,
            'route_name' => 'interest.rest.interest',
            'route_identifier_name' => 'interest_id',
            'collection_name' => 'interest',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Interest\V1\Rest\Interest\InterestEntity::class,
            'collection_class' => \Interest\V1\Rest\Interest\InterestCollection::class,
            'service_name' => 'Interest',
        ],
        'Interest\\V1\\Rest\\Event\\Controller' => [
            'listener' => \Interest\V1\Rest\Event\EventResource::class,
            'route_name' => 'interest.rest.event',
            'route_identifier_name' => 'event_id',
            'collection_name' => 'event',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Interest\V1\Rest\Event\EventEntity::class,
            'collection_class' => \Interest\V1\Rest\Event\EventCollection::class,
            'service_name' => 'Event',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Interest\\V1\\Rest\\Interest\\Controller' => 'HalJson',
            'Interest\\V1\\Rest\\Event\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Interest\\V1\\Rest\\Interest\\Controller' => [
                0 => 'application/vnd.interest.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Interest\\V1\\Rest\\Event\\Controller' => [
                0 => 'application/vnd.interest.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Interest\\V1\\Rest\\Interest\\Controller' => [
                0 => 'application/vnd.interest.v1+json',
                1 => 'application/json',
            ],
            'Interest\\V1\\Rest\\Event\\Controller' => [
                0 => 'application/vnd.interest.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Interest\V1\Rest\Interest\InterestEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'interest.rest.interest',
                'route_identifier_name' => 'interest_id',
                'hydrator' => \Zend\Hydrator\ObjectPropertyHydrator::class,
            ],
            \Interest\V1\Rest\Interest\InterestCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'interest.rest.interest',
                'route_identifier_name' => 'interest_id',
                'is_collection' => true,
            ],
            \Interest\V1\Rest\Event\EventEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'interest.rest.event',
                'route_identifier_name' => 'event_id',
                'hydrator' => \Zend\Hydrator\ObjectPropertyHydrator::class,
            ],
            \Interest\V1\Rest\Event\EventCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'interest.rest.event',
                'route_identifier_name' => 'event_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Interest\\V1\\Rest\\Interest\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'Interest\\V1\\Rest\\Event\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => false,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
    'zf-content-validation' => [
        'Interest\\V1\\Rest\\Interest\\Controller' => [
            'input_filter' => 'Interest\\V1\\Rest\\Interest\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Interest\\V1\\Rest\\Interest\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '3',
                            'max' => '255',
                        ],
                    ],
                    1 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => [
                            'adapter' => 'dbAdapter',
                            'table' => 'interests',
                            'schema' => 'seekinterest',
                            'field' => 'name',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                ],
                'name' => 'name',
                'field_type' => 'string',
                'error_message' => 'Invalid Name',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '3',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                ],
                'name' => 'description',
                'field_type' => 'string',
            ],
        ],
    ],
    'module-db-config' => [
        'Interest\\V1\\Rest\\Interest' => [
            'adapter_name' => 'dbAdapter',
            'table_name' => 'interests',
            'hydrator_name' => \Zend\Hydrator\ObjectPropertyHydrator::class,
            'entity_identifier_name' => 'id',
            'collection_class' => \Interest\V1\Rest\Interest\InterestCollection::class,
            'table_service' => \Interest\V1\Rest\Interest\InterestTableGateway::class,
            'table_mapper' => \Interest\V1\Rest\Interest\InterestTableGatewayMapper::class,
        ],
    ],
];
