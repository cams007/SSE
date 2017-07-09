<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egresado;

class AlumnosController extends Controller
{
	public function index(Request $request) {

        $egresados = Egresado::titulo($request->get('q'))->orderBy('nombre', 'DESC')->paginate(8);

        return view('admin.alumnos.index', compact('egresados'));
    }

    public function showCrearEgresado(Request $request) {

        return view('admin.alumnos.crearAlumno', compact('egresados'));
    }

    public function showEditarEgresado(Request $request) {

        return view('admin.alumnos.editarAlumno');
    }

    public function saveEgresado(Request $request) {

        //return view('admin.alumnos.index', compact('egresados'));
        dd($request->all());
        //$egresado = new Egresado($request->all());
        //dd($egresado);

        
    }
}
