<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function index(Request $request) {

        //$eventos = Evento::titulo($request->get('q'))->orderBy('fecha', 'DESC')->paginate(8);

        return view('admin.empresa.index', compact('empresa'));
    }
}
