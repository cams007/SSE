<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        $empleo = PrimerEmpleo::where('id', Auth::user()->egresado->primer_empleo_id)->first();

        //return $primerempleo->empresa;
        return view('egresados.perfil.primerEmpleo', compact( 'empleo' ) );
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

            if( $request[ 'modificacion' ] == "telefono" )
                $egresado->telefono = $request->telefono;
            if( $request[ 'modificacion' ] == "direccion" )
                $egresado->direccion_actual = $request->direccion;
            // $egresado->usuario->correo;
            $egresado->save();
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

    public function saveFormacion( Request $request )
    {
        // echo "Forma: ".$request->titulacion."\n";
        // echo "Fecha: ".$request->ftitulacion;
        DB::beginTransaction();
        try
        {
            $prep = Auth::user()->egresado->preparacion;
            
            if( $request->titulacion == "No titulado" )
            {
                $prep->forma_titulacion = $request->titulacion;    
            }
            else
            {
                $prep->forma_titulacion = $request->titulacion;
                $prep->fecha_titulo = $request->ftitulacion;
            }
            
            $prep->save();
        }
        catch( Exception $e )
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
        }
        DB::commit();
        //Para mostrar mensaje partials/messages.blade.php
        Session::flash('save', 'Fecha titulacion actualizada correctamente' );
        
        return view('egresados.perfil.estudiosRealizados', ['preparacion' => Auth::user()->egresado->preparacion]);
    }

    public function saveFormacionPerson(Request $request)
    {
        return $request;

        //return redirect('perfil/primerEmpleo');
    }

    public function savePrimerEmp( Request $request )
    {   
        DB::beginTransaction();
        try
        {
            $egresado = Auth::user()->egresado;
            $primerEmpleo = new PrimerEmpleo();
            $primerEmpleo->tiempo_sin_empleo = $request->sinempleo;
            $primerEmpleo->empresa = $request->empresa;
            $primerEmpleo->telefono_empresa = $request->telefono;
            $primerEmpleo->sector = $request->sector;
            $primerEmpleo->fecha_ingreso = $request->fingreso;
            $primerEmpleo->puesto_inicial = $request->puestoA;
            $primerEmpleo->puesto_final = $request->puestoI;
            $primerEmpleo->jornada = $request->contrato;
            $primerEmpleo->contrato = $request->tcontrato;
            $primerEmpleo->ingreso_mensual = $request->ingresomensual;
            $primerEmpleo->actividad_laboral = $request->actividades;
            $primerEmpleo->factores_contratacion = $request->factor;
            $primerEmpleo->carencias_basicas = $request->carencia;
            $primerEmpleo->carencias_areas = $request->areascarencia;
            $primerEmpleo->motivo_no_posgrado = $request->posgrado;
            $primerEmpleo->recomendaciones = $request->recomendacion;

            $primerEmpleo->save();

            $egresado->primer_empleo_id = $primerEmpleo->id;
            $egresado->save();
        }
        catch( Exception $e )
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
        }
        DB::commit();
        //Para mostrar mensaje partials/messages.blade.php
        Session::flash('save', 'Datos guardados correctamente' );

        return $this->showPrimerEmpleoForm();
    }

    public function saveSatisfaccion( Request $request )
    {
        return $request;
    }

    public function saveFormacionProf(Request $request)
    {
    	return redirect('perfil/satisfaccion');
    }

    /**
    * Sube el CV en el directorio storage/app/cvs
    **/
    public function uploadCV( Request $request )
    {
        if( $request->hasFile( 'e_cv' ) )
        {
            $egresado = Auth::user()->egresado;

            $path = $request->file('e_cv')->storeAs( 'cvs', $egresado->matricula.".pdf" );
            $egresado->cv_url = $path;

            $egresado->save();
        }

       return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
    }
}
