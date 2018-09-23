<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Empresa;
use App\Contacto;
use App\Ranking;
use App\Egresado;
use App\Oferta;

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

        return view('egresados.directorio.index', compact('empresas') );
    }

    public function showEmpresaView( Request $request )
    {
        //$request->id
        $empresa = Empresa::where('id', $request->id )
            ->first();

        return view('egresados.directorio.datos', compact( 'empresa' ), compact( 'request' ) );
    }

    public function showComentariosEmpresaView( Request $request )
    {
        // $request->id
        $ranking = Ranking::where( 'empresa_id', $request->id )
            ->orderBy('calificacion', 'DESC')
            ->paginate( 10 );

        $comentario = Ranking::where('empresa_id', $request->id )
            ->select(DB::raw( 'count(*) as total' ) )
            ->selectRaw('Ranking.*, avg( Ranking.calificacion ) as promedio')
            ->first();
    
        return view('egresados.directorio.comentarios', compact( 'request', 'comentario', 'ranking' ) );
    }

    public function showOfertasEmpresaView( Request $request )
    {
        // $request->id
        $ofertas = Oferta::where( 'empresa_id', $request->id )
            ->orderBy('created_at', 'DESC')
            ->paginate( 10 );

        $totalOferta = Oferta::where('empresa_id', $request->id )
            ->select(DB::raw( 'count(*) as total' ) )
            ->first();
    
        return view('egresados.directorio.ofertasLaborales', compact( 'request', 'ofertas', 'totalOferta' ) );
    }
}
