<?php

namespace App\Http\Controllers\Api\Auth;

use App\Traits\IssueToken;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	use IssueToken;

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required',
    		'password' => 'required'
    	]);

        return $this->issueToken($request, 'password');
    }
}