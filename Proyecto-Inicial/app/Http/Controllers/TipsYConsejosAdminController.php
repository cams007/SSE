<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tip;
use Auth;

use Session;

class TipsYConsejosAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
    	$tips = Tip::titulo($request->get('q'))
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('admin.tipYconsejo.index', compact('tips'));
    }

    public function showCreateTip(Request $request)
    {
    	return view('admin.tipYconsejo.crearTip');//accedemos al archivo
    }

    public function saveCrearTip(Request $request)
    {
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
                if($request != null && ($_FILES['imagen']['size'] <= 200000)){
                    //Verificamos los formatos que se pueden subir
                    if(($_FILES["imagen"]["type"]=="image/gif")
                        ||($_FILES["imagen"]["type"]=="image/jpeg")
                        ||($_FILES["imagen"]["type"] == "image/jpg")
                        ||($_FILES["imagen"]["type"] == "image/png")){

                        DB::beginTransaction();
                        try{
                            //Guarda datos en la BD
                            $tip = new Tip();
                            $tip->titulo = $request->titulo;
                            $tip->descripcion = $request->descripcion;
                            $tip->imagen_url = $imagen_subida;
                            $tip->activo = $request->activo;
                            $tip->save();
                        
                        }catch(Exception $e)
                        {
                            //Ha ocurrido un error al guardar en la BD
                            DB::rollback();
                            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                            Session::flash('message_danger', 'No se pudo guardar el Tip.');//Para mostrar mensaje partials/messages.blade.php
                            return redirect('admin/tipConsejo');//Redireccionamos a la url del index
                        }
                        DB::commit();
                        copy($archivo, $imagen_subida);//copia el archivo a la ruta indicada
                    }
                    else{
                        //Si no cumple el formato de imagen
                        echo "No se puede subir una imagen con ese formato ";
                    }
                }
                else{
                    echo "error al copiar el archivo o el tamanio no es el correcto";
                }
            }
            else{
                echo "El archivo no se subio a carpeta temporal del servidor";
            }
        }
        Session::flash('message_success', 'Tip creado correctamente.');//Para mostrar mensaje partials/messages.blade.php
        return redirect('admin/tipConsejo');//Redireccionamos a la url del index
    }

    public function showEditarTip($id)
    {
    	$tip = DB::table('Tip')->where('id',"$id")->first();

    	return view('admin.tipYconsejo.editarTip',compact("tip"));//accedemos a la direccion de la vista, pasamos el objeto
    }

    public function saveEditarTip(Request $request)
    {
        //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/tips/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        //Obtenemos de la BD los dados del tip($id) a modificar
        $tip = Tip::find($request->id);
        $imagen_ban = 0;

        $valido = file_exists($tip->imagen_url);//Si existe la imagen TRUE 

         //Se comprueba que el parametro se envio en el formulario(definido y no es null)
        if(isset($request->imagen)){
            $img_actual = $tip->imagen_url;
            $imagen_ban = 1;
        }

        if($imagen_ban == 1){//Nueva imagen al editar
            if($_FILES['imagen']['size'] <=200000){
                if(($_FILES["imagen"]["type"] == "image/gif")
                    || ($_FILES["imagen"]["type"] == "image/jpeg")
                    || ($_FILES["imagen"]["type"] == "image/jpg")
                    || ($_FILES["imagen"]["type"] == "image/png")){//Formatos validos
                    DB::beginTransaction();
                    try{
                        $tip->titulo = $request->titulo;
                        $tip->descripcion = $request->descripcion;
                        $tip->imagen_url = $imagen_subida;
                        $tip->save();
                    }catch(Exception $e){
                        DB::rollback();
                        echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                        Session::flash('message_danger', 'No se pudo guardar el Tip.');
                        return redirect('admin/tipConsejo');//redireccionamos a la url del index
                    }
                    DB::commit();
                    if($valido)//Si existe la imagen la reemplaza, si no sube la img nueva
                        unlink($img_actual);//Elimina la imagen actual en la BD
                    copy($archivo, $imagen_subida);//Copiamos la nueva imagen
                }
                else{
                    //Si no cumple con el formato
                    echo "No se puede subir una imagen conese formato";
                }
            }
            else{
                //Si el tama;o no se modifica
                echo "La imagen es demasiado grande";
            } 
        }
        else{//la imagen no se modifico
            DB::beginTransaction();
            try{
                    $tip->titulo = $request->titulo;
                    $tip->descripcion = $request->descripcion;
                    $tip->save();
                }catch(Exception $e){
                    DB::rollback();
                    echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                    
                    Session::flash('message_danger', 'No se pudo guardar el Tip.');
                    return redirect('admin/tipConsejo');//redireccionamos a la url del index
                }
                DB::commit();
        }
        Session::flash('message_success', 'Tip actualizado correctamten.');
        return redirect('admin/tipConsejo');//redireccionamos a la url del index
    }

    public function showEliminarTip(Request $request){

        $tip = DB::table('Tip')->where('id',"$request->id")->first();//Obtenemos el elemento a eliminar

        //se hace uso de transacciones por si en algún momento falla algo
        DB::beginTransaction();
        try{
            Tip::destroy($request->id);
        }catch(Exception $e)
        {
            DB::rollback();
            echo 'ERROR(' .$e->getCode() .'): ' .$e->getMessage();
            Session::flash('message_danger', 'El Tip no se eliminó.');
            return redirect('admin/tipConsejo');//redireccionamos a la url del index
        }
        DB::commit();
        unlink($tip->imagen_url);//Elimina la imagen

        Session::flash('message_success', 'Tip eliminado correctamente.');

        return redirect('admin/tipConsejo');//redireccionamos a la url del index
    }

}
