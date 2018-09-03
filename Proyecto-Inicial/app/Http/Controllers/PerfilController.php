<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egresado;
use App\User;
use App\Preparacion;
use App\PrimerEmpleo;
use App\Maestria;
use App\Doctorado;
use Auth;
use Image;

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
        return view('egresados.perfil.estudiosRealizados', ['preparacion' => Auth::user()->egresado->preparacion]);
    }

    public function showPrimerEmpleoForm(){

        $primerempleo = PrimerEmpleo::where('id', Auth::user()->egresado->primerEmpleo_id)->first();

        return view('egresados.perfil.primerEmpleo', ['empleo' => $primerempleo]);
    }

    public function showEmpleosForm(){
        return view('egresados.perfil.empleos');
    }

    public function showSatisfaccionForm(){
        return view('egresados.perfil.satisfaccion', array('dato' => 'No'));
    }

    public function saveDatosBasicos(Request $request) {
        $egresado = Auth::user()->egresado;

        $egresado->genero = $request->e_genero;
        $egresado->nacionalidad = $request->e_nacionalidad;
        $egresado->telefono = $request->e_telefono;
        $egresado->direccion_actual = $request->e_direccionActual;
        // save cv
        $egresado->save();

        $egresado->usuario->correo = $request->e_correo;
        $egresado->usuario->save();
        
        // return redirect('perfil/estudiosRealizados', ['preparacion' => Auth::user()->egresado->preparacion]);
        return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
    }

    public function updatePhoto(Request $request){
        if ($request->hasFile('e_img')){
            $imagen = $request->file('e_img');
            $filename = time() . '.' . $imagen->getClientOriginalExtension();
            Image::make($imagen)->save( public_path('/assets/images/egresados/' . $filename ) );

            $egresado = Auth::user()->egresado;
            $egresado->imagen_url = 'assets/images/egresados/' . $filename;
            $egresado->save();
        }
        return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
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
