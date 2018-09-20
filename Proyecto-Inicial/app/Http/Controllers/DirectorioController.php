<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class DirectorioController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(Request $request)
    {
        $empresas = Empresa::nombre($request->get('q'))
            ->orderBy('nombre', 'ASC')
            ->paginate(10);

        return view('egresados.directorio.index', compact('empresas'));
    }

    public function showEmpresaView(){
        return view('egresados.directorio.datos');
    }

    public function showComentariosEmpresaView(){
        return view('egresados.directorio.comentarios');
    }

    public function showOfertasEmpresaView(){
        return view('egresados.directorio.ofertasLaborales');
    }
}
