<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Estadistica;
use Auth;
// Agregar para usar Charts
use Charts;

class IndicesEstadisticasController extends Controller
{    
    /*
    ** Este controlador requiere verificacion de usuario
        public function __construct()
        {
            $this->middleware('auth');
        }
    
    */
    public function showEstadisticasView( Request $request )
    {
        $indice = array();
        $total = array();

        $index = $request->get( 'carrera' );
        
        if( $index == "" )
            $index = '0';

        $titulo = $this->getDescription( $index );
        $valor = $this->getData( $index );

        foreach(  $valor as $item )
        {
            array_push( $indice, $item->{ 'Indice' } );
            array_push( $total, $item->{ 'Total' } );
        }

        $chart = Charts::create( 'bar', 'highcharts' )
            ->title( $titulo )
            ->elementLabel( 'Absoluto' )
            ->labels( $indice )
            ->values( $total )
            ->dimensions( 0, 400 )
            ->responsive( false );
    
        return view( 'admin.estadistica.index', [ 'chart' => $chart ] );
    }

    public function getDescription( $index )
    {
        $titulo = array(
                        "0" => 'Género de los encuestados',
                        "1" => 'Egresados con empleo',
                        "2" => 'Tiempo hasta conseguir primer empleo',
                        "3" => 'Dificultades para conseguir empleo',
                        "4" => 'Tipo de organismo donde laboran',
                        "5" => 'Tiempo de dedicación al trabajo',
                        "6" => 'Tipo de formación profesional',
                        "7" => 'Salario de los empleados',
                        "8" => 'Titulados y no titulados',
                        "9" => 'Tiempo para obtener el título',
                        "10" => 'Arraigo de egresados en su zona de estudios',
                        "11" => 'Satisfaccion de los egresados en cuanto a la formacion profesional',
                        "12" => 'Opinion de los egresados en cuanto al clima universitario',

                        "13" => 'Carreras mas demandadas',
						"14" => 'Opinón de los egresados sobre la formación profesional de los egresados',
						"15" => 'Opinión de los empleadores sobre el desempeño laboral del egresado',
						"16" => 'Importancia otorgado del titulo profesional para contratar a egresados',
						"17" => 'Importancia de la experiencia laboral para contratar a un profesional',
						"18" => 'Importancia de la imagen de la universidad para contrata a egresados',
						"19" => 'Confianza de los empleadores para la contratacion de egresados de la universidad'
        );

        return $titulo[ $index ];
    }

    public function getData( $index )
    {
        $consultas = array(
                '0' => "SELECT genero AS Indice, COUNT(*) AS Total FROM egresado GROUP BY genero;",
                '1' => "SELECT
	                    CASE WHEN( DATEDIFF(primerempleo.fecha_ingreso,preparacion.fecha_fin) <= 0) THEN 'Egresado con empleo' ELSE
		                    CASE WHEN( DATEDIFF(fecha_ingreso,fecha_fin ) > 0 ) THEN 'Egresado sin empleo'
		                    END
	                    END Indice, COUNT(*) AS Total FROM egresado INNER JOIN ( primerempleo INNER JOIN preparacion )
                        ON egresado.preparacion_id = preparacion.id AND egresado.primerempleo_id = primerempleo.id GROUP BY Indice;",
                '2' => "SELECT tiempo_sin_empleo AS 'Indice', COUNT(*) AS Total FROM primerempleo INNER JOIN egresado
                        ON egresado.primerEmpleo_id = primerempleo.id GROUP BY Indice;",
                '3' => "SELECT factores_contratacion AS 'Indice', COUNT(*) AS Total FROM egresado INNER JOIN primerempleo
                        ON egresado.primerempleo_id = primerempleo.id GROUP BY factores_contratacion;",
                '4' => "SELECT sector AS 'Indice', COUNT(*) AS Total FROM primerempleo INNER JOIN egresado
                        ON egresado.primerempleo_id = primerempleo.id GROUP BY sector;",
                '5' => "SELECT jornada AS 'Indice', COUNT(*) AS Total FROM primerempleo INNER JOIN egresado
                        ON egresado.primerempleo_id = primerempleo.id GROUP BY jornada;",
                '6' => "SELECT
	                    CASE WHEN( actividad_laboral = 0 ) THEN 'Requieren formacion de mi carrera' ELSE
		                    CASE WHEN( actividad_laboral = 1 ) THEN 'No requieren formacion de mi carrera' ELSE
			                    CASE WHEN( actividad_laboral = 2 ) THEN 'No requieren de una profesion'
			                    END
		                    END
	                    END Indice, COUNT(*) AS Total FROM primerempleo INNER JOIN egresado ON
                        egresado.primerempleo_id=primerempleo.id GROUP BY Indice;",
                '7' => "SELECT
	                    CASE WHEN( salario BETWEEN 0 AND 5000 ) THEN 'De 0 a 50000' ELSE
		                    CASE WHEN( salario BETWEEN 5001 AND 10000 ) THEN 'Entre 5000 y 10000' ELSE
			                    CASE WHEN( salario between 10001 AND 15000 ) THEN 'Entre 10000 y 15000' ELSE
				                    CASE WHEN( salario > 15000 ) THEN 'Mas de 15000'
				                    END
			                    END
		                    END
	                    END Indice, COUNT(*) AS Total FROM oferta GROUP BY Indice;",
                '8' => "SELECT
	                    CASE WHEN( forma_titulacion = 'Tesis' OR forma_titulacion = 'CENEVAL') THEN 'Titulados' ELSE 'No titulados'
	                    END Indice, COUNT(*) AS Total FROM preparacion INNER JOIN egresado ON egresado.preparacion_id = preparacion.id GROUP BY Indice;",
                '9' => "SELECT
	                    CASE WHEN( DATEDIFF( fecha_titulo, fecha_fin ) < 365 ) THEN 'Menos de un año' ELSE
		                    CASE WHEN( DATEDIFF( fecha_titulo, fecha_fin ) BETWEEN 365 AND 730 ) then 'Entre 1 y 2 años' ELSE
		                    	CASE WHEN( DATEDIFF( fecha_titulo, fecha_fin ) > 730 ) THEN 'Mas de 2 años'
		    	                END
		                    END
                    	END Indice, count(*) AS Total FROM preparacion INNER JOIN egresado
                        ON preparacion.id = egresado.preparacion_id AND fecha_titulo != 'null' GROUP BY Indice;",
                '10' => "SELECT
                        CASE WHEN( evaluacion='Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion='Muy buena' ) THEN 'Muy Buena' ELSE
                                CASE WHEN( evaluacion='Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion='Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion='Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM catalogopregunta inner join( evaluacionpe inner join
                        primerempleo on primerempleo_id = primerempleo.id ) on catalogopregunta_id = catalogopregunta.id
                        AND pregunta = '8' and cuestionario = 1 GROUP BY Indice;",
                '11' => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy Buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM catalogopregunta INNER JOIN( evaluacionpe INNER JOIN
                        primerempleo ON evaluacionpe.primerempleo_id = primerempleo.id ) ON catalogopregunta_id = catalogopregunta.id
                        AND pregunta = '13' AND cuestionario = 1 GROUP BY Indice;",
                '12' => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy Buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM catalogopregunta INNER JOIN ( evaluacionpe INNER JOIN primerempleo
                        ON primerempleo_id = primerempleo.id ) ON catalogopregunta_id = catalogopregunta.id AND cuestionario = 1
                        WHERE( pregunta = '9' or pregunta = '10' or pregunta = '11' or pregunta = '12' ) GROUP BY Indice;",
                '13' => "SELECT
                        CASE WHEN( carrera = 0 ) THEN 'Ingenieria en Diseño' ELSE
                            CASE WHEN( carrera = 1 ) THEN 'Ingenieria en Computacion' ELSE
                                CASE WHEN( carrera = 2) THEN 'Ingenieria en Alimentos' ELSE
                                    CASE WHEN( carrera = 3 ) THEN 'Ingenieria en Electronica' ELSE
                                        CASE WHEN( carrera = 4 ) THEN 'Ingenieria en Mecatronica' ELSE
                                            CASE WHEN( carrera = 5 ) THEN 'Ingenieria Industrial' ELSE
                                                CASE WHEN( carrera = 6 ) THEN 'Ingenieria en Fisica Aplicada' ELSE
                                                    CASE WHEN( carrera = 7 ) THEN 'Licenciatura en Ciencias Empresariales' ELSE
                                                        CASE WHEN( carrera = 8 ) THEN 'Licenciatura en Matematicas Aplicadas' ELSE
                                                            CASE WHEN( carrera = 9 ) THEN 'Licenciatura en Estudios Mexicanos' ELSE
                                                                CASE WHEN( carrera = 10 ) THEN 'Ingenieria en Mecanica Automotriz'
                                                                END
                                                            END
                                                        END
                                                    END
                                                END
                                            END
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM oferta GROUP BY Indice ORDER BY Total DESC;",
                '14' => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente formacion' ELSE
                            CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena formacion' ELSE
                                CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular formacion' ELSE
                                    CASE WHEN( evaluacion = 'Insatisfactoria' ) THEN 'Mala formacion'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM catalogopregunta INNER JOIN( evaluacionpe INNER JOIN primerempleo
                        ON primerempleo_id=primerempleo.id ) ON catalogopregunta_id=catalogopregunta.id AND pregunta = '1'
                        AND cuestionario = 2 GROUP BY Indice;",
                '15' => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM catalogopregunta INNER JOIN( evaluacionpe inner join primerempleo ON
                        primerempleo_id = primerempleo.id ) ON catalogopregunta_id=catalogopregunta.id AND pregunta = '2' AND
                        cuestionario = 2 GROUP BY Indice;",
                '16' => "SELECT
                        CASE WHEN( evaluacion = 'Indispensable' ) THEN 'Indispensable' ELSE
                            CASE WHEN( evaluacion = 'Deseable' ) THEN 'Deseable' ELSE
                                CASE WHEN( evaluacion = 'Poco indispensable' ) THEN 'Poco indispensable' ELSE
                                    CASE WHEN( evaluacion = 'No indispensable' ) THEN 'No indispensable'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM catalogopregunta INNER JOIN( evaluacion INNER JOIN empleado ON
                        empleado_id = empleado.id ) ON catalogopregunta_id = catalogopregunta.id AND
                        catalogopregunta.pregunta = '10a' GROUP BY Indice;",
                '17' => "SELECT
                        CASE WHEN( evaluacion = 'Indispensable' ) THEN 'Indispensable' ELSE
                            CASE WHEN( evaluacion = 'Deseable' ) THEN 'Deseable' ELSE
                                CASE WHEN( evaluacion = 'Poco indispensable' ) THEN 'Poco indispensable' ELSE
                                    CASE WHEN( evaluacion = 'No indispensable' ) THEN 'No indispensable'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM catalogopregunta INNER JOIN( evaluacion INNER JOIN empleado
                        ON empleado_id = empleado.id ) ON catalogopregunta_id = catalogopregunta.id AND
                        catalogopregunta.pregunta = '10c' GROUP BY Indice;",
                "18" => "SELECT
                        CASE WHEN( evaluacion = 'Indispensable' ) THEN 'Indispensable' ELSE
                            CASE WHEN( evaluacion = 'Deseable' ) THEN 'Deseable' ELSE
                                CASE WHEN( evaluacion = 'Poco indispensable' ) THEN 'Poco indispensable' ELSE
                                    CASE WHEN( evaluacion = 'No indispensable' ) THEN 'No indispensable'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM catalogopregunta INNER JOIN( evaluacion INNER JOIN empleado ON
                        empleado_id = empleado.id ) ON catalogopregunta_id = catalogopregunta.id AND
                        catalogopregunta.pregunta = '10f' GROUP BY Indice;",
                "19" => "SELECT
                        CASE WHEN( evaluacion = 'Indispensable' ) THEN 'Indispensable' ELSE
                            CASE WHEN( evaluacion = 'Deseable' ) THEN 'Deseable' ELSE
                                CASE WHEN( evaluacion = 'Poco indispensable' ) THEN 'Poco indispensable' ELSE
                                    CASE WHEN( evaluacion = 'No indispensable' ) THEN 'No indispensable'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM catalogopregunta INNER JOIN( evaluacion INNER JOIN empleado
                        ON empleado_id = empleado.id ) ON catalogopregunta_id = catalogopregunta.id AND
                        catalogopregunta.pregunta = '11' GROUP BY Indice;"
                );

        $data = DB::select( $consultas[ $index ] );
        $valor = json_encode( $data, true );
        $valor = json_decode( $valor );

        return $data;  
    }
}