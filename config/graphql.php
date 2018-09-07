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
                'paginationCountry' => 'App\GraphQL\Query\One\Country\PaginationCountry',
                'paginationEstate' => 'App\GraphQL\Query\One\Estate\PaginationEstate',
                'paginationCity' => 'App\GraphQL\Query\One\City\PaginationCity',
                'paginationCompany' => 'App\GraphQL\Query\One\Company\PaginationCompany',
                'paginationOffice' => 'App\GraphQL\Query\One\Office\PaginationOffice',
                /** Two **/
                'paginationProfile' => 'App\GraphQL\Query\Two\Profile\PaginationProfile',
                'paginationMenu' => 'App\GraphQL\Query\Two\Menu\PaginationMenu',
                'paginationProfileMenu' => 'App\GraphQL\Query\Two\ProfileMenu\PaginationProfileMenu',
                'paginationPerson' => 'App\GraphQL\Query\Two\Person\PaginationPerson',
                'paginationUser' => 'App\GraphQL\Query\Two\User\PaginationUser',
                'paginationUserOffice' => 'App\GraphQL\Query\Two\UserOffice\PaginationUserOffice',
                /** Three **/
                'paginationMacroproject' => 'App\GraphQL\Query\Three\Macroproject\PaginationMacroproject',
                'paginationProject' => 'App\GraphQL\Query\Three\Project\PaginationProject',
                'paginationUserOfficeProject' => 'App\GraphQL\Query\Three\UserOfficeProject\PaginationUserOfficeProject'
            ],
            'mutation' => [
                /** One **/
                'storeCountry' => 'App\GraphQL\Mutation\One\Country\StoreCountry', /** Country **/
                'updateCountry' => 'App\GraphQL\Mutation\One\Country\UpdateCountry',
                'destroyCountry' => 'App\GraphQL\Mutation\One\Country\DestroyCountry',
                'storeEstate' => 'App\GraphQL\Mutation\One\Estate\StoreEstate', /** Estate **/
                'updateEstate' => 'App\GraphQL\Mutation\One\Estate\UpdateEstate',
                'destroyEstate' => 'App\GraphQL\Mutation\One\Estate\DestroyEstate',
                'storeCity' => 'App\GraphQL\Mutation\One\City\StoreCity', /** City **/
                'updateCity' => 'App\GraphQL\Mutation\One\City\UpdateCity',
                'destroyCity' => 'App\GraphQL\Mutation\One\City\DestroyCity',
                'storeOffice' => 'App\GraphQL\Mutation\One\Office\StoreOffice', /** Office **/
                'updateOffice' => 'App\GraphQL\Mutation\One\Office\UpdateOffice',
                'destroyOffice' => 'App\GraphQL\Mutation\One\Office\DestroyOffice',
                /** Two **/
                'storeProfile' => 'App\GraphQL\Mutation\Two\Profile\StoreProfile', /** Profile **/
                'updateProfile' => 'App\GraphQL\Mutation\Two\Profile\UpdateProfile',
                'destroyProfile' => 'App\GraphQL\Mutation\Two\Profile\DestroyProfile',
                'updateProfileMenu' => 'App\GraphQL\Mutation\Two\ProfileMenu\UpdateProfileMenu', /** ProfileMenu **/
                'storePerson' => 'App\GraphQL\Mutation\Two\Person\StorePerson', /** Person **/
                'updatePerson' => 'App\GraphQL\Mutation\Two\Person\UpdatePerson',
                'destroyPerson' => 'App\GraphQL\Mutation\Two\Person\DestroyPerson',
                'storeUser' => 'App\GraphQL\Mutation\Two\User\StoreUser', /** User **/
                'updateUser' => 'App\GraphQL\Mutation\Two\User\UpdateUser',
                'destroyUser' => 'App\GraphQL\Mutation\Two\User\DestroyUser',
                'updateUserOffice' => 'App\GraphQL\Mutation\Two\UserOffice\UpdateUserOffice', /** UserOffice **/
                /** Three **/
                'storeMacroproject' => 'App\GraphQL\Mutation\Three\Macroproject\StoreMacroproject', /** Macroproject **/
                'updateMacroproject' => 'App\GraphQL\Mutation\Three\Macroproject\UpdateMacroproject',
                'destroyMacroproject' => 'App\GraphQL\Mutation\Three\Macroproject\DestroyMacroproject',
                'storeProject' => 'App\GraphQL\Mutation\Three\Project\StoreProject', /** Project **/
                'updateProject' => 'App\GraphQL\Mutation\Three\Project\UpdateProject',
                'destroyProject' => 'App\GraphQL\Mutation\Three\Project\DestroyProject',
                'updateUserOfficeProject' => 'App\GraphQL\Mutation\Three\UserOfficeProject\UpdateUserOfficeProject', /** UserOfficeProject **/
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
        'UserOffice' => 'App\GraphQL\Type\Two\UserOfficeType',
        /** Three **/
        'Macroproject' => 'App\GraphQL\Type\Three\MacroprojectType',
        'Project' => 'App\GraphQL\Type\Three\ProjectType',
        'UserOfficeProject' => 'App\GraphQL\Type\Three\UserOfficeProjectType',
        /************************* Enum *************************/
        /** Two **/
        'PersonBusinessTypeEnum' => 'App\GraphQL\Enum\Two\Person\PersonBusinessTypeEnum',
        'PersonIdentificationTypeEnum' => 'App\GraphQL\Enum\Two\Person\PersonIdentificationTypeEnum',
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
