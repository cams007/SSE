<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class DirectorioController extends Controller
{
    public function index(Request $request) {

        $empresas = Empresa::nombre($request->get('q'))->orderBy('nombre', 'ASC')->paginate(10);

        return view('egresados.directorio.index', compact('empresas'));
    }
}
