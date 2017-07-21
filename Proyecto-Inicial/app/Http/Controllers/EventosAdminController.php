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

        $evento = DB::table('Evento')->where('id',"$id")->first();
        return view('admin.eventos.editarEvento',compact('evento'));//direccion de la vista editarEventos
    }

    //Guarda datos de la vista de crear eventos en la BD
    public function saveEvento(Request $request) {
        //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/eventos/';
        $imagen_subida = $dir_destino. basename($_FILES['imagen']['name']);//mt_rand(0,500)

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
        return redirect('admin/eventos');
    }
}
