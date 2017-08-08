<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Empresa;
use App\Contacto;

class EmpresasAdminController extends Controller
{
    public function index(Request $request) {

        $empresas = empresa::nombre($request->get('q'))->orderBy('nombre', 'DESC')->paginate(8);

        return view('admin.empresa.index', compact('empresas'));//Direccio'n de la ubicacio'n del archivo crearEmpresa
    }

    public function showCrearEmpresa(Request $request) {

    	return view('admin.empresa.crearEmpresa');//Direccio'n de la ubicacio'n del archivo crearEmpresa
    }

    public function saveCrearEmresa(Request $request){

        $direccion = explode(",", $request->direccion_emp);
        //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/empresas/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        if(!is_writable($dir_destino)){//comprobamos permisos de escritura
            echo "no tiene permisos de escritura";
        }
        else{
            if(is_uploaded_file($archivo)){ //verifica que el archivo se haya subido en la carpeta temporal
                if($request != null){
                    //Guarda datos en la BD datos del contacto
                    $contacto = new Contacto();
                    $contacto->nombre = $request->nombre_cont;
                    $contacto->puesto = $request->puesto_cont;
                    $contacto->telefono = $request->numeroTel_cont;
                    $contacto->correo = $request->email_cont;
                    
                    if($contacto->save()){
                        $cont = Contacto::all();
                        $contID = $cont->last();//obtenemos el ultimo registro de la BD

                        //Datos de la empresa a la BD
                        $empresa = new Empresa();
                        $empresa->nombre = $request->nombre_emp;
                        $empresa->descripcion = $request->descripcion;
                        $empresa->rfc = $request->rfc_emp;
                        $empresa->telefono = $request->telefono_emp;
                        $empresa->correo = $request->correo_emp;
                        $empresa->calle = $direccion[0];
                        $empresa->numero = $direccion[1];
                        $empresa->colonia = $request->colonia;
                        $empresa->ciudad = $request->ciudad;
                        $empresa->estado = $request->estado;
                        $empresa->codigo_postal = $request->codigo_p;
                        $empresa->pagina_web = $request->pagina_w;
                        $empresa->imagen_url = $imagen_subida;
                        $empresa->habilitada = $request->habilitado;
                        $empresa->motivo_no_contratacion = $request->noContratacion;
                        $empresa->recomendaciones = $request->recomendacion;
                        $empresa->contacto_id = $contID->id;

                        if(!$empresa->save())
                            return redirect('admin/egresado');//Redirigir a una pagina de errores
                    }
                    else{
                        echo "Ocurrio un error al guardar el contacto en la BD";
                        return redirect('admin/egresado');//Redirigir a una pagina de errores
                    }

                    copy($archivo, $imagen_subida);//copia el archivo a la ruta indicada
                }
                else{
                    echo "error al copiar el archivo";
                }
            }
            else{
                echo "El archivo no se subio a carpeta temporal del servidor";
            }
        }

        return redirect('admin/empresas');//Redireccionamos al index de egresado url(/admin/egresado)
    }

    public function showEditarEmpresa(Request $request,$id){

        $empresa = DB::table('empresa')->where('id',"$id")->first();
        $contacto = DB::table('contacto')->where('id',"$empresa->contacto_id")->first();;
    	return view('admin.empresa.editarEmpresa',compact('empresa'),compact('contacto'));//Direccio'n de la ubicacio'n del archivo crearEmpresa
    }

    public function saveEditarEmpresa(Request $request){
        echo "Holis";
    }
}
