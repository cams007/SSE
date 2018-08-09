<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;

class OfertasController extends Controller
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

    public function index(Request $request) {

        $ofertas = Oferta::puesto($request->get('q'))->orderBy('created_at', 'DESC')->paginate(9);

        return view('egresados.ofertas.ofertas', compact('ofertas'));
    }
}
