<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

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

    public function showRankingView(Request $request)
    {
        $empresas = Empresa::nombre($request->get('q'))
            ->ubicacion($request->get('q'))
            ->join('Ranking', 'Empresa.id', '=', 'Ranking.empresa_id')
            ->groupBy('Empresa.id')
            ->orderBy('calif', 'DESC')
            ->selectRaw('Empresa.*, avg( Ranking.calificacion ) as calif')
            ->paginate(10);

        return view('egresados.ranking', compact('empresas'));
    }
}
