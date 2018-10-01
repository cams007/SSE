<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CatalogoHabilidad;
use App\CatalogoPregunta;
use App\CatalogoValor;
use App\EvaluacionPE;
use App\PrimerEmpleo;
use App\HabilidadPE;
use App\Preparacion;
use App\Doctorado;
use App\Egresado;
use App\Maestria;
use App\ValorPE;
use App\Empleo;
use App\User;
use Session;
use Image;
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
    public function showPerfilForm()
    {
        return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
    }
    
    public function showEstudiosForm()
    {
        return view('egresados.perfil.estudiosRealizados', ['preparacion' => Auth::user()->egresado->preparacion] );
    }

    public function showPrimerEmpleoForm()
    {
        $empleo = PrimerEmpleo::where('id', Auth::user()->egresado->primer_empleo_id)->first();

        return view('egresados.perfil.primerEmpleo', compact( 'empleo' ) );
    }

    public function showEmpleosForm()
    {
        return view( 'egresados.perfil.empleos', [ 'empleos' => Auth::user()->egresado->empleos ] );
    }

    public function showSatisfaccionForm()
    {
        $count = DB::table('EvaluacionPE')
            ->where( 'primerEmpleo_id', Auth::user()->egresado->primer_empleo_id )
            ->count();

        return view('egresados.perfil.satisfaccion', compact('count') );
    }

    public function saveEmpleo( Request $request )
    {
        DB::beginTransaction();
        try
        {
            $empleo = new Empleo();

            $empleo->empresa =  $request->empresa;
            $empleo->puesto_inicial = $request->puestoi;
            $empleo->puesto_final = $request->puestof;
            $empleo->funciones = $request->funciones;
            $empleo->antiguedad = $request->antiguedad;
            $empleo->unidad_tiempo = $request->antiguedadunidad;
            $empleo->egresado_matricula = Auth::user()->egresado_matricula;

            $empleo->save();
        }
        catch( Exception $e )
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            
            Session::flash('message_danger', 'Hubo un problema al momento de guardar la información.' );
            
            return view( 'egresados.perfil.empleos', [ 'empleos' => Auth::user()->egresado->empleos ] );
        }
        DB::commit();
        
        Session::flash('message_success', 'Empleo guardado correctamente.' );

        return view( 'egresados.perfil.empleos', [ 'empleos' => Auth::user()->egresado->empleos ] );
    }

    public function saveDatosBasicos(Request $request)
    {
        $info = "";
        DB::beginTransaction();
        try
        {
            $egresado = Auth::user()->egresado;

            if( $request[ 'modificacion' ] == "telefono" )
            {
                $egresado->telefono = $request->telefono;
                $info = "Teléfono";
            }
            if( $request[ 'modificacion' ] == "direccion" )
            {
                $egresado->direccion_actual = $request->direccion;
                $info = "Dirección";
            }
            // $egresado->usuario->correo;
            $egresado->save();
        }
        catch( Exception $e )
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            Session::flash('message_danger', "Hubo un error al momento de actualizar" );

            return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
        }
        DB::commit();
        //Para mostrar mensaje partials/messages.blade.php
        Session::flash('message_success', $info." actualizado correctamente" );

        return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
    }

    public function updatePhoto( Request $request )
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

    public function saveMaestria( Request $request )
    {
        DB::beginTransaction();
        try
        {
            $maestria = new Maestria();

            $maestria->descripcion = $request->agregarmaestria;
            $maestria->titulado = $request->sector1;
            $maestria->preparacion_id = Auth::user()->egresado->preparacion->id;

            $maestria->save();
        }
        catch( Exception $e )
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            Session::flash('message_danger', "Hubo un error al momento de actualizar" );
            
            return $this->showEstudiosForm();
        }
        DB::commit();

        //Para mostrar mensaje partials/messages.blade.php
        Session::flash('message_success', "Maestría guardada correctamente" );
        return $this->showEstudiosForm();
    }

    public function saveDoctorado( Request $request )
    {
        DB::beginTransaction();
        try
        {
            $doctorado = new Doctorado();

            $doctorado->descripcion = $request->agregardoctorado;
            $doctorado->titulado = $request->sector;
            $doctorado->preparacion_id = Auth::user()->egresado->preparacion->id;

            $doctorado->save();
        }
        catch( Exception $e )
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            Session::flash('message_danger', "Doctorado guardada correctamente" );

            return $this->showEstudiosForm();
        }
        DB::commit();
        //Para mostrar mensaje partials/messages.blade.php
        Session::flash('message_success', "Doctorado guardada correctamente" );

        return $this->showEstudiosForm();
    }

    public function saveFormacion( Request $request )
    {
        // Guarda la informacio sobre la formacion profesional del egresado
        DB::beginTransaction();
        try
        {
            $prep = Auth::user()->egresado->preparacion;
            
            if( $request->titulacion == "No titulado" ) {
                $prep->forma_titulacion = $request->titulacion;    
            }
            else {
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
        Session::flash('save', 'Informacion actualizada correctamente' );
        
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
            //Para mostrar mensaje partials/messages.blade.php
            Session::flash('message_danger', "Hubo un error al momento de actualizar la información." );
            return $this->showPrimerEmpleoForm();
        }
        DB::commit();
        //Para mostrar mensaje partials/messages.blade.php
        Session::flash('message_success', "Primer empleo guardado correctamente." );

        return $this->showPrimerEmpleoForm();
    }

    function guardarRelacion( $id, $valrequest, $pregunta )
    {
        DB::beginTransaction();
        try
        {
            $catalogo = new CatalogoPregunta();
            $evaluacionpe = new EvaluacionPE();

            $catalogo->pregunta = $pregunta;
            $catalogo->cuestionario = "1";
            $catalogo->save();

            $evaluacionpe->evaluacion = $valrequest;
            $evaluacionpe->primerEmpleo_id = $id;
            $evaluacionpe->catalogoPregunta_id = $catalogo->id;
            $evaluacionpe->save();
        }
        catch( Exception $e )
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
        }
        DB::commit();
    }

    public function saveSatisfaccion( Request $request )
    {
        try {
            $pe_id = Auth::user()->egresado->primer_empleo_id;
            // Formacion recibida
            $this->guardarRelacion( $pe_id, $request->formacion, "Formación recibida" );

            // Instalaciones (aulas, biblioteca, salas de cómputo, laboratorios, otros)
            $this->guardarRelacion( $pe_id, $request->instalaciones, "Instalaciones (aulas, biblioteca, salas de cómputo, laboratorios, otros)" );

            // Servicios (escolares y administrativos)
            $this->guardarRelacion( $pe_id, $request->servicios, "Servicios (escolares y administrativos)" );

            // Equipos, instrumentos, maquinaria, herramientas y software
            $this->guardarRelacion( $pe_id, $request->equipos, "Equipos, instrumentos, maquinaria, herramientas y software" );

            // Limpieza de la infraestructura
            $this->guardarRelacion( $pe_id, $request->limpieza, "Limpieza de la infraestructura" );

            // Capacidad de la infraestructura
            $this->guardarRelacion( $pe_id, $request->infraestructura, "Capacidad de la infraestructura" );

            //Desempeño de los docentes (transmisión de conocimientos, aclaración de dudas y asesorías)
            $this->guardarRelacion( $pe_id, $request->desempenio, "Desempeño de los docentes (transmisión de conocimientos, aclaración de dudas y asesorías)" );

            // Técnicas (investigación, análisis, comparación, etc.) y métodos (uso de casos de estudio,
            // aplicación del conocimiento en problemas reales, etc.) de enseñanza aplicados por los Docentes
            $this->guardarRelacion( $pe_id, $request->tecnicas, "Técnicas y métodos de enseñanza aplicados por los Docentes" );

            // Técnicas (investigación, análisis, comparación, etc.) y métodos (uso de casos de estudio,
            // aplicación del conocimiento en problemas reales, etc.) de enseñanza aplicados por los Docentes
            $this->guardarRelacion( $pe_id, $request->pertinencia, "Forma y pertinencia de evaluación aplicados por los Docentes" );

            $catalogohabilidad = new CatalogoHabilidad();
            $habilidadpe = new HabilidadPE();

            $catalogohabilidad->descripcion = implode( ", ", $request->actitudes );
            $catalogohabilidad->save();

            $habilidadpe->habilidad = implode( ", ", $request->actitudes );
            $habilidadpe->primerEmpleo_id = $pe_id;
            $habilidadpe->catalogoHabilidad_id = $catalogohabilidad->id;
            $habilidadpe->save();

            $catalogovalor = new CatalogoValor();
            $valorpe = new ValorPE();
            
            $catalogovalor->descripcion = implode( ", ", $request->valores );
            $catalogovalor->save();

            $valorpe->valor = implode( ", ", $request->valores );
            $valorpe->primerEmpleo_id = $pe_id;
            $valorpe->catalogoValor_id = $catalogovalor->id;
            $valorpe->save();
            
            Session::flash('message_success', "Formulario guardado correctamente." );
        } 
        catch( ModelNotFoundException $exception ) {
            Session::flash('message_danger', "Error al momento de guardar los datos." );
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect( 'perfil/satisfaccion' );
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
        // Si se cargo el archivo correctamente
        if( $request->hasFile( 'e_cv' ) )
        {
            $egresado = Auth::user()->egresado;
            // Guarda el cv en storage/app/cvs con el nombre matriculaegresad.pdf
            $path = $request->file('e_cv')->storeAs( 'cvs', $egresado->matricula.".pdf" );
            $egresado->cv_url = $path;

            $egresado->save();
        }

        Session::flash('message_success', "CV actualizado correctamente" );
        
        return view('egresados.perfil.index', ['egresados' => Auth::user()->egresado]);
    }
}
