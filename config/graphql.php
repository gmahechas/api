<?php

return [

    // The prefix for routes
    'prefix' => 'api',

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
    'routes' => 'graphql',

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
    'middleware' => ['cors', 'auth:api'],

    // The name of the default schema used when no argument is provided
    // to GraphQL::schema() or when the route is used without the graphql_schema
    // parameter.
    'default_schema' => 'graphql',

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
        'graphql' => [
            'query' => [
                /** Auth **/
                'checkAuth' => 'App\Modules\Auth\GraphQL\Query\CheckAuth',
                'logoutAuth' => 'App\Modules\Auth\GraphQL\Query\LogoutAuth',
                /** A **/
                'paginationCountry' => 'App\Modules\Features\A\Country\GraphQL\Query\PaginationCountry',
                'paginationEstate' => 'App\Modules\Features\A\Estate\GraphQL\Query\PaginationEstate',
                'paginationCity' => 'App\Modules\Features\A\City\GraphQL\Query\PaginationCity',
                /** B **/
                'paginationCompany' => 'App\Modules\Features\B\Company\GraphQL\Query\PaginationCompany',
                'paginationOffice' => 'App\Modules\Features\B\Office\GraphQL\Query\PaginationOffice',
                /** C **/
                'paginationProfile' => 'App\Modules\Features\C\Profile\GraphQL\Query\PaginationProfile',
                'paginationMenu' => 'App\Modules\Features\C\Menu\GraphQL\Query\PaginationMenu',
                'paginationProfileMenu' => 'App\Modules\Features\C\ProfileMenu\GraphQL\Query\PaginationProfileMenu',
                'paginationPerson' => 'App\Modules\Features\C\Person\GraphQL\Query\PaginationPerson',
                'paginationUser' => 'App\Modules\Features\C\User\GraphQL\Query\PaginationUser',
                'paginationUserOffice' => 'App\Modules\Features\C\UserOffice\GraphQL\Query\PaginationUserOffice',
                /** D **/
                'paginationMacroproject' => 'App\Modules\Features\D\Macroproject\GraphQL\Query\PaginationMacroproject',
                'paginationProject' => 'App\Modules\Features\D\Project\GraphQL\Query\PaginationProject',
                'paginationUserOfficeProject' => 'App\Modules\Features\D\UserOfficeProject\GraphQL\Query\PaginationUserOfficeProject',
                /** E **/
                'paginationWorkflow' => 'App\Modules\Features\E\Workflow\GraphQL\Query\PaginationWorkflow',
            ],
            'mutation' => [
                /** A **/
                'storeCountry' => 'App\Modules\Features\A\Country\GraphQL\Mutation\StoreCountry', /** Country **/
                'updateCountry' => 'App\Modules\Features\A\Country\GraphQL\Mutation\UpdateCountry',
                'destroyCountry' => 'App\Modules\Features\A\Country\GraphQL\Mutation\DestroyCountry',
                'storeEstate' => 'App\Modules\Features\A\Estate\GraphQL\Mutation\StoreEstate', /** Estate **/
                'updateEstate' => 'App\Modules\Features\A\Estate\GraphQL\Mutation\UpdateEstate',
                'destroyEstate' => 'App\Modules\Features\A\Estate\GraphQL\Mutation\DestroyEstate',
                'storeCity' => 'App\Modules\Features\A\City\GraphQL\Mutation\StoreCity', /** City **/
                'updateCity' => 'App\Modules\Features\A\City\GraphQL\Mutation\UpdateCity',
                'destroyCity' => 'App\Modules\Features\A\City\GraphQL\Mutation\DestroyCity',
                /** B **/
                'storeOffice' => 'App\Modules\Features\B\Office\GraphQL\Mutation\StoreOffice', /** Office **/
                'updateOffice' => 'App\Modules\Features\B\Office\GraphQL\Mutation\UpdateOffice',
                'destroyOffice' => 'App\Modules\Features\B\Office\GraphQL\Mutation\DestroyOffice',
                /** C **/
                'storeProfile' => 'App\Modules\Features\C\Profile\GraphQL\Mutation\StoreProfile', /** Profile **/
                'updateProfile' => 'App\Modules\Features\C\Profile\GraphQL\Mutation\UpdateProfile',
                'destroyProfile' => 'App\Modules\Features\C\Profile\GraphQL\Mutation\DestroyProfile',
                'updateProfileMenu' => 'App\Modules\Features\C\ProfileMenu\GraphQL\Mutation\UpdateProfileMenu', /** ProfileMenu **/
                'storePerson' => 'App\Modules\Features\C\Person\GraphQL\Mutation\StorePerson', /** Person **/
                'updatePerson' => 'App\Modules\Features\C\Person\GraphQL\Mutation\UpdatePerson',
                'destroyPerson' => 'App\Modules\Features\C\Person\GraphQL\Mutation\DestroyPerson',
                'storeUser' => 'App\Modules\Features\C\User\GraphQL\Mutation\StoreUser', /** User **/
                'updateUser' => 'App\Modules\Features\C\User\GraphQL\Mutation\UpdateUser',
                'destroyUser' => 'App\Modules\Features\C\User\GraphQL\Mutation\DestroyUser',
                'updateUserOffice' => 'App\Modules\Features\C\UserOffice\GraphQL\Mutation\UpdateUserOffice', /** UserOffice **/
                'destroyUserOffice' => 'App\Modules\Features\C\UserOffice\GraphQL\Mutation\DestroyUserOffice',
                /** D **/
                'storeMacroproject' => 'App\Modules\Features\D\Macroproject\GraphQL\Mutation\StoreMacroproject', /** Macroproject **/
                'updateMacroproject' => 'App\Modules\Features\D\Macroproject\GraphQL\Mutation\UpdateMacroproject',
                'destroyMacroproject' => 'App\Modules\Features\D\Macroproject\GraphQL\Mutation\DestroyMacroproject',
                'storeProject' => 'App\Modules\Features\D\Project\GraphQL\Mutation\StoreProject', /** Project **/
                'updateProject' => 'App\Modules\Features\D\Project\GraphQL\Mutation\UpdateProject',
                'destroyProject' => 'App\Modules\Features\D\Project\GraphQL\Mutation\DestroyProject',
                'updateUserOfficeProject' => 'App\Modules\Features\D\UserOfficeProject\GraphQL\Mutation\UpdateUserOfficeProject', /** UserOfficeProject **/
                /** E **/
                'storeWorkflow' => 'App\Modules\Features\E\Workflow\GraphQL\Mutation\StoreWorkflow', /** Workflow **/
                'updateWorkflow' => 'App\Modules\Features\E\Workflow\GraphQL\Mutation\UpdateWorkflow',
                'destroyWorkflow' => 'App\Modules\Features\E\Workflow\GraphQL\Mutation\DestroyWorkflow',
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
        /** Auth **/
        'CheckAuth' => 'App\Modules\Auth\GraphQL\Type\CheckAuthType',
        /** A **/
        'Country' => 'App\Modules\Features\A\Country\GraphQL\Type\CountryType',
        'Estate' => 'App\Modules\Features\A\Estate\GraphQL\Type\EstateType',
        'City' => 'App\Modules\Features\A\City\GraphQL\Type\CityType',
        /** B **/
        'Company' => 'App\Modules\Features\B\Company\GraphQL\Type\CompanyType',
        'Office' => 'App\Modules\Features\B\Office\GraphQL\Type\OfficeType',
        /** C **/
        'Profile' => 'App\Modules\Features\C\Profile\GraphQL\Type\ProfileType',
        'Menu' => 'App\Modules\Features\C\Menu\GraphQL\Type\MenuType',
        'ProfileMenu' => 'App\Modules\Features\C\ProfileMenu\GraphQL\Type\ProfileMenuType',
        'Person' => 'App\Modules\Features\C\Person\GraphQL\Type\PersonType',
        'User' => 'App\Modules\Features\C\User\GraphQL\Type\UserType',
        'UserOffice' => 'App\Modules\Features\C\UserOffice\GraphQL\Type\UserOfficeType',
        /** D **/
        'Macroproject' => 'App\Modules\Features\D\Macroproject\GraphQL\Type\MacroprojectType',
        'Project' => 'App\Modules\Features\D\Project\GraphQL\Type\ProjectType',
        'UserOfficeProject' => 'App\Modules\Features\D\UserOfficeProject\GraphQL\Type\UserOfficeProjectType',
        /** E **/
        'Workflow' => 'App\Modules\Features\E\Workflow\GraphQL\Type\WorkflowType',
        /************************* Enum *************************/
        /** C **/
        'PersonBusinessTypeEnum' => 'App\Modules\Shared\GraphQL\Enum\C\Person\PersonBusinessTypeEnum',
        'PersonIdentificationTypeEnum' => 'App\Modules\Shared\GraphQL\Enum\C\Person\PersonIdentificationTypeEnum',
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
