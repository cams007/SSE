<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egresado;
use App\User;
use App\Preparacion;
use App\Maestria;
use App\Doctorado;
use Auth;

class PerfilController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** 
     *   Retorna formulario de datos básicos de mi perfil
     *   con datos de egresado autenticado
    **/
    public function showPerfilForm(){
        return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
    }

    public function showEstudiosForm(){
        return view('egresados.perfil.estudiosRealizados');
    }

    public function showPrimerEmpleoForm(){
        return view('egresados.perfil.primerEmpleo');
    }

    public function showEmpleosForm(){
        return view('egresados.perfil.empleos');
    }

    public function showSatisfaccionForm(){
        return view('egresados.perfil.satisfaccion', array('dato' => 'No'));
    }

    public function saveDatosB(Request $request) {

        $egresado = Egresado::where('nacionalidad', '<>', null)->first();
        $egresado->telefono = $request->egresadosTel;
        $egresado->direccion_actual = $request->cActual;
        $egresado->usuario->correo = $request->egresadosEmail;
        $egresado->save();
        $egresado->usuario->save();
        
        return redirect('perfil/estudiosRealizados');
    }

    public function saveFormacionPerson(Request $request) {
        // $p = 
        return redirect('perfil/primerEmpleo');
    }

    public function savePrimerEmp(Request $request) {
    	return redirect('perfil/empleos');
    }

    public function saveFormacionProf(Request $request) {
    	return redirect('perfil/satisfaccion');
    }
}
