<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egresado;
use App\Preparacion;

class EgresadosAdminController extends Controller
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

         //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/egresados/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        if(!is_writable($dir_destino)){//comprobamos permisos de escritura
            echo "no tiene permisos";
        }
        else{
            if(is_uploaded_file($archivo)){ //verifica que el archivo se haya subido
                if(copy($archivo, $imagen_subida)){//copia el archivo a la ruta indicada
                    //Guarda datos en la BD. Primero los datos de preparacion
                    $preparacion = new Preparacion();
                    $preparacion->carrera = $request->carrera;
                    $preparacion->generacion = $request->generacion;
                    $preparacion->fecha_inicio = $request->fecha_inicio;
                    $preparacion->fecha_fin = $request->fecha_fin;
                    $preparacion->promedio = $request->promedio;

                    //Guardar datos del egresado en la BD(egresado)
                    $egresado = new Egresado();
                    $egresado->matricula = $request->matricula;
                    $egresado->nombre = $request->nombre;
                    $egresado->curp = $request->curp;
                    $egresado->genero = $request->genero;
                    $egresado->fecha_nacimiento = $request->fecha_nacimiento;
                    $egresado->nacionalidad = $request->nacionalidad;
                    $egresado->lugar_origen = $request->lugar_origen;
                    $egresado->imagen_url = $imagen_subida;
                    $egresado->habilitado = $request->habilitado;
                    //$egresado->save();

                    if($preparacion->save()){//Si se guardo correctamente se obtiene el id del registro
                        $prep = preparacion::all();
                        $preparacionID = $prep->last();//obtenemos el ultimo registro de la BD

                        //se guarda el registro de egresado a la BD
                        $egresado->preparacion_id = $preparacionID->id;
                        if(!$egresado->save())
                           return redirect('admin/empresas');//Redirigir a una pagina de errores
                    }
                    else{
                        echo "Ocurrio un error al guardar el registro de preparacion";
                        return redirect('admin/empresas');//Redirigir a una pagina de errores
                    }
                }
                else{
                    echo "error al copiar el archivo";
                }
            }
            else{
                echo "El archivo no se subio a carpeta temporal del servidor";
            }
        }
        return redirect('admin/egresado');//Redireccionamos al index de egresado url(/admin/egresado)
        
    }

}
