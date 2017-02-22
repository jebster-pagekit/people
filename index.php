<?php


return [

    'name' => 'people',

    'resources' => [
        'people:' => ''
    ],

    'autoload' => [
        'Jebster\\People\\' => 'src'
    ],

    'routes' => [
        '/people' => [
            'name' => '@people',
            'controller' => 'Jebster\\People\\Controller\\SiteController'
        ],
        '/people/settings' => [
            'name' => '@people/settings',
            'controller' => 'Jebster\\People\\Controller\\PeopleController::settingsAction'
        ],
        '/api/people' => [
            'name' => '@people/api',
            'controller' => 'Jebster\\People\\Controller\\PeopleApiController'
        ]
    ],

    'config' => [
        'departments' => [
            'Sales' => [],
            'IT' => []
        ]
    ],


    'settings' => '@people/settings',

    'widgets' => [
        'widgets/peopleWidget.php'
    ]
];
