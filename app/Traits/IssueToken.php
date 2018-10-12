<?php 

namespace App\Traits;

use App\Models\Two\User;
use Laravel\Passport\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

trait IssueToken
{
    private $client;

	public function issueToken(Request $request, $grantType, $scope = "*")
    {

        $client_id = ($request->slug === 'web') ? 1 : 2;
        $this->client = Client::find($client_id);
		$params = [
    		'grant_type' => $grantType,
    		'client_id' => $this->client->id,
    		'client_secret' => $this->client->secret,
            'username' => $request->username,		
    		'scope' => $scope
    	];

    	$request->request->add($params);
    	$proxy = Request::create('oauth/token', 'POST');

        $user = User::with('person', 'profile.profile_menus.menu')->where('username', $params['username'])->first();

        $response = Route::dispatch($proxy);

        if (200 === $response->status()) {
            return response()->json([
                'token' => json_decode($response->getContent(), true),
                'user' => $user
            ]);
        } else {
            return $response;
        }

	}
}