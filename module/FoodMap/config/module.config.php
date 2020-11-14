<?php
return [
    'service_manager' => [
        'factories' => [
            \FoodMap\V1\Rest\Local\LocalResource::class => \FoodMap\V1\Rest\Local\LocalResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'food-map.rest.local' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/food-map/local[/:local_id]',
                    'defaults' => [
                        'controller' => 'FoodMap\\V1\\Rest\\Local\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'food-map.rest.local',
        ],
    ],
    'api-tools-rest' => [
        'FoodMap\\V1\\Rest\\Local\\Controller' => [
            'listener' => \FoodMap\V1\Rest\Local\LocalResource::class,
            'route_name' => 'food-map.rest.local',
            'route_identifier_name' => 'local_id',
            'collection_name' => 'local',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'DELETE',
                2 => 'PATCH',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \FoodMap\V1\Rest\Local\LocalEntity::class,
            'collection_class' => \FoodMap\V1\Rest\Local\LocalCollection::class,
            'service_name' => 'Local',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'FoodMap\\V1\\Rest\\Local\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'FoodMap\\V1\\Rest\\Local\\Controller' => [
                0 => 'application/vnd.food-map.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'FoodMap\\V1\\Rest\\Local\\Controller' => [
                0 => 'application/vnd.food-map.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \FoodMap\V1\Rest\Local\LocalEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'food-map.rest.local',
                'route_identifier_name' => 'local_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializable::class,
            ],
            \FoodMap\V1\Rest\Local\LocalCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'food-map.rest.local',
                'route_identifier_name' => 'local_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'FoodMap\\V1\\Rest\\Local\\Controller' => [
            'input_filter' => 'FoodMap\\V1\\Rest\\Local\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'FoodMap\\V1\\Rest\\Local\\Validator' => [
            0 => [
                'name' => 'latitude',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\Regex::class,
                        'options' => [
                            'pattern' => '/^-?[0-9]+(?:\\.[0-9]+)?$/',
                        ],
                    ],
                ],
                'error_message' => 'O campo Latitude não pode ser vazio.',
            ],
            1 => [
                'name' => 'longitude',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\Regex::class,
                        'options' => [
                            'pattern' => '/^-?[0-9]+(?:\\.[0-9]+)?$/',
                        ],
                    ],
                ],
                'error_message' => 'O campo Logitude não pode ser vazio.',
            ],
            2 => [
                'name' => 'observacao',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => null,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
