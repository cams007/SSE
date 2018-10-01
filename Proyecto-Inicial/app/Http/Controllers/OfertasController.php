<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use Mail;
use App\User;
use Session;
use Auth;
use Storage;
use App\Postulacion;

class OfertasController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( Request $request)
    {
        $ofertas = Oferta::todo( $request->get( 'q' ) )
            ->orderBy( 'created_at', 'DESC' )
            ->where( 'status', '=', 'Vacante' )
            ->paginate(9);

        return view('egresados.ofertas.ofertas', compact( 'ofertas') );
    }

    protected function savePost( Request $request )
    {
        $path = Auth::user()->egresado->cv_url;
        $pathToFile = storage_path( 'app'.'/'.$path );
        // For testing change $request->correo for one owns to view the result
        $destinatario = $request->correo;
        $asunto = $request->oferta;
        // Get information of the user
        $nombre = Auth::user()->egresado->nombres." ".Auth::user()->egresado->ap_paterno." ".Auth::user()->egresado->ap_materno;
        $telefono = Auth::user()->egresado->telefono;
        $correousuario = Auth::user()->correo;
        $data = "Estoy interesado en aplicar para la vacante descrita dentro de su organización. Le anexo mi CV y
            espero que mis habilidades cumplan con los requisitos que usted está buscando, si tiene cualquier
            pregunta no dude en contactarme. <br><br>Agradezco el tiempo que se toma en revisar mi CV y esperando
            su pronta respuesta, quedo a su disposición.";

        $data = array( 'contenido' => $data, 'vacante' => $asunto ,'nombre' => $nombre, 'telefono' => $telefono, 'correo' => $correousuario );

        $ofertas = Oferta::todo( $request->get( 'q' ) )
            ->orderBy('created_at', 'DESC')
            ->where( 'status', 'Vacante' )
            ->paginate(9);

        if( $path )
        {
            // Sending the email with the user's information
            $res = Mail::send('correo.correo', $data, function( $message ) use ( $asunto, $destinatario, $pathToFile, $correousuario )
            {
                $message->to( $destinatario );
                $message->subject( $asunto );
                // Este email es de prueba, para la liberacion del sistema se debe cambiar por el correo 
                // del administrador, por la configuracion debe ser un correo del gmail.
                $message->from( 'betydomlopez@gmail.com' );
                $message->attach( $pathToFile );
            });

            if( $res ) {
                // If request is valid so create a instance of Postulacion own the Oferta
                $postulacion = new Postulacion();
                $postulacion->egresado_matricula = Auth::user()->egresado_matricula;
                $postulacion->oferta_id = $request->e_id;
                $postulacion->save();

                Session::flash('message_success', 'Se ha postulado exitosamente.' );
                // Return to view
                return view('egresados.ofertas.ofertas', compact( 'ofertas') );
            }
            else {
                Session::flash('message_danger', 'Hubo un error, intente postularse nuevamente.' );
                // Return to view
                return view('egresados.ofertas.ofertas', compact( 'ofertas') );
            }
        }else
        {
            Session::flash('message_danger', 'Asegúese de subir su CV antes de postularse.' );
            // Return to View
            return view('egresados.ofertas.ofertas', compact( 'ofertas') );
        }
    }

}
