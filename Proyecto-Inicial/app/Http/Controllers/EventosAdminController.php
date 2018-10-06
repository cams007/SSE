<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Evento;
use Session;
use Auth;

class EventosAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(Request $request)
    {
        if( $request->q =="" ) $string = "empty"; else $string = $request->q;

        $eventos = Evento::todo( $request->get( 'q' ) )
            ->where('activo','=',1)
            ->orderBy('fecha', 'DESC')
            ->paginate(10);

        return view('admin.eventos.index', compact('eventos'), [ 'valor' => $string ] );
    }

    public function showCrearEvento(Request $request) {

        return view('admin.eventos.crearEvento');
    }

    //Metodo para mostrar evento para editar
    public function showEditarEvento($id)
    {
        //Se envia $evento como parametro a la vista
        $evento = DB::table('Evento')
            ->where('id',"$id")
            ->first();

        return view('admin.eventos.editarEvento',compact('evento'));//direccion de la vista editarEventos
    }

    //Guarda datos de la vista de crear eventos en la BD
    public function saveEvento(Request $request)
    {
        //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/eventos/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        if(!is_writable( $dir_destino ) )
        {
            //comprobamos permisos de escritura
            echo "no tiene permisos";
        }
        else
        {
            if(is_uploaded_file($archivo)){ //verifica que el archivo se haya subido en carpeta temporal
                if($_FILES['imagen']['size'] <= 300000){//verifica el tama;o de la imagen
                    if(($_FILES["imagen"]["type"]=="image/gif")
                        ||($_FILES["imagen"]["type"]=="image/jpeg")
                        ||($_FILES["imagen"]["type"] == "image/jpg")
                        ||($_FILES["imagen"]["type"] == "image/png")){

                        DB::beginTransaction();
                        try{
                            //Guarda datos en la BD
                            $evento = new Evento();
                            $evento->nombre = $request->nombre;
                            $evento->descripcion = $request->descripcion;
                            $evento->lugar = $request->lugar;
                            $evento->fecha = $request->fecha;
                            $evento->categoria = $request->categoria;
                            $evento->imagen_url = $imagen_subida;
                            $evento->activo = $request->activo;
                            $evento->save();    
                        }catch(Exception $e){
                            DB::rollback();
                            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();

                            Session::flash('message_danger', 'Hubo un error al momento de guardar el evento.');//Para mostrar mensaje partials/messages.blade.php
        
                            return redirect('admin/eventos');//Redireccionamos al index de eventos
                        }
                        DB::commit();
                        copy($archivo,$imagen_subida);//Copamos el archivo a la ruta indicada
                    }
                    else{
                        //Si no cumple con el formato establecido
                        echo "El formato de la imagen no es valido";
                    }
                }
                else{
                    echo "El tama;o de la imagen es superior al establecido";
                }
            }
            else{
                echo "El archivo no se subio a carpeta temporal del servidor";
            }
        }
        Session::flash('message_success', 'Evento creado correctamente.');//Para mostrar mensaje partials/messages.blade.php
        return redirect('admin/eventos');//Redireccionamos al index de eventos
    }

    public function saveEditarEvento(Request $request){
        //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/eventos/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        //Obtenemos de la BD los dados del evento($id) a modificar
        $evento = Evento::findOrFail($request->id);
        $imagen_ban = 0;

        $valido = file_exists($evento->imagen_url);//Si existe la imagen TRUE
        
        //Se comprueba que el parametro se envio en el formulario(definido y no es null)
        if(isset($request->imagen)){
            $img_actual = $evento->imagen_url;
            $imagen_ban = 1;
        }

        if($imagen_ban == 1){
            if($_FILES['imagen']['size'] <= 300000){
                if(($_FILES["imagen"]["type"] == "image/gif")
                    || ($_FILES["imagen"]["type"] == "image/jpeg")
                    || ($_FILES["imagen"]["type"] == "image/jpg")
                    || ($_FILES["imagen"]["type"] == "image/png")){//Formatos validos de imagen

                    DB::beginTransaction();
                    try{
                        $evento->nombre = $request->nombre;
                        $evento->descripcion = $request->descripcion;
                        $evento->lugar = $request->lugar;
                        $evento->fecha = $request->fecha;
                        $evento->categoria = $request->categoria;
                        $evento->imagen_url = $imagen_subida;
                        $evento->save();
                    }catch(Exception $e){
                        DB::rollback();
                        echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                        Session::flash('message_danger', 'Hubo un error al momento de actualizar el evento.');
        
                        return redirect('admin/eventos');//Redireccionamos al index de eventos
                    }
                    DB::commit();
                    if($valido)//Si existe la imagen la reemplazamos, Si no solo subimos la img nueva
                        unlink($img_actual);//Elimina la imagen actual
                    copy($archivo, $imagen_subida);//Copiamos la nueva imagen
                }
                else{
                    //Si no cumple con el formato
                    echo "No se puede subir imagen con tal formato";
                }
            }
            else{
                //Si el tama;o de la imagen es superior a 300000
                echo "La imagen es demasiado grande";
            }
        }
        else{//La imagen no se modifico
            DB::beginTransaction();
            try{
                $evento->nombre = $request->nombre;
                $evento->descripcion = $request->descripcion;
                $evento->lugar = $request->lugar;
                $evento->fecha = $request->fecha;
                $evento->categoria = $request->categoria;
                $evento->save();
            }catch(Exception $e)
            {
                DB::rollback();
                echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                Session::flash('message_danger', 'Hubo un error al momento de actualizar el evento.');
        
                return redirect('admin/eventos');//Redireccionamos al index de eventos
            }
            DB::commit();
        }
        Session::flash('message_success', 'Evento actualizado correctamente.');
        
        return redirect('admin/eventos');//Redireccionamos al index de eventos
    }

    public function eliminarEvento(Request $request)
    {
        //Obtenemos de la BD los datos del evento a eliminar.
        $evento = Evento::findOrFail($request->id);
        DB::beginTransaction();
        try{
            $evento->activo = 0;
            $evento->save();  //Se cambia de estado el evento.
        }catch(Exception $e)
        {
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            
            Session::flash('message_danger', 'Hubo un error al momento de eliminar el evento.');
            
            return redirect('admin/eventos');//Redireccionamos al index de eventos
        }
        DB::commit();
        unlink($evento->imagen_url);//Eliminamos la imagen

        Session::flash('message_success', 'El evento se ha eliminado correctamente.');

        return redirect('admin/eventos');//Redireccionamos al index de eventos
    }

}
