<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnosController extends Controller
{
	public function index(Request $request) {

        //$eventos = Evento::titulo($request->get('q'))->orderBy('fecha', 'DESC')->paginate(8);

        return view('admin.alumnos.index', compact('alumnos'));
    }
}
