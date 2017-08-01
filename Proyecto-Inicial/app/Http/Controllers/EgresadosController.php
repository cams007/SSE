<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egresado;

class EgresadosController extends Controller
{
	public function index(Request $request) {

        $egresados = Egresado::titulo($request->get('q'))->orderBy('nombre', 'DESC')->paginate(8);

        return view('Admin.Egresado.index', compact('egresados'));//dirigimos a la direccion de la vista
    }

    public function showCrearEgresado(Request $request) {

        return view('admin.Egresado.crearEgresado', compact('egresados'));
    }

    public function showEditarEgresado(Request $request) {

        return view('admin.alumnos.editarAlumno');
    }

    public function saveEgresado(Request $request) {

        //return view('admin.alumnos.index', compact('egresados'));
        //dd($request->all());
        $egresado = new egresado();
        $egresado->matricula = $request->matricula;
        $egresado->nombre = $request->nombre;
        $egresado->curp = $request->curp;
        $egresado->genero = $request->genero;
        $egresado->fecha_nacimiento = $request->fecha_nacimiento;
        $egresado->lugar_origen = $request->lugar_origen;
        $egresado->preparacion_id = $request->especialidad;
        $egresado->habilitado = 1;
        $egresado->save();
        //$egresado->create($request->all());
        //return redirect('egresado');
        //$egresado = new Egresado($request->all());
        //dd($egresado);
        echo "simona";

        
    }
}
