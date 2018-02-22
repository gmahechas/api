<?php

return [

    // The prefix for routes
    'prefix' => 'graphql',

    // The routes to make GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Route
    //
    // Example:
    //
    // Same route for both query and mutation
    //
    // 'routes' => 'path/to/query/{graphql_schema?}',
    //
    // or define each route
    //
    // 'routes' => [
    //     'query' => 'query/{graphql_schema?}',
    //     'mutation' => 'mutation/{graphql_schema?}',
    // ]
    //
    'routes' => '{graphql_schema?}',

    // The controller to use in GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Controller and method
    //
    // Example:
    //
    // 'controllers' => [
    //     'query' => '\Rebing\GraphQL\GraphQLController@query',
    //     'mutation' => '\Rebing\GraphQL\GraphQLController@mutation'
    // ]
    //
    'controllers' => \Rebing\GraphQL\GraphQLController::class . '@query',

    // Any middleware for the graphql route group
    'middleware' => ['cors'],

    // The name of the default schema used when no argument is provided
    // to GraphQL::schema() or when the route is used without the graphql_schema
    // parameter.
    'default_schema' => 'auth',

    // The schemas for query and/or mutation. It expects an array of schemas to provide
    // both the 'query' fields and the 'mutation' fields.
    //
    // You can also provide a middleware that will only apply to the given schema
    //
    // Example:
    //
    //  'schema' => 'default',
    //
    //  'schemas' => [
    //      'default' => [
    //          'query' => [
    //              'users' => 'App\GraphQL\Query\UsersQuery'
    //          ],
    //          'mutation' => [
    //
    //          ]
    //      ],
    //      'user' => [
    //          'query' => [
    //              'profile' => 'App\GraphQL\Query\ProfileQuery'
    //          ],
    //          'mutation' => [
    //
    //          ],
    //          'middleware' => ['auth'],
    //      ],
    //      'user/me' => [
    //          'query' => [
    //              'profile' => 'App\GraphQL\Query\MyProfileQuery'
    //          ],
    //          'mutation' => [
    //
    //          ],
    //          'middleware' => ['auth'],
    //      ],
    //  ]
    //
    'schemas' => [
        'auth' => [
            'query' => [],
            'mutation' => [],
            'middleware' => []
        ],
        'country' => [
            'query' => [
                'countries' => 'App\GraphQL\Query\Modules\One\Country\ShowCountry'
            ],
            'mutation' => [
                'storeCountry' => 'App\GraphQL\Mutation\Modules\One\Country\StoreCountry',
                'updateCountry' => 'App\GraphQL\Mutation\Modules\One\Country\UpdateCountry',
                'destroyCountry' => 'App\GraphQL\Mutation\Modules\One\Country\DestroyCountry'
            ],
            'middleware' => []
        ],
        'state' => [
            'query' => [
                'states' => 'App\GraphQL\Query\Modules\One\State\ShowState'
            ],
            'mutation' => [
                'storeState' => 'App\GraphQL\Mutation\Modules\One\State\StoreState',
                'updateState' => 'App\GraphQL\Mutation\Modules\One\State\UpdateState',
                'destroyState' => 'App\GraphQL\Mutation\Modules\One\State\DestroyState'
            ],
            'middleware' => []
        ],
        'city' => [
            'query' => [
                'cities' => 'App\GraphQL\Query\Modules\One\City\ShowCity'
            ],
            'mutation' => [
                'storeCity' => 'App\GraphQL\Mutation\Modules\One\City\StoreCity',
                'updateCity' => 'App\GraphQL\Mutation\Modules\One\City\UpdateCity',
                'destroyCity' => 'App\GraphQL\Mutation\Modules\One\City\DestroyCity'
            ],
            'middleware' => []
        ],
        'company' => [
            'query' => [
                'companies' => 'App\GraphQL\Query\Modules\One\Company\ShowCompany'
            ],
            'mutation' => [],
            'middleware' => []
        ],
        'office' => [
            'query' => [
                'offices' => 'App\GraphQL\Query\Modules\One\Office\ShowOffice'
            ],
            'mutation' => [
                'storeOffice' => 'App\GraphQL\Mutation\Modules\One\Office\StoreOffice',
                'updateOffice' => 'App\GraphQL\Mutation\Modules\One\Office\UpdateOffice',
                'destroyOffice' => 'App\GraphQL\Mutation\Modules\One\Office\DestroyOffice'
            ],
            'middleware' => []
        ],
        'profile' => [
            'query' => [
                'profiles' => 'App\GraphQL\Query\Modules\Two\Profile\ShowProfile'
            ],
            'mutation' => [
                'storeProfile' => 'App\GraphQL\Mutation\Modules\Two\Profile\StoreProfile',
                'updateProfile' => 'App\GraphQL\Mutation\Modules\Two\Profile\UpdateProfile',
                'destroyProfile' => 'App\GraphQL\Mutation\Modules\Two\Profile\DestroyProfile'
            ],
            'middleware' => []
        ],
        'menu' => [
            'query' => [
                'menus' => 'App\GraphQL\Query\Modules\Two\Menu\ShowMenu'
            ],
            'mutation' => [],
            'middleware' => []
        ],
        'profile_menu' => [
            'query' => [
                'profile_menus' => 'App\GraphQL\Query\Modules\Two\ProfileMenu\ShowProfileMenu'
            ],
            'mutation' => [
                'updateProfileMenu' => 'App\GraphQL\Mutation\Modules\Two\ProfileMenu\UpdateProfileMenu',
            ],
            'middleware' => []
        ],
        'person' => [
            'query' => [
                'persons' => 'App\GraphQL\Query\Modules\Two\Person\ShowPerson'
            ],
            'mutation' => [
                'storePerson' => 'App\GraphQL\Mutation\Modules\Two\Person\StorePerson',
                'updatePerson' => 'App\GraphQL\Mutation\Modules\Two\Person\UpdatePerson',
                'destroyPerson' => 'App\GraphQL\Mutation\Modules\Two\Person\DestroyPerson'
            ],
            'middleware' => []
        ],
        'user' => [
            'query' => [
                'users' => 'App\GraphQL\Query\Modules\Two\User\ShowUser'
            ],
            'mutation' => [
                'storeUser' => 'App\GraphQL\Mutation\Modules\Two\User\StoreUser',
                'updateUser' => 'App\GraphQL\Mutation\Modules\Two\User\UpdateUser',
                'destroyUser' => 'App\GraphQL\Mutation\Modules\Two\User\DestroyUser'
            ],
            'middleware' => []
        ]
    ],
    
    // The types available in the application. You can then access it from the
    // facade like this: GraphQL::type('user')
    //
    // Example:
    //
    // 'types' => [
    //     'user' => 'App\GraphQL\Type\UserType'
    // ]
    //
    'types' => [
        'Country' => 'App\GraphQL\Type\Modules\One\CountryType',
        'State' => 'App\GraphQL\Type\Modules\One\StateType',
        'City' => 'App\GraphQL\Type\Modules\One\CityType',
        'Company' => 'App\GraphQL\Type\Modules\One\CompanyType',
        'Office' => 'App\GraphQL\Type\Modules\One\OfficeType',
        'Profile' => 'App\GraphQL\Type\Modules\Two\ProfileType',
        'Menu' => 'App\GraphQL\Type\Modules\Two\MenuType',
        'ProfileMenu' => 'App\GraphQL\Type\Modules\Two\ProfileMenuType',
        'Menu' => 'App\GraphQL\Type\Modules\Two\MenuType',
        'Person' => 'App\GraphQL\Type\Modules\Two\PersonType',
        'User' => 'App\GraphQL\Type\Modules\Two\UserType'
    ],
    
    // This callable will be passed the Error object for each errors GraphQL catch.
    // The method should return an array representing the error.
    // Typically:
    // [
    //     'message' => '',
    //     'locations' => []
    // ]
    'error_formatter' => ['\Rebing\GraphQL\GraphQL', 'formatError'],

    // You can set the key, which will be used to retrieve the dynamic variables
    'params_key'    => 'variables',
    
];
