<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tip;
use Auth;

class TipsYConsejosAdminController extends Controller
{
    public function index(Request $request){

    	$tips = Tip::titulo($request->get('q'))->orderBy('created_at', 'DESC')->paginate(10);

        return view('Admin.tipYconsejo.index', compact('tips'));
    }

    public function showCreateTip(Request $request){

    	return view('Admin.tipYconsejo.crearTip');//accedemos al archivo
    }

    public function saveCrearTip(Request $request){

    	//Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/tips/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        if(!is_writable($dir_destino)){//comprobamos permisos de escritura
            echo "no tiene permisos de escritura";
        }
        else{
            if(is_uploaded_file($archivo)){ //verifica que el archivo se haya subido en la carpeta temporal
                if($request != null){
                    //Guarda datos en la BD
                    $tip = new Tip();
                    $tip->titulo = $request->titulo;
                    $tip->descripcion = $request->descripcion;
                    $tip->imagen_url = $imagen_subida;
                    $tip->activo = 1;
                    $tip->save();

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
        return redirect('admin/tipConsejo');//Redireccionamos a la url del index
    }

    public function showEditarTip($id){

    	$tip = DB::table('Tip')->where('id',"$id")->first();
    	return view('Admin.tipYconsejo.editarTip',compact("tip"));//accedemos a la direccion de la vista, pasamos el objeto
    }

    public function saveEditarTip(Request $request){

        //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/tips/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        //Obtenemos de la BD los dados de la historia($id) a modificar
        $tip = Tip::find($request->id);
        $imagen_ban = 0; 

         //Se comprueba que el parametro se envio en el formulario(definido y no es null)
        if(isset($request->imagen)){
            unlink($tip->imagen_url);//Elimina la imagen actual en la BD
            copy($archivo, $imagen_subida);//Copiamos la nueva imagen
            $imagen_ban = 1;
        }

        $tip->titulo = $request->titulo;
        $tip->descripcion = $request->descripcion;
        if($imagen_ban == 1)//Se verifica si hubo cambios en la imagen.Si si se envia la nueva url de la imagen
            $tip->imagen_url = $imagen_subida;
        $tip->save();

        return redirect('admin/tipConsejo');//redireccionamos a la url del index
    }
}
