<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Empresa;
use App\Contacto;
use App\Ranking;
use App\Egresado;
use App\Oferta;
use Auth;
use Session;

class DirectorioController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
    **/
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Get information on existing companies
        $empresas = Empresa::nombre($request->get('q'))
            ->orderBy('nombre', 'ASC')
            ->paginate(10);

        return view('egresados.directorio.index', compact('empresas') );
    }

    public function showEmpresaView( Request $request )
    {
        // Company information
        $empresa = Empresa::where('id', $request->id )
            ->first();
        // To check the current user does not have a ranking for the company
        $rank = DB::table( 'Ranking' )
            ->where( [[ 'egresado_matricula', '=', Auth::user()->egresado_matricula ],
                    [ 'empresa_id', '=', $request->id ] ] )
            ->count();

       return view('egresados.directorio.datos', compact( 'empresa', 'request', 'rank' ) );
    }

    /**
    * Create a new rating for the company with the actual id
    * The user only can rating the company once
    **/
    public function saveCalificacion( Request $request )
    {
        // Save the user's ranking in database
        DB::beginTransaction();
        try
        {
            $ranking = new Ranking();
            // The user not select any stars
            if( $request[ 'star' ] > 0 )
                $ranking->calificacion = $request[ 'star' ];
            else
                $ranking->calificacion = 0;
            $ranking->comentario = $request->comentario;
            $ranking->egresado_matricula = Auth::user()->egresado_matricula;
            $ranking->empresa_id = $request->id;
            $ranking->save();
        }
        catch( Exception $e )
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
        }
        DB::commit();

        //Para mostrar mensaje partials/messages.blade.php
        Session::flash('save', 'Calificación guardada correctamente');
        
        // To display company information again
        $empresa = Empresa::where('id', $request->id )
            ->first();
        // To check if the actual user
        $rank = DB::table( 'Ranking' )
            ->where( [[ 'egresado_matricula', '=', Auth::user()->egresado_matricula ], [ 'empresa_id', '=', $request->id ] ] )
            ->count();

        return view('egresados.directorio.datos', compact( 'empresa', 'request', 'rank' ) );
    }

    public function showComentariosEmpresaView( Request $request )
    {
        // Get comments on the current company
        $ranking = Ranking::where( 'empresa_id', $request->id )
            ->paginate( 10 );

        // To get the average rating of the current company
        $comentario = Ranking::where('empresa_id', $request->id )
            ->select(DB::raw( 'count(*) as total' ) )
            ->selectRaw('Ranking.*, avg( Ranking.calificacion ) as promedio')
            ->first();
    
        return view('egresados.directorio.comentarios', compact( 'request', 'comentario', 'ranking' ) );
    }

    public function showOfertasEmpresaView( Request $request )
    {
        // // Get Ofertas on the current company
        $ofertas = Oferta::where( 'empresa_id', $request->id )
            ->orderBy('created_at', 'DESC')
            ->paginate( 10 );

        $totalOferta = Oferta::where('empresa_id', $request->id )
            ->select(DB::raw( 'count(*) as total' ) )
            ->first();
    
        return view('egresados.directorio.ofertasLaborales', compact( 'request', 'ofertas', 'totalOferta' ) );
    }
}
