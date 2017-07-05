<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;

class OfertasController extends Controller
{
    public function index(Request $request) {

        $ofertas = Oferta::puesto($request->get('q'))->orderBy('created_at', 'DESC')->paginate(9);

        return view('egresados.ofertas.ofertas', compact('ofertas'));
    }
}
