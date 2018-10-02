<?php

namespace App\Http\Controllers;
use App\Tabulador;

use Illuminate\Http\Request;

class TabuladorController extends Controller
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

    public function showTabuladorView(Request $request)
    {
    	$salarios = Tabulador::empleo( $request->get( 'q' ) )
    		->carrera($request->get('carrera') )
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('egresados.tabuladorSalarios', compact('salarios'));
    }

}
