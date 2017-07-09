<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class EventosAdminController extends Controller
{
    public function index(Request $request) {

        $eventos = Evento::titulo($request->get('q'))->orderBy('fecha', 'DESC')->paginate(8);

        return view('admin.eventos.index', compact('eventos'));
    }

    public function showCrearEvento(Request $request) {

        return view('admin.eventos.crearEvento');
    }


    public function showEditarEvento(Request $request) {

        return view('admin.eventos.editarEvento');//direccion de la vista editarEventos
    }
}
