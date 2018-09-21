<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	// Show only if is a guest unauthenticated 
	public function __construct()
	{
		$this->middleware( 'guest', [ 'only', 'showLoginForm' ] );
	}

	public function showLoginForm()
	{
		return view('admin.admin-login');
	}

	public function login( Request $request )
	{
		/**
		* Simply pass the incoming HTTP request and desired validation
		* rules into the validate method. Again, if the validation fails,
		* the proper response will automatically be generated.
		**/ 
		$esto = $this->validate( request(), [
			'correo' => 'email|required|string',
			'password' => 'required|min:6|string'
    		]);
		
		// Check if the user request is in the database, if it is true then redirect it
		// to the dashboard as user 
		if( Auth::guard('admin')->attempt( ['correo' => $request->correo, 'password' => $request->password], $request->remember))
		{
    			// If successful, then redirect to their intented location
    			return redirect( '/admin/home' );
    		}

		// If the user is not in database then redirec it to login page and show him the next menssage 
		return back()->withErrors( [ 'correo' => 'Por favor verifique que sus datos sean correctos' ] );
	}
}
