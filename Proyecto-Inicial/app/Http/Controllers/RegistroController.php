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

	/*
    	** Iniciamos la transaccion para guardar los datos
    	** del nuevo usuario en la base de datos
    	*/
	public function saveUsuario( Request $request )
	{
		if(	// Si la matricual del usuario existe en la BD de la universidad	
			Egresado::where( 'matricula', "$request->egresado_matricula" )->exists()
			&&
			// Si el correo no se ha registrado antes
			!User::where( 'correo', "$request->correo" )->exists()
			&&
			// Si la matricula no se ha registrado antes
			!User::where( 'egresado_matricula', "$request->egresado_matricula" )->exists() )
		{
			$egresado = Egresado::where('matricula',"$request->egresado_matricula")->first();
		
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
				echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
			}
			DB::commit();

			//Para mostrar mensaje partials/messages.blade.php
			Session::flash('save', 'Usuario creado correctamente');
			//Redireccionamos al index de egresado url(/admin/egresado)
			return redirect('egresados/home');	
		}
		else
		{
			//Para mostrar mensaje partials/messages.blade.php
			Session::flash('error', 'Datos de usuario incorrectos, intente otra vez');
			//Redireccionamos al index de egresado url(/admin/egresado)
			return redirect('/register');
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
}
