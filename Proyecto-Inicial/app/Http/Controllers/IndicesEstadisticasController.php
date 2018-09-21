<?php
/**
* Controlador para Indices y Estadisticas
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Estadistica;
use Auth;
// Se agrega el alias para usar los Charts
use Charts;

class IndicesEstadisticasController extends Controller
{    
    public function __construct()
    {
        // $this->middleware('auth:admin');
        $this->middleware( 'auth:admin' );
    }
    
    /**
    * Muestra la Vista Indices y Estadisticas
    */
    public function showEstadisticasView( Request $request )
    {
        $indice = array();
        $total = array();

        // Opcion seleccionada en el formulario
        $index = $request->get( 'egresados' );
        
        if( $index == "" )
            $index = $request->get( 'empleadores' );
        
        if( $index == "" || $index == "notValue" )
            $index = '0';

        $titulo = $this->getDescription( $index );
        $valor = $this->getData( $index );

        foreach(  $valor as $item )
        {
            array_push( $indice, $item->{ 'Indice' } );
            array_push( $total, $item->{ 'Total' } );
        }

        // Crea un chart tipo barra y le pasa los valores de la consulta
        $chart = Charts::create( 'bar', 'highcharts' )
            ->title( $titulo )
            ->elementLabel( 'Absoluto' )
            ->labels( $indice )
            ->values( $total )
            ->dimensions( 0, 400 )
            ->responsive( false );
        // Se redenriza en la vista, se manda como un array
        
        return view( 'admin.estadistica.index', [ 'chart' => $chart ] );
    }

    public function getDescription( $index )
    {
        $titulo = array(
                        // Consultas hojas
                        "notValue" => "Elige una opción",
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
                        "11" => 'Satisfacción de los egresados en cuanto a la formación profesional',
                        "12" => 'Opinión de los egresados en cuanto al clima universitario',

                        "13" => 'Carreras más demandadas',
						"14" => 'Opinión de los empleadores sobre la formación profesional de los egresados',
						"15" => 'Opinión de los empleadores sobre el desempeño laboral del egresado',
						"16" => 'Importancia otorgado al título profesional para contratar a egresados',
						"17" => 'Importancia de la experiencia laboral para contratar a un profesional',
						"18" => 'Importancia de la imagen de la universidad para contratar a egresados',
						"19" => 'Confianza de los empleadores para la contratación de egresados de la universidad',

                        // Satisfaccion de la Formacion Profesional
						"20" => 'Habilidades que requieren dominar al momento de ejercer tu profesión por primera vez',
						"21" => "Valores y actitudes importantes al momento de ejercer tu profesión por primera vez",
						"22" => "¿Cómo calificas los servicios escolares y los administrativos?",
						"23" => "¿Cómo calificas los equipos, instrumentos, maquinaria y herramientas de la UTM?",
						"24" => "¿Cómo calificas la limpieza de la infraestructura de la UTM?",
						"25" => "¿Cómo calificas la capacidad de la infraestructura de la UTM?",
						"26" => "¿Cómo calificas el desempeño de los docentes de la UTM?",
						"27" => "¿Cómo calificas las técnicas y métodos de enseñanza de los docentes de la UTM?",
						"28" => "¿Cómo calificas la forma y pertinencia de evaluación aplicados por los docentes de la UTM?",
						
						// Desempeño Profesional del Egresado
						"29" => "Habilidades importantes que debe desarrollar el egresado",
						"30" => "Carencia de conocimientos básicos del egresado",
						"31" => "¿Qué habilidades no demostró el egresado? ",
						"32" => "¿El egresado careció del dominio de algún área de conocimiento básico?",
						"33" => "¿El egresado debió actualizar sus conocimientos?",
						"34" => "Valores y actitudes importantes que debe tener el egresado ",
						"35" => "¿Qué valores no demostró el egresado?"
        );

        return $titulo[ $index ];
    }

    public function getData( $index )
    {
        /**
        * Define las consultas en MySQL.
        */
        $consultas = array(
                '0' => "SELECT genero AS Indice, COUNT(*) AS Total FROM Egresado GROUP BY genero;",
                '1' => "SELECT
	                    CASE WHEN( DATEDIFF(PrimerEmpleo.fecha_ingreso, Preparacion.fecha_fin) <= 0) THEN 'Egresado con empleo' ELSE
		                    CASE WHEN( DATEDIFF( fecha_ingreso, fecha_fin ) > 0 ) THEN 'Egresado sin empleo'
		                    END
	                    END Indice, COUNT(*) AS Total FROM Egresado INNER JOIN ( PrimerEmpleo INNER JOIN Preparacion )
                        ON Egresado.preparacion_id = Preparacion.id AND Egresado.primer_empleo_id = PrimerEmpleo.id GROUP BY Indice;",
                '2' => "SELECT tiempo_sin_empleo AS 'Indice', COUNT(*) AS Total FROM PrimerEmpleo INNER JOIN Egresado
                        ON Egresado.primer_empleo_id = PrimerEmpleo.id GROUP BY Indice;",
                '3' => "SELECT factores_contratacion AS 'Indice', COUNT(*) AS Total FROM Egresado INNER JOIN PrimerEmpleo
                        ON Egresado.primer_empleo_id = PrimerEmpleo.id GROUP BY factores_contratacion;",
                '4' => "SELECT sector AS 'Indice', COUNT(*) AS Total FROM PrimerEmpleo INNER JOIN Egresado
                        ON Egresado.primer_empleo_id = PrimerEmpleo.id GROUP BY sector;",
                '5' => "SELECT jornada AS 'Indice', COUNT(*) AS Total FROM PrimerEmpleo INNER JOIN Egresado
                        ON Egresado.primer_empleo_id = PrimerEmpleo.id GROUP BY jornada;",
                '6' => "SELECT
	                    CASE WHEN( actividad_laboral = 0 ) THEN 'Requieren formacion de mi carrera' ELSE
		                    CASE WHEN( actividad_laboral = 1 ) THEN 'No requieren formacion de mi carrera' ELSE
			                    CASE WHEN( actividad_laboral = 2 ) THEN 'No requieren de una profesion'
			                    END
		                    END
	                    END Indice, COUNT(*) AS Total FROM PrimerEmpleo INNER JOIN Egresado ON
                        Egresado.primer_empleo_id = PrimerEmpleo.id GROUP BY Indice;",
                '7' => "SELECT
	                    CASE WHEN( salario BETWEEN 0 AND 5000 ) THEN 'De 0 a 50000' ELSE
		                    CASE WHEN( salario BETWEEN 5001 AND 10000 ) THEN 'Entre 5000 y 10000' ELSE
			                    CASE WHEN( salario between 10001 AND 15000 ) THEN 'Entre 10000 y 15000' ELSE
				                    CASE WHEN( salario > 15000 ) THEN 'Mas de 15000'
				                    END
			                    END
		                    END
	                    END Indice, COUNT(*) AS Total FROM Oferta GROUP BY Indice;",
                '8' => "SELECT
	                    CASE WHEN( forma_titulacion = 'Tesis' OR forma_titulacion = 'CENEVAL') THEN 'Titulados' ELSE 'No titulados'
	                    END Indice, COUNT(*) AS Total FROM Preparacion INNER JOIN Egresado ON Egresado.preparacion_id = Preparacion.id GROUP BY Indice;",
                '9' => "SELECT
	                    CASE WHEN( DATEDIFF( fecha_titulo, fecha_fin ) < 365 ) THEN 'Menos de un año' ELSE
		                    CASE WHEN( DATEDIFF( fecha_titulo, fecha_fin ) BETWEEN 365 AND 730 ) then 'Entre 1 y 2 años' ELSE
		                    	CASE WHEN( DATEDIFF( fecha_titulo, fecha_fin ) > 730 ) THEN 'Mas de 2 años'
		    	                END
		                    END
                    	END Indice, count(*) AS Total FROM Preparacion INNER JOIN Egresado
                        ON Preparacion.id = Egresado.preparacion_id AND fecha_titulo != 'null' GROUP BY Indice;",
                '10' => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy Buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta inner join( EvaluacionPE inner join
                        PrimerEmpleo on primerempleo_id = PrimerEmpleo.id ) on catalogopregunta_id = CatalogoPregunta.id
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
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE INNER JOIN
                        PrimerEmpleo ON EvaluacionPE.primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id
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
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN ( EvaluacionPE INNER JOIN PrimerEmpleo
                        ON primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND cuestionario = 1
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
                        END Indice, COUNT(*) AS Total FROM Oferta GROUP BY Indice ORDER BY Total DESC;",
                '14' => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente formacion' ELSE
                            CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena formacion' ELSE
                                CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular formacion' ELSE
                                    CASE WHEN( evaluacion = 'Insatisfactoria' ) THEN 'Mala formacion'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE INNER JOIN PrimerEmpleo
                        ON primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND pregunta = '1'
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
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE inner join PrimerEmpleo ON
                        primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND pregunta = '2' AND
                        cuestionario = 2 GROUP BY Indice;",
                '16' => "SELECT
                        CASE WHEN( evaluacion = 'Indispensable' ) THEN 'Indispensable' ELSE
                            CASE WHEN( evaluacion = 'Deseable' ) THEN 'Deseable' ELSE
                                CASE WHEN( evaluacion = 'Poco indispensable' ) THEN 'Poco indispensable' ELSE
                                    CASE WHEN( evaluacion = 'No indispensable' ) THEN 'No indispensable'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( Evaluacion INNER JOIN Empleado ON
                        empleado_id = Empleado.id ) ON catalogopregunta_id = CatalogoPregunta.id AND
                        CatalogoPregunta.pregunta = '10a' GROUP BY Indice;",
                '17' => "SELECT
                        CASE WHEN( evaluacion = 'Indispensable' ) THEN 'Indispensable' ELSE
                            CASE WHEN( evaluacion = 'Deseable' ) THEN 'Deseable' ELSE
                                CASE WHEN( evaluacion = 'Poco indispensable' ) THEN 'Poco indispensable' ELSE
                                    CASE WHEN( evaluacion = 'No indispensable' ) THEN 'No indispensable'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( Evaluacion INNER JOIN Empleado
                        ON empleado_id = Empleado.id ) ON catalogopregunta_id = CatalogoPregunta.id AND
                        CatalogoPregunta.pregunta = '10c' GROUP BY Indice;",
                "18" => "SELECT
                        CASE WHEN( evaluacion = 'Indispensable' ) THEN 'Indispensable' ELSE
                            CASE WHEN( evaluacion = 'Deseable' ) THEN 'Deseable' ELSE
                                CASE WHEN( evaluacion = 'Poco indispensable' ) THEN 'Poco indispensable' ELSE
                                    CASE WHEN( evaluacion = 'No indispensable' ) THEN 'No indispensable'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( Evaluacion INNER JOIN Empleado ON
                        empleado_id = Empleado.id ) ON catalogopregunta_id = CatalogoPregunta.id AND
                        CatalogoPregunta.pregunta = '10f' GROUP BY Indice;",
                "19" => "SELECT
                        CASE WHEN( evaluacion = 'Indispensable' ) THEN 'Indispensable' ELSE
                            CASE WHEN( evaluacion = 'Deseable' ) THEN 'Deseable' ELSE
                                CASE WHEN( evaluacion = 'Poco indispensable' ) THEN 'Poco indispensable' ELSE
                                    CASE WHEN( evaluacion = 'No indispensable' ) THEN 'No indispensable'
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( Evaluacion INNER JOIN Empleado
                        ON empleado_id = Empleado.id ) ON catalogopregunta_id = CatalogoPregunta.id AND
                        CatalogoPregunta.pregunta = '11' GROUP BY Indice;",
                "20" => "SELECT habilidad AS Indice, COUNT(*) AS Total FROM HabilidadPE inner join
                        PrimerEmpleo ON HabilidadPE.primerempleo_id = PrimerEmpleo.id GROUP BY Indice;",
                "21" => "SELECT valor AS Indice, COUNT(*) AS Total FROM ValorPE inner join PrimerEmpleo
                        ON ValorPE.primerempleo_id = PrimerEmpleo.id GROUP BY Indice;",
                "22" => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                                    END
                                            END
                                    END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE INNER JOIN PrimerEmpleo
                        ON primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND pregunta = '9'
                        AND cuestionario = 1 GROUP BY Indice;",
                "23" => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE INNER JOIN PrimerEmpleo
                        ON primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND pregunta = '10'
                        AND cuestionario = 1 GROUP BY Indice;",
                "24" => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE INNER JOIN PrimerEmpleo
                        ON primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND pregunta = '11'
                        AND cuestionario = 1 GROUP BY Indice;",
                "25" => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE INNER JOIN PrimerEmpleo
                        ON primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND pregunta = '12'
                        AND cuestionario = 1 GROUP BY Indice;",
                "26" => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE INNER JOIN PrimerEmpleo
                        ON primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND pregunta = '13'
                        AND cuestionario = 1 GROUP BY Indice;",
                "27" => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE INNER JOIN PrimerEmpleo
                        ON primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND pregunta = '14'
                        AND cuestionario = 1 GROUP BY Indice;",
                "28" => "SELECT
                        CASE WHEN( evaluacion = 'Excelente' ) THEN 'Excelente' ELSE
                            CASE WHEN( evaluacion = 'Muy buena' ) THEN 'Muy buena' ELSE
                                CASE WHEN( evaluacion = 'Buena' ) THEN 'Buena' ELSE
                                    CASE WHEN( evaluacion = 'Regular' ) THEN 'Regular' ELSE
                                        CASE WHEN( evaluacion = 'Mala' ) THEN 'Mala'
                                        END
                                    END
                                END
                            END
                        END Indice, COUNT(*) AS Total FROM CatalogoPregunta INNER JOIN( EvaluacionPE INNER JOIN PrimerEmpleo
                        ON primerempleo_id = PrimerEmpleo.id ) ON catalogopregunta_id = CatalogoPregunta.id AND pregunta = '15'
                        AND cuestionario = 1 GROUP BY Indice;",
                "29" => "SELECT habilidad AS Indice, COUNT(*) AS Total FROM Habilidad INNER JOIN
                        Empleado ON Habilidad.empleado_id = Empleado.id GROUP BY Indice;",
                "30" => "SELECT carencias_basicas AS Indice, COUNT(*) AS Total from Empleado GROUP BY indice;",
                "31" => "SELECT habilidad AS Indice, COUNT(*) AS Total FROM Habilidad INNER JOIN Empleado ON
                        Habilidad.empleado_id = Empleado.id and Habilidad.demostrada = 0 GROUP BY Indice;",
                "32" => "SELECT carencias_areas AS Indice, COUNT(*) AS Total FROM Empleado GROUP BY indice;",
                "33" => "SELECT conocimientos_actualizados AS Indice, COUNT(*) AS Total FROM Empleado GROUP BY indice;",
                "34" => "SELECT valor AS Indice, COUNT(*) AS Total FROM Valor INNER JOIN Empleado ON
                        Valor.empleado_id = Empleado.id GROUP BY Indice;",
                "35" => "SELECT valor AS Indice, COUNT(*) AS Total FROM Valor INNER JOIN Empleado ON
                        Valor.empleado_id = Empleado.id AND Valor.demostrado = 0 GROUP BY Indice;",
                );

        // Convierte los datos en formato JSON
        $data = DB::select( $consultas[ $index ] );
        $valor = json_encode( $data, true );
        $valor = json_decode( $valor );

        return $data;  
    }
}