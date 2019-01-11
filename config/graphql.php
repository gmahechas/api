<?php


use example\Mutation\ExampleMutation;
use example\Query\ExampleQuery;
use example\Type\ExampleRelationType;
use example\Type\ExampleType;

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

    // Additional route group attributes
    //
    // Example:
    //
    // 'route_group_attributes' => ['guard' => 'api']
    //
    'route_group_attributes' => [],

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
                'paginationDepartment' => 'App\Modules\Features\B\Department\GraphQL\Query\PaginationDepartment',
                /** C **/
                'paginationProfile' => 'App\Modules\Features\C\Profile\GraphQL\Query\PaginationProfile',
                'paginationMenu' => 'App\Modules\Features\C\Menu\GraphQL\Query\PaginationMenu',
                'paginationProfileMenu' => 'App\Modules\Features\C\ProfileMenu\GraphQL\Query\PaginationProfileMenu',
                'paginationTypePerson' => 'App\Modules\Features\C\TypePerson\GraphQL\Query\PaginationTypePerson',
                'paginationTypePersonIdentification' => 'App\Modules\Features\C\TypePersonIdentification\GraphQL\Query\PaginationTypePersonIdentification',
                'paginationPerson' => 'App\Modules\Features\C\Person\GraphQL\Query\PaginationPerson',
                'checkIdentificationPerson' => 'App\Modules\Features\C\Person\GraphQL\Query\CheckIdentificationPerson',
                'paginationUser' => 'App\Modules\Features\C\User\GraphQL\Query\PaginationUser',
                'paginationUserOffice' => 'App\Modules\Features\C\UserOffice\GraphQL\Query\PaginationUserOffice',
                /** D **/
                'paginationMacroproject' => 'App\Modules\Features\D\Macroproject\GraphQL\Query\PaginationMacroproject',
                'paginationProject' => 'App\Modules\Features\D\Project\GraphQL\Query\PaginationProject',
                'paginationUserOfficeProject' => 'App\Modules\Features\D\UserOfficeProject\GraphQL\Query\PaginationUserOfficeProject',
                /** E **/
                'paginationWorkflow' => 'App\Modules\Features\E\Workflow\GraphQL\Query\PaginationWorkflow',
                'paginationContext' => 'App\Modules\Features\E\Context\GraphQL\Query\PaginationContext',
                'paginationContextVar' => 'App\Modules\Features\E\ContextVar\GraphQL\Query\PaginationContextVar',
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
                'storeDepartment' => 'App\Modules\Features\B\Department\GraphQL\Mutation\StoreDepartment', /** Department **/
                'updateDepartment' => 'App\Modules\Features\B\Department\GraphQL\Mutation\UpdateDepartment',
                'destroyDepartment' => 'App\Modules\Features\B\Department\GraphQL\Mutation\DestroyDepartment',
                /** C **/
                'storeProfile' => 'App\Modules\Features\C\Profile\GraphQL\Mutation\StoreProfile', /** Profile **/
                'updateProfile' => 'App\Modules\Features\C\Profile\GraphQL\Mutation\UpdateProfile',
                'destroyProfile' => 'App\Modules\Features\C\Profile\GraphQL\Mutation\DestroyProfile',
                'updateProfileMenu' => 'App\Modules\Features\C\ProfileMenu\GraphQL\Mutation\UpdateProfileMenu', /** ProfileMenu **/
                'storeTypePerson' => 'App\Modules\Features\C\TypePerson\GraphQL\Mutation\StoreTypePerson', /** TypePerson **/
                'updateTypePerson' => 'App\Modules\Features\C\TypePerson\GraphQL\Mutation\UpdateTypePerson',
                'destroyTypePerson' => 'App\Modules\Features\C\TypePerson\GraphQL\Mutation\DestroyTypePerson',
                'storeTypePersonIdentification' => 'App\Modules\Features\C\TypePersonIdentification\GraphQL\Mutation\StoreTypePersonIdentification', /** TypePersonIdentification **/
                'updateTypePersonIdentification' => 'App\Modules\Features\C\TypePersonIdentification\GraphQL\Mutation\UpdateTypePersonIdentification',
                'destroyTypePersonIdentification' => 'App\Modules\Features\C\TypePersonIdentification\GraphQL\Mutation\DestroyTypePersonIdentification',
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
            'middleware' => [],
            'method' => ['post'],
        ],
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
        'Department' => 'App\Modules\Features\B\Department\GraphQL\Type\DepartmentType',
        /** C **/
        'Profile' => 'App\Modules\Features\C\Profile\GraphQL\Type\ProfileType',
        'Menu' => 'App\Modules\Features\C\Menu\GraphQL\Type\MenuType',
        'ProfileMenu' => 'App\Modules\Features\C\ProfileMenu\GraphQL\Type\ProfileMenuType',
        'TypePerson' => 'App\Modules\Features\C\TypePerson\GraphQL\Type\TypePersonType',
        'TypePersonIdentification' => 'App\Modules\Features\C\TypePersonIdentification\GraphQL\Type\TypePersonIdentificationType',
        'Person' => 'App\Modules\Features\C\Person\GraphQL\Type\PersonType',
        'User' => 'App\Modules\Features\C\User\GraphQL\Type\UserType',
        'UserOffice' => 'App\Modules\Features\C\UserOffice\GraphQL\Type\UserOfficeType',
        /** D **/
        'Macroproject' => 'App\Modules\Features\D\Macroproject\GraphQL\Type\MacroprojectType',
        'Project' => 'App\Modules\Features\D\Project\GraphQL\Type\ProjectType',
        'UserOfficeProject' => 'App\Modules\Features\D\UserOfficeProject\GraphQL\Type\UserOfficeProjectType',
        /** E **/
        'Workflow' => 'App\Modules\Features\E\Workflow\GraphQL\Type\WorkflowType',
        'Context' => 'App\Modules\Features\E\Context\GraphQL\Type\ContextType',
        'ContextVar' => 'App\Modules\Features\E\ContextVar\GraphQL\Type\ContextVarType'
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

    /*
     * Options to limit the query complexity and depth. See the doc
     * @ https://github.com/webonyx/graphql-php#security
     * for details. Disabled by default.
     */
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ],

    // You can define custom paginators to override the out-of-the-box fields
    // Useful if you want to inject some parameters of your own that apply at the top
    // level of the collection rather than to each instance returned. Can also use this
    // to add in more of the Laravel pagination data (e.g. last_page).
    'custom_paginators' => [
        // 'my_custom_pagination' => \Path\To\Your\CustomPagination::class,
    ],

    /*
     * Config for GraphiQL (see (https://github.com/graphql/graphiql).
     */
    'graphiql' => [
        'prefix' => '/graphiql/{graphql_schema?}',
        'controller' => \Rebing\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'display' => env('ENABLE_GRAPHIQL', false),
    ],
];
