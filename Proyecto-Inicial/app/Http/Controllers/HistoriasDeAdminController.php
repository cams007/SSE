<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoriaExito;

class HistoriasDeAdminController extends Controller
{
       //Metodo para mostrar en el 
    public function indexH(Request $request){
        
        $historias = HistoriaExito::titulo($request->get('q'))->orderBy('created_at', 'DESC')->paginate(10);

        return view('Admin.historiasDe.index', compact('historias'));
    }

    public function showCrearHistoria(Request $request){

        return view('Admin.historiasDe.crearHistoriaDe');//accedemos al archivo
    }

    public function saveHistoria(Request $request){

        //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/historias_exito/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        if(!is_writable($dir_destino)){//comprobamos permisos de escritura
            echo "no tiene permisos";
        }
        else{
            if(is_uploaded_file($archivo)){ //verifica que el archivo se haya subido en la carpeta temporal
                if($request != null){
                    //Guarda datos en la BD
                    $historia = new HistoriaExito();
                    $historia->titulo = $request->titulo;
                    $historia->descripcion = $request->descripcion;
                    $historia->imagen_url = $imagen_subida;
                    $historia->activo = 1;
                    $historia->save();

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
        return redirect('admin/historiasdeExito');//Redireccionamos al index de eventos
    }
}
