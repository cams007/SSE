<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Evento;
use Auth;

class EventosAdminController extends Controller
{
    public function index(Request $request) {

        $eventos = Evento::titulo($request->get('q'))->orderBy('fecha', 'DESC')->paginate(8);

        return view('admin.eventos.index', compact('eventos'));
    }

    public function showCrearEvento(Request $request) {

        return view('admin.eventos.crearEvento');
    }

    //Metodo para mostrar evento para editar
    public function showEditarEvento($id) {
        //Se envia $evento como parametro a la vista
        $evento = DB::table('Evento')->where('id',"$id")->first();
        return view('admin.eventos.editarEvento',compact('evento'));//direccion de la vista editarEventos
    }

    //Guarda datos de la vista de crear eventos en la BD
    public function saveEvento(Request $request) {
        //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/eventos/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        if(!is_writable($dir_destino)){//comprobamos permisos de escritura
            echo "no tiene permisos";
        }
        else{
            if(is_uploaded_file($archivo)){ //verifica que el archivo se haya subido
                if(copy($archivo, $imagen_subida)){//copia el archivo a la ruta indicada
                    //Guarda datos en la BD
                    $evento = new Evento();
                    $evento->nombre = $request->nombre;
                    $evento->descripcion = $request->descripcion;
                    $evento->lugar = $request->lugar;
                    $evento->fecha = $request->fecha;
                    $evento->categoria = $request->categoria;
                    $evento->imagen_url = $imagen_subida;
                    $evento->activo = 1;
                    $evento->save();
                }
                else{
                    echo "error al copiar el archivo";
                }
            }
            else{
                echo "El archivo no se subio a carpeta temporal del servidor";
            }
        }
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

        //Se comprueba que el parametro se envio en el formulario(definido y no es null)
        if(isset($request->imagen)){
            unlink($evento->imagen_url);//Elimina la imagen actual
            copy($archivo, $imagen_subida);//Copiamos la nueva imagen
            $imagen_ban = 1;
        }

        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->lugar = $request->lugar;
        $evento->fecha = $request->fecha;
        $evento->categoria = $request->categoria;
        if($imagen_ban == 1)//Enviamos la nueva url de la imagen de lo contrario no enviamos nada
            $evento->imagen_url = $imagen_subida;
        //$evento->activo = 1;
        $evento->save();

        return redirect('admin/eventos');//Redireccionamos al index de eventos

    }

    public function eliminarEvento(Request $request){
        //Obtenemos de la BD los datos del evento a eliminar.
        $evento = Evento::findOrFail($request->id);
        try{
            unlink($evento->imagen_url);//Eliminamos la imagen
            $evento->delete();  //Elimina el elemnto de la BD
            return redirect('admin/eventos');
        }catch(Exception $e){
            return "Fatal errror" .$e->getMessage();
        }
    }

}
