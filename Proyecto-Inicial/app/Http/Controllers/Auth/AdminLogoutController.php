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
		$this->middleware( 'auth:admin' );
	}

	public function logout()
    	{
		// Clear the authentication information in the user's session
		Auth::guard('admin')->logout();

		// Return to the login admins
            return redirect( '/admin/login' );
    	}
}
