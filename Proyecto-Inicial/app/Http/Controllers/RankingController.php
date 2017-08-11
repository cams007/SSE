<?php

namespace App\Http\Controllers;
use App\Ranking;
use App\Empresa;

use Illuminate\Http\Request;

class RankingController extends Controller
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

    public function showRankingView(Request $request){

    	$empresas = Empresa::nombre($request->get('q'))
            ->ubicacion($request->get('q'))
            ->join('ranking', 'empresa.id', '=', 'ranking.empresa_id')
            ->groupBy('empresa.id')
            ->orderBy('calif', 'DESC')
            ->selectRaw('empresa.*, avg(ranking.calificacion) as calif')
            ->paginate(10);

        return view('egresados.ranking', compact('empresas'));
    }
}
