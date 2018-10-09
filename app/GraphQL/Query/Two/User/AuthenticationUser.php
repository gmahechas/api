<?php

namespace App\GraphQL\Query\Two\User;

use GraphQL;
use Laravel\Passport\Client;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuthenticationUser extends Query
{
    protected $attributes = [
        'name' => 'AuthenticationUser',
    ];

    public function type()
    {
        return GraphQL::type('Passport');
    }

    public function args()
    {
        return [
            'grant_type' => [
                'name' => 'grant_type',
                'type' => Type::nonNull(Type::string()),
            ],
            'scope' => [
                'name' => 'scope',
                'type' => Type::string(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $grant_type = $args['grant_type'];
        $scope = isset($args['scope']) ? $args['scope'] : '*';

        $username = $args['email'];
        $password = $args['password'];

        $client = Client::find(1);

        $params = [
            'grant_type' => $grant_type,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $username,
            'password' => $password,
            'scope' => $scope
        ];

        $request = request();
        $request->request->add($params);
        $proxy = Request::create('oauth/token', 'POST');
        $response = Route::dispatch($proxy);
        
        if (200 === $response->status()) {
            return json_decode($response->getContent(), true);
        }
    }
}