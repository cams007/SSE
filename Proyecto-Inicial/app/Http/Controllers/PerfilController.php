<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Egresado;
use App\User;
use App\Preparacion;
use App\PrimerEmpleo;
use App\Maestria;
use App\Doctorado;              
use Session;
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
    public function showPerfilForm()
    {
        return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
    }
    
    public function showEstudiosForm()
    {
        return view('egresados.perfil.estudiosRealizados', ['preparacion' => Auth::user()->egresado->preparacion]);
    }

    public function showPrimerEmpleoForm()
    {
        $primerempleo = PrimerEmpleo::where('id', Auth::user()->egresado->primerEmpleo_id)->first();

        return view('egresados.perfil.primerEmpleo', ['empleo' => $primerempleo]);
    }

    public function showEmpleosForm()
    {
        return view('egresados.perfil.empleos');
    }

    public function showSatisfaccionForm()
    {
        return view('egresados.perfil.satisfaccion', array('dato' => 'No'));
    }

    public function saveDatosBasicos(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $egresado = Auth::user()->egresado;

            if( $request[ 'modificacion' ] == "correo" )
                $egresado->usuario->correo = $request->correo;;
            if( $request[ 'modificacion' ] == "telefono" )
                $egresado->telefono = $request->telefono;
            if( $request[ 'modificacion' ] == "direccion" )
                $egresado->direccion_actual = $request->direccion;
            
            $egresado->usuario->save();
        }
        catch( Exception $e )
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
        }
        DB::commit();
        //Para mostrar mensaje partials/messages.blade.php
        Session::flash('save', 'Información actualizada correctamente' );

        return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
    }

    public function updatePhoto(Request $request)
    {
        if ($request->hasFile('e_img'))
        {
            $imagen = $request->file('e_img');
            $filename = time() . '.' . $imagen->getClientOriginalExtension();
            Image::make($imagen)->save( public_path('/assets/images/egresados/' . $filename ) );

            $egresado = Auth::user()->egresado;
            $egresado->imagen_url = 'assets/images/egresados/' . $filename;
            $egresado->save();
        }

        return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
    }

    public function saveFormacionPerson(Request $request)
    {
        return redirect('perfil/primerEmpleo');
    }

    public function savePrimerEmp(Request $request)
    {
    	return redirect('perfil/empleos');
    }

    public function saveFormacionProf(Request $request)
    {
    	return redirect('perfil/satisfaccion');
    }
}
