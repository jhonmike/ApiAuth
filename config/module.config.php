<?php
/**
* @author Jhon Mike Soares <http://www.jhonmike.com.br>
* @version 1.0
*/

return array(
    'router' => array(
        'routes' => array(
            'api-auth.rest.registration' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/registration[/:registration_id]',
                    'defaults' => array(
                        'controller' => 'ApiAuth\\V1\\Rest\\Registration\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'api-auth.rest.registration',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'ApiAuth\\V1\\Rest\\Registration\\RegistrationResource' => 'ApiAuth\\V1\\Rest\\Registration\\RegistrationResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'ApiAuth\\V1\\Rest\\Registration\\Controller' => array(
            'listener' => 'ApiAuth\\V1\\Rest\\Registration\\RegistrationResource',
            'route_name' => 'api-auth.rest.registration',
            'route_identifier_name' => 'registration_id',
            'collection_name' => 'registration',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'ApiAuth\\V1\\Rest\\Registration\\RegistrationEntity',
            'collection_class' => 'ApiAuth\\V1\\Rest\\Registration\\RegistrationCollection',
            'service_name' => 'Registration',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'ApiAuth\\V1\\Rest\\Registration\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'ApiAuth\\V1\\Rest\\Registration\\Controller' => array(
                0 => 'application/vnd.api-auth.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'ApiAuth\\V1\\Rest\\Registration\\Controller' => array(
                0 => 'application/vnd.api-auth.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'ApiAuth\\V1\\Rest\\Registration\\RegistrationEntity' => array(
                'entity_identifier_name' => 'user_id',
                'route_name' => 'api-auth.rest.registration',
                'route_identifier_name' => 'registration_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'ApiAuth\\V1\\Rest\\Registration\\RegistrationCollection' => array(
                'entity_identifier_name' => 'user_id',
                'route_name' => 'api-auth.rest.registration',
                'route_identifier_name' => 'registration_id',
                'is_collection' => true,
            ),
        ),
    ),
);
