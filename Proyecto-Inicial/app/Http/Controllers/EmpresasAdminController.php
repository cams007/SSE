<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Empresa;
use App\Evento;
use App\Contacto;
use Session;

class EmpresasAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        if( $request->q =="" ) $string = "empty"; else $string = $request->q;
        
        $empresas = Empresa::todo($request->get('q'))
            ->where('habilitada','=',1)
            ->orderBy('nombre', 'DESC')
            ->paginate(10);

        return view('admin.empresa.index', compact('empresas'), [ 'valor' => $string ] );//Direccio'n de la ubicacio'n del archivo crearEmpresa
    }

    public function showCrearEmpresa(Request $request)
    {
        //Direccio'n de la ubicacio'n del archivo crearEmpresa
    	return view('admin.empresa.crearEmpresa');
    }

    public function showEditarEmpresa(Request $request,$id)
    {
        $empresa = DB::table('Empresa')
            ->where('id',"$id")
            ->first();
    
        $contacto = DB::table('Contacto')
            ->where('id',"$empresa->contacto_id")
            ->first();

    	return view('admin.empresa.editarEmpresa',compact('empresa'),compact('contacto'));//Direccio'n de la ubicacio'n del archivo crearEmpresa
    }

    public function saveCrearEmresa( Request $request )
    {
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
                if($_FILES['imagen']['size'] <= 300000){
                    if(($_FILES["imagen"]["type"]=="image/gif")
                        ||($_FILES["imagen"]["type"]=="image/jpeg")
                        ||($_FILES["imagen"]["type"] == "image/jpg")
                        ||($_FILES["imagen"]["type"] == "image/png")){

                        DB::beginTransaction();
                        try{
                            //Guarda datos en la BD datos del contacto
                            $contacto = new Contacto();
                            $contacto->nombre = $request->nombre_cont;
                            $contacto->puesto = $request->puesto_cont;
                            $contacto->telefono = $request->numeroTel_cont;
                            $contacto->correo = $request->email_cont;
                            $contacto->save();
                            
                            $cont = Contacto::all();
                            $contID = $cont->last();//obtenemos el ultimo registro de la BD

                            //Datos de la empresa a la BD
                            $empresa = new Empresa();
                            $empresa->nombre = $request->nombre_emp;
                            $empresa->descripcion = $request->descripcion;
                            $empresa->rfc = $request->rfc_emp;
                            $empresa->giro = $request->giro;
                            $empresa->sector = $request->sector;
                            $empresa->telefono = $request->telefono_emp;
                            $empresa->correo = $request->correo_emp;
                            $empresa->calle = $request->calle;
                            $empresa->numero = $request->numero;
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
                            $empresa->save();

                        }catch(Exception $e){
                            DB::rollback();
                            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                            Session::flash('message_danger', 'Hubo un error al momento de guardar la información.');//Para mostrar mensaje partials/messages.blade.php
        
                            return redirect('admin/empresas');//Redireccionamos al index de egresado url(/admin/egresado)
                        }
                        DB::commit();
                        copy($archivo, $imagen_subida);//copia el archivo a la ruta indicada
                    }
                    else{
                        //Si no cumple con el formato de la imagen
                        echo "No se puede subir imagen con este formato";
                    }
                }   
                else{
                    //El tama;o de la imagen es muy grande
                    echo "No se puede guarda una imagen mayo a 300000";
                }
            }
            else{
                echo "El archivo no se subio a carpeta temporal del servidor";
            }
        }
        Session::flash('message_success', 'La empresa se ha creado correctamente');//Para mostrar mensaje partials/messages.blade.php
        
        return redirect('admin/empresas');//Redireccionamos al index de egresado url(/admin/egresado)
    }

    public function saveEditarEmpresa( Request $request )
    {
        //Datos de la imagen que se va a guardar
        $archivo = $_FILES['imagen']['tmp_name'];

        //Ruta donde se guardaran las imagenes
        $dir_destino = 'assets/images/empresas/';
        $imagen_subida = $dir_destino.mt_rand(0,10000). basename($_FILES['imagen']['name']);//mt_rand(0,500)

        if(!is_writable( $dir_destino ) )
        {
            //comprobamos permisos de escritura
            echo "no tiene permisos de escritura";
        }
        else{
            //obtenemos datos de la empresa a editar y el contacto
            $empresaEdit = Empresa::findOrFail($request->id);
            $contactoEdit = Contacto::findOrFail($request->contacto_id);
            $imagen_ban = 0;

            $valido = file_exists($empresaEdit->imagen_url);//Si existe la imagen TRUE

            if(isset($request->imagen)){
                $img_actual = $empresaEdit->imagen_url;//img en carpeta dle servidor
                $imagen_ban = 1;
            }

            if($imagen_ban == 1)
            {
                if($_FILES['imagen']['size'] <= 300000)
                {
                    if(($_FILES["imagen"]["type"] == "image/gif")
                        || ($_FILES["imagen"]["type"] == "image/jpeg")
                        || ($_FILES["imagen"]["type"] == "image/jpg")
                        || ($_FILES["imagen"]["type"] == "image/png"))
                    {
                        DB::beginTransaction();
                        try{
                            //Guarda datos en la BD datos del contacto
                            $contactoEdit->nombre = $request->nombre_cont;
                            $contactoEdit->puesto = $request->puesto_cont;
                            $contactoEdit->telefono = $request->numeroTel_cont;
                            $contactoEdit->correo = $request->email_cont;
                            $contactoEdit->save();
                            //Datos de la empresa a la BD
                            $empresaEdit->nombre = $request->nombre_emp;
                            $empresaEdit->descripcion = $request->descripcion;
                            $empresaEdit->rfc = $request->rfc_emp;
                            $empresaEdit->giro = $request->giro;
                            $empresaEdit->sector = $request->sector;
                            $empresaEdit->telefono = $request->telefono_emp;
                            $empresaEdit->correo = $request->correo_emp;
                            $empresaEdit->calle = $request->calle;
                            $empresaEdit->numero = $request->numero;
                            $empresaEdit->colonia = $request->colonia;
                            $empresaEdit->ciudad = $request->ciudad;
                            $empresaEdit->estado = $request->estado;
                            $empresaEdit->codigo_postal = $request->codigo_p;
                            $empresaEdit->pagina_web = $request->pagina_w;
                            $empresaEdit->imagen_url = $imagen_subida;//actializa nueva imagen
                            $empresaEdit->motivo_no_contratacion = $request->noContratacion;
                            $empresaEdit->recomendaciones = $request->recomendacion;
                            $empresaEdit->save();
                        }catch(Exception $e)
                        {
                            DB::rollback();
                            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                            Session::flash('message_danger', 'Hubo un error al momento de actulizar la empresa.' );

                            return redirect('admin/empresas');//Redireccionamos al index de egresado url(/admin/egresado)
                        }
                        DB::commit();
                        if($valido)//Si existe la imagen la elimina, Si no solo subimos la img nueva
                            unlink($img_actual);//Elimina la imagen actual
                        copy($archivo, $imagen_subida);//Copiamos la nueva imagen
                    }
                    else{
                        //Si no cumple con el formato correcto
                        echo "El formato de imagen no es valido";
                    }
                }
                else{
                    //Si la imagen excede el tama;o establecido
                    echo "La imagen es demasiado grande";
                }
            }
            else{//No se modifico la imagen
                DB::beginTransaction();
                try{
                    //Guarda datos en la BD datos del contacto
                    $contactoEdit->nombre = $request->nombre_cont;
                    $contactoEdit->puesto = $request->puesto_cont;
                    $contactoEdit->telefono = $request->numeroTel_cont;
                    $contactoEdit->correo = $request->email_cont;
                    $contactoEdit->save();
                    //Datos de la empresa a la BD
                    $empresaEdit->nombre = $request->nombre_emp;
                    $empresaEdit->descripcion = $request->descripcion;
                    $empresaEdit->rfc = $request->rfc_emp;
                    $empresaEdit->giro = $request->giro;
                    $empresaEdit->sector = $request->sector;
                    $empresaEdit->telefono = $request->telefono_emp;
                    $empresaEdit->correo = $request->correo_emp;
                    $empresaEdit->calle = $request->calle;
                    $empresaEdit->numero = $request->numero;
                    $empresaEdit->colonia = $request->colonia;
                    $empresaEdit->ciudad = $request->ciudad;
                    $empresaEdit->estado = $request->estado;
                    $empresaEdit->codigo_postal = $request->codigo_p;
                    $empresaEdit->pagina_web = $request->pagina_w;
                    $empresaEdit->motivo_no_contratacion = $request->noContratacion;
                    $empresaEdit->recomendaciones = $request->recomendacion;
                    $empresaEdit->save();
                }catch(Exception $e)
                {
                    DB::rollback();
                    echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
                    Session::flash('message_danger', 'Hubo un error al momento de actulizar la empresa.' );

                    return redirect('admin/empresas');//Redireccionamos al index de egresado url(/admin/egresado)
                }
                DB::commit();
            }
        }
        Session::flash('message_success', 'La empresa se ha actualizado correctamente.' );
        //Redireccionamos al index de egresado url(/admin/egresado)
        return redirect('admin/empresas');
    }

    public function eliminarEmpresa(Request $request)
    {
        //Obtiene la por medio del id la empresa a eliminar
        $empresa = Empresa::find($request->id);
        $contacto = Contacto::find($empresa->contacto_id);

        DB::beginTransaction();
        try{
            $empresa->habilitada=0;
            $empresa->save();
        }catch(Exception $e){
            DB::rollback();
            echo 'ERROR (' .$e->getCode() .'): ' .$e->getMessage();
            Session::flash('message_danger', 'Hubo un error al momento de eliminar la información.' );
        
            return redirect('admin/empresas');//Redireccionamos al index de egresado url(/admin/egresado)
        }
        DB::commit();
        unlink($empresa->imagen_url);//Elimina la imagen

        Session::flash('message_success', 'La empresa se ha eliminado correctamente.' );
        
        return redirect('admin/empresas');//Redireccionamos al index de egresado url(/admin/egresado)
    }
}
