<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Evento;
use Session;
use Auth;

class OfertasLaboralesAdminController extends Controller {
    public function index(Request $request) {

        $eventos = Evento::todo($request->get('q'))->where('activo','=',1)->orderBy('fecha', 'DESC')->paginate(10);

        return view('admin.ofertas.index', compact('eventos'));
    }
}