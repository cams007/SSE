<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Egresado;

class RegistroController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function showCrearUsuario()
	{
		// Se comprueba primero que el usuario no este autentificado antes
    		if (Auth::user() == null)
		{
    			return view('egresados.registro.registrarse');
    		} else{
    			return redirect('/');
    		}
	}

	public function showBienvenidaForm()
	{
    		if (Auth::user() == null)
		{
    			return redirect('/');
    		} else{
    			return view('egresados.registro.bienvenida');
    		}
	}

	/*
    	** Iniciamos la transaccion para guardar los datos
    	** del nuevo usuario en la base de datos
    	*/
	public function saveUsuario( Request $request )
	{
		if(	// Si la matricual del usuario existe en la BD de la universidad	
			Egresado::where( 'matricula', $request->egresado_matricula )->exists()
			&&
			// Si el correo no se ha registrado antes
			!User::where( 'correo', $request->correo )->exists()
			&&
			// Si la matricula no se ha registrado antes
			!User::where( 'egresado_matricula', $request->egresado_matricula )->exists()
			&&
			// Si las contraseñas coinciden
			$request->password == $request->password_confirmation )
		{
			$egresado = Egresado::where('matricula', $request->egresado_matricula )->first();
		
			DB::beginTransaction();
			try {
				$user = new User();
				$user->correo = $request->correo;
				// La contraseña se encripta antes de guardarla
				$user->password =  bcrypt( $request->password );
				$user->egresado_matricula = $egresado->matricula;
				$user->save();
			}catch( Exception $e )
			{
				DB::rollback();
				Session::flash('message_success', 'Hubo un error al guardar el usaurio.');

				return redirect( '/register' );

			}
			DB::commit();

			// Iniciamos sesion de usuario y se redirigue a la pagina home
			Auth::login( $user );

			//Para mostrar mensaje partials/messages.blade.php
			Session::flash('message_success', 'Usuario dado de alta correctamente.');
			
			//Redireccionamos al index de egresado url(/admin/egresado)
			return redirect('/home');
		}
		else
		{
			//Para mostrar mensaje partials/messages.blade.php
			Session::flash('message_danger', 'Verifica que tu información sea correcta.');
			//Redireccionamos al index de egresado url(/admin/egresado)
			return redirect('/register');
		}
	}
}
