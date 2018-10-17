<?php 

namespace App\Traits;

use App\Models\Two\User;
use App\Models\One\Company;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
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
    	$proxy = Request::create('api/auth/token', 'POST');

        $user = User::with('person', 'profile.profile_menus.menu')->where('username', $params['username'])->first();
        $company = Company::with('city')->where('company_id', 1)->first();

        $response = Route::dispatch($proxy);

        if (200 === $response->status()) {
            return response()->json([
                'token' => json_decode($response->getContent(), true),
                'user' => $user,
                'company' => $company
            ]);
        } else {
            return $response;
        }

	}
}