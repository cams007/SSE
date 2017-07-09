<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresasController extends Controller
{
    public function index(Request $request) {

        $empresas = empresa::nombre($request->get('q'))->orderBy('nombre', 'DESC')->paginate(8);

        return view('admin.empresa.index', compact('empresas'));
    }

    public function showCrearEmpresa(Request $request) {

    	return view('admin.empresa.crearEmpresa');
    }

    public function showEditarEmpresa(Request $request) {

    	return view('admin.empresa.editarEmpresa');
    }
}
