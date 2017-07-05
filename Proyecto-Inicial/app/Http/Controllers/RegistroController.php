<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RegistroController extends Controller
{

    public function showRegistroForm(){

    	if (Auth::user() == null){
    		return view('egresados.registro.registrarse');
    	} else{
    		return redirect('/');
    	}
    }

    public function showBienvenidaForm(){

    	if (Auth::user() == null){
    		return redirect('/');
    	} else{
    		return view('egresados.registro.bienvenida');
    	}
    }
}
