@extends('layouts.master')

@section('title', 'Mis intereses')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Mi perfil</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside class="column" id="cssmenu">
			@include('partials.aside')
		</aside>
		
		<div class="column content">	
			<form method="POST" action="#">			
				<div class="form-group">
					<label for="tContrato">1. ¿Tiempo transcurrido para encontrar tu primer empleo, después de haber egresado?</label>
					<select name="tContrato" id="inputTContrato" class="form-control">
						<option value="" checked>---Selecionar---</option>
						<option value="0">< 6 meses</option>
						<option value="1"> De 6 a 9 meses</option>
						<option value="2"> De 10 a 12 meses</option>
						<option value="3"> > a 1 año</option>
						<option value="4"> No cuento con empleo aún</option>
					</select>
				</div>
				<div class="form-group">
					<label for="tContrato">2. ¿Cuales factores dificultan o an dificultado ?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Mala
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">3. ¿Comó calificas, en general, la formación recibida por la UTM al momento de ejercer tu profesión por primera vez?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="tContrato" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="tContrato" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="tContrato" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="tContrato" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="tContrato" id="" value="0"> Mala
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">4. ¿Concideras que careces o carecias de algun(nos) conocimiento(s) básico(s), al momento de ejercer tu prefesión por primera vez, y no fue(ron) desarrollado(s) durante tu formacion profesional?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Si
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> No
						</label>
					</div>
					@if ($dato == "AA")
						<label for="">¿Cuáles?</label>
						<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
					@endif
				</div>

				<div class="form-group">
					<label for="">5. Subraya máximo cinco habilidades importantes que requieres o requerias dominar al momento de ejercer tu profesión por primera vez y que no fueran desarrolladas durante tu dormación profesional.</label>
					<div>
						<label class="label-checkbox"><input type="checkbox" class="checkbox" name="sector" value="1"> A) Comuinicar</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> B) dirigir
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> C) Tabajo en equipo
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> D) Identificar y resolver problemas
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> E) Analizar
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> F) Negociar
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> G) Aprender
						</label>
					</div>
					<div>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> H) Ser creativo
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> I) Proponer
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> J) Categorizar/Clasificar
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> K) Describir/Explicar
						</label>					
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> L) Evaluar
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> M) Procesar
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> N) Expresar
						</label>
					</div>
					<div>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> O) Escuchar
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> P) Resolver conflictos
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> Q) Solicitar
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> R) Decidir
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> S) Interpretar
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> T) Rebatir
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="" value="0"> U) Innovar
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" class="checkbox" name="sector" id="otras" value="0">{{ "D) Otras," }}
						</label>
						<div id="email">
							<label for="input">¿Cuáles?</label>
							<input type="text" name="cuales" id="input" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">6. ¿Concideras que careces o carecias de alguna(s) área(s) conocimiento básica(s) (sistemas, publicidad, investigacion, manufactura, etc.), al momento de ejercer tu prefesión por primera vez, y no fue(ron) desarrollada(s) durante tu formacion profesional?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Si
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> No
						</label>
					</div>
					@if ($dato == "AA")
						<label for="">¿Cuáles?</label>
						<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
					@endif
				</div>
				<div class="form-group">
					<label for="">7. Subraya máximo cinco valores o actitudes importantes que requieres o requerias tener al momento de ejercer tu profesión por primera vez y que no fueran desarrolladas durante tu dormación profesional.</label>
					<div>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="1"> A) Respeto
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> B) Honestidad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> C) Lealtad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> D) Discrecionalidad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> E) Responsabilidad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> F) Tolerancia
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> G) Respeto a la naturaleza
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> H) Imparcialidad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> I) Solidalidad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> J) Integridad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> K) Disciplina
						</label>					
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> L) Eficiencia
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> M) Perseverancia
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> N) Puntualidad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> O) Calidad en el trabajo
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> P) Limpieza
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> Q) Disponibilidad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> R) Profesionalidad
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> S) Empatia
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> T) Honradez
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="" value="0"> U) Justicia
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="sector" id="otras" value="0">{{ "D) Otras," }}
						</label>
						<div id="email">
							<label for="input">¿Cuáles?</label>
							<input type="text" name="cuales" id="input" class="form-control">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="tContrato">8. ¿Comó calificas las instalaciónes (aulas, biblioteca, sala de cómputo, laboratorios, otros), de la UTM, durante tu formación profesional y que repercutieron al memento de ejercer profesión por primera vez?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Mala
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="tContrato">9. ¿Comó calificas los servicios (escolares, y administrativos) de la UTM, durante tu formación profesional y que repercutieron al memento de ejercer profesión por primera vez?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Mala
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="tContrato">10. ¿Comó calificas los equipos, intrumentos, maquinaria, herramientas, y software de la UTM, durante tu formación profesional y que repercutieron al memento de ejercer profesión por primera vez?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Mala
						</label>
					</div>
				</div>

				<div class="form-group">
					<label for="tContrato">11. ¿Comó calificas, en general, la limpieza de la infraestructura de la UTM, durante tu formación profesional y que repercutieron al memento de ejercer profesión por primera vez?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Mala
						</label>
					</div>			</div>
				<div class="form-group">
					<label for="tContrato">12. ¿Comó calificas, en general, la capacidad de la UTM, durante tu formación profesional y que repercutieron al memento de ejercer profesión por primera vez?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Mala
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">13. ¿Comó calificas el desempeño de los docentes (transmision de los conocimientos, aclaracion de dudas, y asesorias) de la UTM, durante tu formación profesional y que repercutieron al memento de ejercer profesión por primera vez?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Mala
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">14. ¿Comó calificas las tecnicas (investigación, análisis, comparación, etc.) y metodos (uso de casos de estudio, aplicación del conocimento en ploblemas reales, etc.) de enseñanza aplicados por los docentes de la UTM, durante tu formación profesional y que repercutieron al memento de ejercer profesión por primera vez?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Mala
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">15. ¿Comó calificas la forma de evaluación aplicados por los docentes de la UTM, durante tu formación profesional y que repercutieron al memento de ejercer profesión por primera vez?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Excelente
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Muy buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Buena
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Regular
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> Mala
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">16. ¿Continuarias realizando algun estudio de posgrado en la Universidad Tecnológica de la Mixteca?</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="1"> Si
						</label>
						<label class="radio-inline">
							<input type="radio" name="sector" id="" value="0"> No
						</label>
					</div>
					@if ($dato == "AA")
						<label for="">¿Por qué?</label>
						<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
					@endif
				</div> 
				<div class="form-group text-center">
					<button type="submit" class="flat">
						Siguiente
					</button>
				</div>
			</form>

		</div>
		
	</div>

@stop

{{-- Crear base de datos de imagenes, 20 para train, 50 para test, reconocer y detectar rostro --}}

{{-- Cambiar select por radiobutton --}}