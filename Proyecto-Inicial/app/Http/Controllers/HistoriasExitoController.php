<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoriaExito;

class HistoriasExitoController extends Controller
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
        $historias = HistoriaExito::titulo($request->get('q'))
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('egresados.historiasDeExito', compact('historias'));
    }
}
