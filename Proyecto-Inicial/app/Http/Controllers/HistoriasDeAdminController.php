<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\HistoriaExito;
use Auth;

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
                if($request != null && ($_FILES['imagen']['size'] <= 300000)){
                    if(($_FILES["imagen"]["type"]=="image/gif")
                        ||($_FILES["imagen"]["type"]=="image/jpeg")
                        ||($_FILES["imagen"]["type"] == "image/jpg")
                        ||($_FILES["imagen"]["type"] == "image/png")){//Formatos validos de imagen

                        DB::beginTransaction();
                        try{
                            //Guarda datos en la BD
                            $historia = new HistoriaExito();
                            $historia->titulo = $request->titulo;
                            $historia->descripcion = $request->descripcion;
                            $historia->imagen_url = $imagen_subida;
                            $historia->activo = $request->activo;
                            $historia->save();
                        }catch(Exception $e){
                            DB::rollback();
                            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                        }
                        DB::commit();
                        copy($archivo, $imagen_subida);//copia el archivo a la ruta indicada
                    }
                    else{
                        //Si no cumple con el formato establecido como valido
                        echo "No se puede subir una imagen con ese formato ";
                    }
                }
                else{
                    //El tama;o de la imagen es mayor al establecido
                    echo "El tama;o del archivo es mayor al establecido";
                }   
            }
            else{
                echo "El archivo no se subio a carpeta temporal del servidor";
            }
        }
        return redirect('admin/historiasdeExito');//Redireccionamos al index de eventos
    }

    public function showEditarHistoria($id){
    	
    	$historia = DB::table('HistoriaExito')->where('id',"$id")->first();
    	return view('Admin.historiasDe.editarHistoriaDe',compact("historia"));//Direccion de la vista, pasamos el objeto

    }

    public function saveEditarHistoria(Request $request){

    	//Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/historias_exito/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        //Obtenemos de la BD los dados de la historia($id) a modificar
        $historia = HistoriaExito::find($request->id);
        $imagen_ban = 0;

        $valido = file_exists($historia->imagen_url);//Si existe la imagen TRUE

        //Se comprueba que el parametro se envio en el formulario(definido y no es null)
        if(isset($request->imagen)){
            $img_actual = $historia->imagen_url;
            $imagen_ban = 1;
        }

        if($imagen_ban == 1){
            if($_FILES['imagen']['size'] <= 300000){
                if(($_FILES["imagen"]["type"] == "image/gif")
                    || ($_FILES["imagen"]["type"] == "image/jpeg")
                    || ($_FILES["imagen"]["type"] == "image/jpg")
                    || ($_FILES["imagen"]["type"] == "image/png")){

                    DB::beginTransaction();//Iniciamos transacción
                    try{
                        $historia->titulo = $request->titulo;
                        $historia->descripcion = $request->descripcion;
                        $historia->imagen_url = $imagen_subida;
                        $historia->save();
                    }catch(Exception $e){
                        DB::rollback();
                        echo 'ERROR (' . $e->getCode() .'): ' . $e->getMessage();
                    }
                    DB::commit();
                    if($valido)//Si existe la imagen la reemplaza, Si no sube la img nueva
                        unlink($img_actual);//Elimina la imagen actual
                    copy($archivo, $imagen_subida);//Copiamos la nueva imagen
                }
                else{
                    //Si no cumplio con el formato establecido
                    echo "No se puede subir una imagen con tal formato";
                }
            }
            else{
                //El tama;o de la imagen excede el tama;o permitido
                echo "La imagen es demasiado grande";
            }
        }
        else{//No se modifico la imagen
            DB::beginTransaction();
            try{
                $historia->titulo = $request->titulo;
                $historia->descripcion = $request->descripcion;
                $historia->save();
            }catch(Exception $e){
                DB::rollback();
                echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            }
            DB::commit();
        }

        return redirect('admin/historiasdeExito');//redireccionamos a la url del index

    }
}
