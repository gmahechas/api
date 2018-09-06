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
    'routes' => 'admin',

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
    'default_schema' => 'admin',

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
        'admin' => [
            'query' => [
                /** One **/
                'paginationCountry' => 'App\GraphQL\Query\Modules\One\Country\PaginationCountry',
                'paginationEstate' => 'App\GraphQL\Query\Modules\One\Estate\PaginationEstate',
                'paginationCity' => 'App\GraphQL\Query\Modules\One\City\PaginationCity',
                'paginationCompany' => 'App\GraphQL\Query\Modules\One\Company\PaginationCompany',
                'paginationOffice' => 'App\GraphQL\Query\Modules\One\Office\PaginationOffice',
                /** Two **/
                'paginationProfile' => 'App\GraphQL\Query\Modules\Two\Profile\PaginationProfile',
                'paginationMenu' => 'App\GraphQL\Query\Modules\Two\Menu\PaginationMenu',
                'paginationProfileMenu' => 'App\GraphQL\Query\Modules\Two\ProfileMenu\PaginationProfileMenu',
                'paginationPerson' => 'App\GraphQL\Query\Modules\Two\Person\PaginationPerson',
                'paginationUser' => 'App\GraphQL\Query\Modules\Two\User\PaginationUser',
                /** Three **/
                'paginationMacroproject' => 'App\GraphQL\Query\Modules\Three\Macroproject\PaginationMacroproject',
                'paginationProject' => 'App\GraphQL\Query\Modules\Three\Project\PaginationProject'
            ],
            'mutation' => [
                /** One **/
                'storeCountry' => 'App\GraphQL\Mutation\Modules\One\Country\StoreCountry', /** Country **/
                'updateCountry' => 'App\GraphQL\Mutation\Modules\One\Country\UpdateCountry',
                'destroyCountry' => 'App\GraphQL\Mutation\Modules\One\Country\DestroyCountry',
                'storeEstate' => 'App\GraphQL\Mutation\Modules\One\Estate\StoreEstate', /** Estate **/
                'updateEstate' => 'App\GraphQL\Mutation\Modules\One\Estate\UpdateEstate',
                'destroyEstate' => 'App\GraphQL\Mutation\Modules\One\Estate\DestroyEstate',
                'storeCity' => 'App\GraphQL\Mutation\Modules\One\City\StoreCity', /** City **/
                'updateCity' => 'App\GraphQL\Mutation\Modules\One\City\UpdateCity',
                'destroyCity' => 'App\GraphQL\Mutation\Modules\One\City\DestroyCity',
                'storeOffice' => 'App\GraphQL\Mutation\Modules\One\Office\StoreOffice', /** Office **/
                'updateOffice' => 'App\GraphQL\Mutation\Modules\One\Office\UpdateOffice',
                'destroyOffice' => 'App\GraphQL\Mutation\Modules\One\Office\DestroyOffice',
                /** Two **/
                'storeProfile' => 'App\GraphQL\Mutation\Modules\Two\Profile\StoreProfile', /** Profile **/
                'updateProfile' => 'App\GraphQL\Mutation\Modules\Two\Profile\UpdateProfile',
                'destroyProfile' => 'App\GraphQL\Mutation\Modules\Two\Profile\DestroyProfile',
                'updateProfileMenu' => 'App\GraphQL\Mutation\Modules\Two\ProfileMenu\UpdateProfileMenu', /** ProfileMenu **/
                'storePerson' => 'App\GraphQL\Mutation\Modules\Two\Person\StorePerson', /** Person **/
                'updatePerson' => 'App\GraphQL\Mutation\Modules\Two\Person\UpdatePerson',
                'destroyPerson' => 'App\GraphQL\Mutation\Modules\Two\Person\DestroyPerson',
                'storeUser' => 'App\GraphQL\Mutation\Modules\Two\User\StoreUser', /** User **/
                'updateUser' => 'App\GraphQL\Mutation\Modules\Two\User\UpdateUser',
                'destroyUser' => 'App\GraphQL\Mutation\Modules\Two\User\DestroyUser',
                /** Three **/
                'storeMacroproject' => 'App\GraphQL\Mutation\Modules\Three\Macroproject\StoreMacroproject', /** Macroproject **/
                'updateMacroproject' => 'App\GraphQL\Mutation\Modules\Three\Macroproject\UpdateMacroproject',
                'destroyMacroproject' => 'App\GraphQL\Mutation\Modules\Three\Macroproject\DestroyMacroproject',
                'storeProject' => 'App\GraphQL\Mutation\Modules\Three\Project\StoreProject', /** Project **/
                'updateProject' => 'App\GraphQL\Mutation\Modules\Three\Project\UpdateProject',
                'destroyProject' => 'App\GraphQL\Mutation\Modules\Three\Project\DestroyProject',
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
        /** One **/
        'Country' => 'App\GraphQL\Type\One\CountryType',
        'Estate' => 'App\GraphQL\Type\One\EstateType',
        'City' => 'App\GraphQL\Type\One\CityType',
        'Company' => 'App\GraphQL\Type\One\CompanyType',
        'Office' => 'App\GraphQL\Type\One\OfficeType',
        /** Two **/
        'Profile' => 'App\GraphQL\Type\Two\ProfileType',
        'Menu' => 'App\GraphQL\Type\Two\MenuType',
        'ProfileMenu' => 'App\GraphQL\Type\Two\ProfileMenuType',
        'Menu' => 'App\GraphQL\Type\Two\MenuType',
        'Person' => 'App\GraphQL\Type\Two\PersonType',
        'User' => 'App\GraphQL\Type\Two\UserType',
        /** Three **/
        'Macroproject' => 'App\GraphQL\Type\Three\MacroprojectType',
        'Project' => 'App\GraphQL\Type\Three\ProjectType'
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
