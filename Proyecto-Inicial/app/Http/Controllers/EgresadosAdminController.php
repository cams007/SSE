<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Egresado;
use App\Preparacion;

class EgresadosAdminController extends Controller
{
	public function index(Request $request) {

        $egresados = Egresado::titulo($request->get('q'))->orderBy('ap_paterno', 'DESC')->paginate(8);

        return view('Admin.Egresado.index', compact('egresados'));//dirigimos a la direccion de la vista
    }

    public function showCrearEgresado(Request $request) {

        return view('admin.egresado.crearEgresado', compact('egresados'));
    }

    public function showEditarEgresado(Request $request,$ma){

        $egresado = DB::table('egresado')->where('matricula',"$ma")->first();
        $preparacion = DB::table('preparacion')->where('id',"$egresado->preparacion_id")->first();
        return view('admin.egresado.editarEgresado', compact('egresado'), compact('preparacion'));
    }

    public function saveEgresado(Request $request) {

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
            $egresado->preparacion_id = $preparacionID->id;//Asigna idPreparacion a egresado

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
            $egresado->save();
        }catch(Exception $e){
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
        }
        DB::commit();

        return redirect('admin/egresado');//Redireccionamos al index de egresado url(/admin/egresado)
    }

    public function saveEditarEgresado(Request $request){

        $egresado = Egresado::findOrFail($request->matricula);
        $preparacion = Preparacion::findOrFail($egresado->preparacion_id);

        //Guarda datos en la BD. Primero los datos de preparacion
        $preparacion->carrera = $request->carrera;
        $preparacion->generacion = $request->generacion;
        $preparacion->fecha_inicio = $request->fecha_inicio;
        $preparacion->fecha_fin = $request->fecha_fin;
        $preparacion->promedio = $request->promedio;

        //Guardar datos del egresado en la BD(egresado)
        $egresado->matricula = $request->matricula;
        $egresado->nombre = $request->nombre;
        $egresado->curp = $request->curp;
        $egresado->genero = $request->genero;
        $egresado->fecha_nacimiento = $request->fecha_nacimiento;
        $egresado->nacionalidad = $request->nacionalidad;
        $egresado->lugar_origen = $request->lugar_origen;
        //$egresado->habilitado = $request->habilitado;

        $preparacion->save();
        $egresado->save();

        return redirect('admin/egresado');//Redireccionamos al index de egresado url(/admin/egresado)
    }

}
