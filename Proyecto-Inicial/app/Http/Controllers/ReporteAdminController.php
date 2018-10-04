<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Egresado;
use App\Preparacion;
use App\Empresa;
use App\Evento;
use App\Oferta;
use Session;
use App;

class ReporteAdminController extends Controller
{
    protected $carrera = array(
		0=>'Ingeniería en Diseño',
		1=>'Ingeniería en Computación',
		2=>'Ingeniería en Alimentos',
		3=>'Ingeniería en Electrónica',
		4=>'Ingeniería en Mecatrónica',
		5=>'Ingeniería Industrial',
		6=>'Ingeniería en Física Aplicada',
		7=>'Licenciatura en Ciencias Empresariales',
		8=>'Licenciatura en Matemáticas Aplicadas',
		9=>'Licenciatura en Estudios Mexicanos',
		10=>'Ingeniería en Mecánica Automotriz'
	);

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
	public function showReporteView( Request $request, $string )
    {
        if( $string == "empty" ) $string = "";
        
        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML( $this->get_data_to_html( $string ) );

        return $pdf->stream();
    }

    function showReporteViewEmpresas( Request $request, $string )
    {
        if( $string == "empty" ) $string = "";

        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML( $this->get_data_to_html_empresas( $string ) );

        return $pdf->stream();

    }

    function showReporteViewEventos( Request $request, $string )
    {
        if( $string == "empty" ) $string = "";

        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML( $this->get_data_to_html_eventos( $string ) );

        return $pdf->stream();
    }

    function showReporteViewOfertas( Request $request, $string )
    {
        if( $string == "empty" ) $string = "";

        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML( $this->get_data_to_html_ofertas( $string ) );

        return $pdf->stream();
    }

    function get_data_to_html_ofertas( $string )
    {
        $ofertas = Oferta::todo( $string )
            ->get();
        
        $output = '<style>
                    table{ width: 97%;border-collapse: collapse;border: #ACABAB 1px solid;font-size: 13px;margin: auto;}
                    table thead {color: white; background-color: #6B6B6B; }
                    tr, td {height: 48px;border: #ACABAB 1px solid; text-align:center;}
                    tr:nth-child(even){color: #6B6B6B; background-color: #D8D8D8;}
                    tbody tr:nth-child(odd){color: #6B6B6B; background-color: #FFFFFF;}
                </style>
        <h3 align = "center">Reporte ofertas</h3>
        <table>
            <thead>
				<tr>
                    <td width="110">Puesto</td>
                    <td>Empresa</td>
                    <td>Descripción</td>
                    <td>Ubicación</td>
                    <td width="80">Carrera</td>
                </tr>
			</thead>';
        
        $output.='<tbody>';

        $i = 1;
        foreach( $ofertas as $oferta )
        {
            $output.='
                <tr>
                    <td>'.$oferta->titulo_empleo.'</td>
                    <td>'.$oferta->empresa->nombre.'</td>
                    <td>'.$oferta->descripcion.'</td>
                    <td>'.$oferta->ubicacion.'</td>
                    <td>'.$this->carrera[ $oferta->carrera ].'</td>
                </tr>';
            ++$i;
        }
        $output.='</tbody>';
        
        return $output;
    }

    function get_data_to_html_eventos( $string )
    {
        $eventos = Evento::todo( $string )
            ->where('activo','=',1)
            ->orderBy('fecha', 'DESC')
            ->get();
        
        $output = '<style>
                    table{ width: 97%;border-collapse: collapse;border: #ACABAB 1px solid;font-size: 13px;margin: auto;}
                    table thead {color: white; background-color: #6B6B6B; }
                    tr, td {height: 48px;border: #ACABAB 1px solid; text-align:center;}
                    tr:nth-child(even){color: #6B6B6B; background-color: #D8D8D8;}
                    tbody tr:nth-child(odd){color: #6B6B6B; background-color: #FFFFFF;}
                </style>
        <h3 align = "center">Reporte eventos</h3>
        <table>
            <thead>
				<tr>
                    <td>Nombre</td>
                    <td>Lugar</td>
                    <td>Fecha</td>
                    <td>Categoría</td>
                    <td width="260px">Descripción</td>
                </tr>
			</thead>';
        
        $output.='<tbody>';

        $i = 1;
        foreach( $eventos as $evento )
        {
            $output.='
                <tr>
                    <td>'.$evento->nombre.'</td>
                    <td>'.$evento->lugar.'</td>
                    <td>'.$evento->fecha.'</td>
                    <td>'.$evento->categoria.'</td>
                    <td>'.$evento->descripcion.'</td>
                </tr>';
            ++$i;
        }
        $output.='</tbody>';
        
        return $output;
    }

    function get_data_to_html_empresas( $string )
    {
        $empresas = Empresa::todo( $string )
            ->where('habilitada','=',1)
            ->orderBy('nombre', 'DESC')
            ->get();
        
        $output = '<style>
                    table{ width: 97%;border-collapse: collapse;border: #ACABAB 1px solid;font-size: 13px;margin: auto;}
                    table thead {color: white; background-color: #6B6B6B; }
                    tr, td {height: 48px;border: #ACABAB 1px solid; text-align:center;}
                    tr:nth-child(even){color: #6B6B6B; background-color: #D8D8D8;}
                    tbody tr:nth-child(odd){color: #6B6B6B; background-color: #FFFFFF;}
                </style>
        <h3 align = "center">Reporte empresas</h3>
        <table>
            <thead>
				<tr>
                    <td>Nombre</td>
                    <td>Ubicación</td>
                    <td>Página web</td>
                    <td>Correo</td>
                    <td>Teléfono</td>
                </tr>
			</thead>';
        
        $output.='<tbody>';

        $i = 1;
        foreach( $empresas as $empresa )
        {
            $output.='
                <tr>
                    <td>'.$empresa->nombre.'</td>
                    <td>'.$empresa->ciudad.', '.$empresa->estado.'</td>
                    <td>'.$empresa->pagina_web.'</td>
                    <td>'.$empresa->correo.'</td>
                    <td>'.$empresa->telefono.'</td>
                </tr>';
            ++$i;
        }
        $output.='</tbody>';
        
        return $output;
    }

    function get_data_to_html( $string )
    {
        $egresados = Egresado::todo( $string )
            ->where( 'habilitado','=', 1 )
            ->orderBy( 'ap_paterno', 'DESC' )
            ->get();
        
        $output = '<style>
                    table{
                        width: 97%;
                        border-collapse: collapse;
                        border: #ACABAB 1px solid;
                        font-size: 13px;
                        margin: auto;
                        }
                        table thead {
                            color: white;
                            background-color: #6B6B6B;
                        }
                        tr, td {
                        height: 48px;
                        border: #ACABAB 1px solid;
                        text-align:center;
                        }
                        tr:nth-child(even){
                        color: #6B6B6B; 
                        background-color: #D8D8D8;
                        }
                        tbody tr:nth-child(odd){
                        color: #6B6B6B;
                        background-color: #FFFFFF;
                        }
                </style>
        <h3 align = "center">Reporte egresados</h3>
        <table>
            <thead>
				<tr>
                    <td width="50px">Número</td>
                    <td width = "100px">Matricula</td>
                    <td>Nombre</td>
                    <td>Carrera</td>
                    <td width = "100px">Generación</td>
                </tr>
			</thead>';
        
        $output.='<tbody>';

        $i = 1;
        foreach( $egresados as $egresado )
        {
            $output.='
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$egresado->matricula.'</td>
                    <td>'.$egresado->nombres.' '.$egresado->ap_paterno.' '.$egresado->ap_materno.'</td>
                    <td>'.$this->carrera[ $egresado->preparacion->carrera ].'</td>
                    <td>'.$egresado->preparacion->generacion.'</td>
                </tr>';
            ++$i;
        }
        $output.='</tbody>';
        
        return $output;
    }
}
