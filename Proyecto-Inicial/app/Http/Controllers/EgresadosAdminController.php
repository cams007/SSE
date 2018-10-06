<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Egresado;
use App\Preparacion;
use Session;

class EgresadosAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
	public function index( Request $request )
    {
        if( $request->q =="" ) $string = "empty"; else $string = $request->q;

        $egresados = Egresado::todo( $request->get('q') )
            ->where( 'habilitado','=', 1 )
            ->orderBy( 'ap_paterno', 'DESC' )
            ->paginate( 10 );

        return view('admin.egresado.index', compact('egresados'), [ 'valor' => $string ] );
    }

    public function showCrearEgresado(Request $request)
    {
        return view('admin.egresado.CrearEgresado', compact('egresados'));
    }

    public function showEditarEgresado(Request $request,$ma)
    {
        $egresado = DB::table('Egresado')
            ->where('matricula',"$ma")
            ->first();
    
        $preparacion = DB::table('Preparacion')
            ->where('id',"$egresado->preparacion_id")
            ->first();

        return view('admin.egresado.editarEgresado', compact('egresado'), compact('preparacion'));
    }

    public function saveEgresado( Request $request )
    {
        $egresado = Egresado::findOrFail( $request->matricula )->count();
        
        if( $egresado == 0 )
        {
            DB::beginTransaction();
            try{
                //Guarda datos en la BD. Primero los datos de preparacion
                $preparacion = new Preparacion();
                $preparacion->carrera = $request->carrera;
                $preparacion->generacion = $request->generacion;
                $preparacion->fecha_inicio = $request->fecha_inicio;
                $preparacion->fecha_fin = $request->fecha_fin;
                $preparacion->promedio = $request->promedio;
                $preparacion->save();//Guardamos datos de la preparacion

                $prep = preparacion::all();
                $preparacionID = $prep->last();//obtenemos el ultimo registro de la BD

                //Guardar datos del egresado en la BD(egresado)
                $egresado = new Egresado();
                $egresado->matricula = $request->matricula;
                $egresado->ap_paterno = $request->ap_pa;
                $egresado->ap_materno = $request->ap_ma;
                $egresado->nombres = $request->nombres;
                $egresado->curp = $request->curp;
                $egresado->genero = $request->genero;
                $egresado->fecha_nacimiento = $request->fecha_nacimiento;
                $egresado->nacionalidad = $request->nacionalidad;
                $egresado->lugar_origen = $request->lugar_origen;
                $egresado->habilitado = $request->habilitado;
                $egresado->preparacion_id = $preparacionID->id;//Asigna idPreparacion a egresado
                $egresado->save();
            }catch( Exception $e )
            {
                DB::rollback();
                echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                
                Session::flash('message_danger', 'Error al momento de guardar la información.' );
        
                return redirect('admin/egresado');//Redireccionamos al index de egresado url(/admin/egresado)
            }
            DB::commit();

            Session::flash('message_success', 'Egresado guardado correctamente.' );
        
            return redirect('admin/egresado');//Redireccionamos al index de egresado url(/admin/egresado)
        }
        Session::flash('message_danger', 'La información del egresado ya existe.' );

        return redirect('admin/egresado');//Redireccionamos al index de egresado url(/admin/egresado)
    }

    public function saveEditarEgresado(Request $request)
    {
        $egresado = Egresado::findOrFail( $request->matricula );
        $preparacion = Preparacion::findOrFail( $egresado->preparacion_id );

        DB::beginTransaction();
        try{
            //Guarda datos en la BD. Primero los datos de preparacion
            $preparacion->carrera = $request->carrera;
            $preparacion->generacion = $request->generacion;
            $preparacion->fecha_inicio = $request->fecha_inicio;
            $preparacion->fecha_fin = $request->fecha_fin;
            $preparacion->promedio = $request->promedio;
            $preparacion->save();//Guardamos datos de la preparacion

            //Guardar datos del egresado en la BD(egresado)
            $egresado->matricula = $request->matricula;
            $egresado->ap_paterno = $request->ap_pa;
            $egresado->ap_materno = $request->ap_ma;
            $egresado->nombres = $request->nombres;
            $egresado->curp = $request->curp;
            $egresado->genero = $request->genero;
            $egresado->fecha_nacimiento = $request->fecha_nacimiento;
            $egresado->nacionalidad = $request->nacionalidad;
            $egresado->lugar_origen = $request->lugar_origen;
            $egresado->habilitado = $request->habilitado;
            $egresado->preparacion_id = $preparacion->id;//Asigna idPreparacion a egresado
            $egresado->save();

        }catch(Exception $e)
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            
            Session::flash('message_danger', 'Hubo un error al momento de actualizar.' );

            return redirect('admin/egresado');//Redireccionamos al index de egresado url(/admin/egresado)
        }
        DB::commit();

        Session::flash('message_success', 'La información se ha actualizado correctamente.' );

        return redirect('admin/egresado');//Redireccionamos al index de egresado url(/admin/egresado)
    }

    public function eliminarEgresado( Request $request )
    {
        $egresado = Egresado::findOrFail( $request->matricula );

        DB::beginTransaction();
        try
        {
            $egresado->habilitado = 0;
            $egresado->save();
        }catch(Exception $e)
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            Session::flash('message_danger', 'Hubo un error al momento de eliminar la información.' );
            //Redireccionamos al index de egresado url(/admin/egresado)
            return redirect('admin/egresado');
        }
        DB::commit();

        Session::flash('message_success', 'La información del egresado se ha eliminado correctamente.' );
        //Redireccionamos al index de egresado url(/admin/egresado)
        return redirect('admin/egresado');
    }

}
