<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
	// Show only if is a guest unauthenticated 
	public function __construct()
	{
		$this->middleware( 'guest', [ 'only', 'showLoginForm' ] );
	}

	/**
	* Muestra la pagina Login para usuarios
	**/
	public function showLoginForm()
	{
		return view('auth.login');
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
		if( Auth::attempt( ['correo' => $request->correo, 'password' => $request->password ] ) )
		{
			return redirect( '/home' );
    		}
		
		// If the user is not in database then redirec to login page and show him the next menssage 
		return back()->withErrors( [ 'correo' => 'Verifique su correo o su contraseña' ] );
	}

	protected function guard()
	{
		return Auth::guard( 'user' );
	}
}
