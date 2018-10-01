<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $eventos = Evento::titulo( $request->get( 'q' ) )
            ->where( 'activo', '=', 1 )
            ->orderBy( 'fecha', 'DESC' )
            ->paginate(8);

        return view( 'egresados.eventos', compact( 'eventos' ) );
    }

    public function culturales( Request $request )
    {
        $eventos = Evento::titulo( $request->get( 'q' ) )
            ->where( 'categoria', 'Cultural' )
            ->orderBy( 'fecha', 'DESC' )
            ->paginate( 8 );

        return view( 'egresados.eventos', compact( 'eventos' ) );
    }

    public function academicos( Request $request )
    {	
        $eventos = Evento::titulo( $request->get( 'q' ) )
            ->where( 'categoria', 'Académico' )
            ->orderBy( 'fecha', 'DESC' )
            ->paginate( 8 );

        return view('egresados.eventos', compact( 'eventos') );
    }
}