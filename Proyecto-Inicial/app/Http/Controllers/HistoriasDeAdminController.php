<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\HistoriaExito;
use Auth;
use Session;

class HistoriasDeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //Metodo para mostrar en el 
    public function indexH(Request $request)
    {
        $historias = HistoriaExito::titulo($request->get('q'))
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('admin.historiasDe.index', compact('historias'));
    }

    public function showCrearHistoria(Request $request){

        return view('admin.historiasDe.crearHistoriaDe');//accedemos al archivo
    }

    public function saveHistoria(Request $request)
    {
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
                        }catch(Exception $e)
                        {
                            DB::rollback();
                            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();

                            Session::flash('message_danger', 'La historia no se pudo crear.');//Para mostrar mensaje partials/messages.blade.php
                            
                            return redirect('admin/historiasdeExito');//Redireccionamos al index de eventos
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
        Session::flash('message_success', 'Historia creada correctamente.');//Para mostrar mensaje partials/messages.blade.php
        return redirect('admin/historiasdeExito');//Redireccionamos al index de eventos
    }

    public function showEditarHistoria($id)
    {
    	$historia = DB::table('HistoriaExito')->where('id',"$id")->first();

    	return view('admin.historiasDe.editarHistoriaDe',compact("historia"));//Direccion de la vista, pasamos el objeto
    }

    public function saveEditarHistoria( Request $request )
    {
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
                    }catch(Exception $e)
                    {
                        DB::rollback();
                        echo 'ERROR (' . $e->getCode() .'): ' . $e->getMessage();

                        Session::flash('message_danger', 'La historia no se pudo actualizar.');
                        return redirect('admin/historiasdeExito');//redireccionamos a la url del 
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
            try
            {
                $historia->titulo = $request->titulo;
                $historia->descripcion = $request->descripcion;
                $historia->save();
            }catch(Exception $e)
            {
                DB::rollback();
                echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                
                Session::flash('message_danger', 'La historia no se pudo actualizar.');
                return redirect('admin/historiasdeExito');//redireccionamos a la url del 
            }
            DB::commit();
        }
        Session::flash('message_success', 'La historia se ha actualizado correctamente.');
        return redirect('admin/historiasdeExito');//redireccionamos a la url del index
    }

    public function EliminarHistoria(Request $request)
    {
        $historia = HistoriaExito::find($request->id);//Recuperamos elemento a eliminar
        //Se hace uso de las transacciones
        DB::beginTransaction();
        try{
            $historia->delete();//Elimina el elemento de la BD
            //HistoriaExito::destroy($request->id);
        }catch(Exception $e)
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            Session::flash('message_danger', 'La historia no se pudo eliminar');
            
            return redirect('admin/historiasdeExito');//redireccionamos a la url del index
        }
        DB::commit();
        unlink($historia->imagen_url);//Elimina la imagen

        Session::flash('message_success', 'Historia eliminada correctamente');
        return redirect('admin/historiasdeExito');//redireccionamos a la url del index
    }
}
