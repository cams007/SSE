<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Oferta;
use App\Empresa;
use Session;
use Auth;

class OfertasLaboralesAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index( Request $request )
    {
        if( $request->q == "" ) $string = "empty"; else $string = $request->q;

        $ofertas = Oferta::todo( $request->get( 'q' ) )
            ->where( 'status', '<>','Cancelada' )
            ->paginate( 10 );
        
        return view('admin.ofertas.index', compact('ofertas'), [ 'valor' => $string ] );
    }

    public function showCrearOferta(Request $request) 
    {
        // Obtiene las empresas y selecciona solo id's y nombre's
        $empresas = DB::table( 'Empresa' )
            ->select( 'id', 'nombre' )
            ->get();
        
        return view('admin.ofertas.crearOferta', compact('empresas') );
    }

    /*
    ** Iniciamos la transaccion para guardar los datos
    ** de la nueva oferta en la DB
    */
    public function saveOferta(Request $request)
    {
        DB::beginTransaction();
        try{
            //Guardar datos de la oferta
            $oferta = new Oferta();
            $oferta->titulo_empleo = $request->titulo_empleo;
            $oferta->descripcion = $request->descripcion;
            $oferta->ubicacion = $request->ubicacion;
            $oferta->carrera = $request->carrera;
            $oferta->experiencia = $request->experiencia;
            $oferta->salario = $request->salario;
            $oferta->status = $request->status;
            $oferta->empresa_id = $request->empresa_id;
            $oferta->save();
        }
        catch(Exception $e)
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            //Para mostrar mensaje partials/messages.blade.php
            Session::flash('message_danger', 'No se pudo crear la oferta.');
            //Redireccionamos al index de egresado url(/admin/egresado)
            return redirect('admin/ofertas');
        }
        DB::commit();

        //Para mostrar mensaje partials/messages.blade.php
        Session::flash('message_success', 'La oferta se ha creado correctamente.');
        //Redireccionamos al index de egresado url(/admin/egresado)
        return redirect('admin/ofertas');
    }

    /*
    ** Iniciamos la transaccion para guardar los datos
    ** de la oferta que se edito en la DB
    */
    public function saveEditarOferta(Request $request)
    {
        $oferta = Oferta::findOrFail( $request->id );

        DB::beginTransaction();
        try{
            //Guardar datos de la oferta
            $oferta->titulo_empleo = $request->titulo_empleo;
            $oferta->descripcion = $request->descripcion;
            $oferta->ubicacion = $request->ubicacion;
            $oferta->carrera = $request->carrera;
            $oferta->experiencia = $request->experiencia;
            $oferta->salario = $request->salario;
            $oferta->status = $request->status;
            $oferta->empresa_id = $request->empresa_id;
            $oferta->save();
        }
        catch(Exception $e)
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            Session::flash('message_danger', 'La oferta no se actualizó correctamente.');
            return redirect('admin/ofertas');//Redireccionamos al index de egresado url(/admin/egresado)
        }
        DB::commit();

        Session::flash('message_success', 'Oferta actualizada correctamente.');

        return redirect('admin/ofertas');//Redireccionamos al index de egresado url(/admin/egresado)  
    }

    /*
    ** Pone el status de la oferta en Cancelada
    ** No se mostrara 
    */
    public function eliminarOferta( Request $request )
    {
        $oferta = Oferta::findOrFail( $request->oferta_id );

        DB::beginTransaction();
        try{
            // Cambia el status de la oferta a cancelada
            $oferta->status = "Cancelada";
            // Guarda los cambios
            $oferta->save();
        }catch(Exception $e)
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            Session::flash('message_danger', 'La oferta no se ha eliminado.');
            //Redireccionamos al index de oferta url(/admin/oferta)
            return redirect('admin/ofertas');
        }
        DB::commit();
        // Manda un mensaje de exito
        Session::flash('message_success', 'La oferta se ha eliminado correctamente.');
        //Redireccionamos al index de oferta url(/admin/oferta)
        return redirect('admin/ofertas');
    }

    public function showEditarOferta( Request $request, $id )
    {
        // Obtiene la oferta a editar
        $oferta = DB::table( 'Oferta' )
            ->where( 'id', "$id" )
            ->first();
        // Obtiene las empresas
        $empresas = DB::table( 'Empresa' )
            ->select( 'id', 'nombre' )
            ->get();
        
        return view( 'admin.ofertas.editarOferta', compact( 'oferta' ), compact( 'empresas' ) );
    }
}