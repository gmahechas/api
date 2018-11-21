<?php 

namespace App\Modules\Auth\Traits;

use App\Modules\Features\C\User\Models\User;
use App\Modules\Features\B\Company\Models\Company;
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

        $response = Route::dispatch($proxy);

        if (200 === $response->status()) {
            return $this->responseAuth($grantType, $params, $response);
        } else {
            return $response;
        }

	}

    private function responseAuth($grantType, $params, $response)
    {
        switch ($grantType) {
            case 'password':
                return response()->json([
                    'token' => json_decode($response->getContent(), true),
                    'user' => User::with('person', 'profile.profile_menus.menu')->where('username', $params['username'])->first(),
                    'company' => Company::with('city')->where('company_id', 1)->first()
                ]);
                break;
            
            case 'refresh_token':
                return response()->json(json_decode($response->getContent(), true));
                break;
        }
    }
}