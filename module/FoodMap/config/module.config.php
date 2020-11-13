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
];
