<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class AdminLogoutController extends Controller
{
	// Show only if is a guest authenticated 
	public function __construct()
	{
		$this->middleware( 'auth' );
	}

	public function logout()
    	{
		// Clear the authentication information in the user's session
		Auth::logout();

		// Return to the login user		
            return redirect( '/admin' );
    	}
}
