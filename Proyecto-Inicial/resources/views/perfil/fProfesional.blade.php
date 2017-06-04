@extends('layouts.master')

@section('title', 'Mis intereses')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1>Mi perfil</h1>
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
						<input type="radio" name="sector" id="SE" value="1">
						<label class="label-radio" for="SE">  Excelente </label>

						<input type="radio" name="sector" id="sMB" value="0">
						<label class="label-radio" for="sMB">  Muy buena </label>
						
						<input type="radio" name="sector" id="sB" value="0">
						<label class="label-radio" for="sB">  Buena </label>
						
						<input type="radio" name="sector" id="sR" value="0">
						<label class="label-radio" for="sR">  Regular </label>
						
						<input type="radio" name="sector" id="sM" value="0">
						<label class="label-radio" for="sM">  Mala </label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">3. ¿Comó calificas, en general, la formación recibida por la UTM al momento de ejercer tu profesión por primera vez?</label>
					<div class="radio">
						<input type="radio" name="tContrato" id="tcE" value="1">
						<label class="label-radio" for="tcE"> Excelente</label>
						
						<input type="radio" name="tContrato" id="tcMB" value="0">
						<label class="label-radio" for="tcMB"> Muy buena</label>
						
						<input type="radio" name="tContrato" id="tcB" value="0">
						<label class="label-radio" for="tcB"> Buena</label>
						
						<input type="radio" name="tContrato" id="tcR" value="0">
						<label class="label-radio" for="tcR"> Regular</label>
						
						<input type="radio" name="tContrato" id="tcM" value="0">
						<label class="label-radio" for="tcM"> Mala</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">4. ¿Concideras que careces o carecias de algun(nos) conocimiento(s) básico(s), al momento de ejercer tu prefesión por primera vez, y no fue(ron) desarrollado(s) durante tu formacion profesional?</label>
					<div class="radio">
						<input type="radio" name="rConocimientos" id="rCSi" value="1">
						<label class="label-radio" for="rCSi"> Sí</label>
						
						<input type="radio" name="rConocimientos" id="rCNo" value="0">
						<label class="label-radio" for="rCNo"> No</label>
					</div>
					@if ($dato == "AA")
						<label for="">¿Cuáles?</label>
						<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
					@endif
				</div>

				<div class="form-group">
					<label for="">5. Subraya máximo cinco habilidades importantes que requieres o requerias dominar al momento de ejercer tu profesión por primera vez y que no fueran desarrolladas durante tu dormación profesional.</label>
					<div class="checkbox">
						
						<input type="checkbox" class="checkbox" name="habilidades" id="HabiA" value="1"> 
						<label for="HabiA" class="label-radio"> Comuinicar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiB" value="0"> 
						<label for="habiB" class="label-radio"> Dirigir</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiC" value="0"> 
						<label for="habiC" class="label-radio"> Tabajo en equipo</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiD" value="0"> 
						<label for="habiD" class="label-radio"> Identificar y resolver problemas</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiE" value="0"> 
						<label for="habiE" class="label-radio"> Analizar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiF" value="0"> 
						<label for="habiF" class="label-radio"> Negociar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiG" value="0"> 
						<label for="habiG" class="label-radio"> Aprender</label>
						<input type="checkbox" class="checkbox" name="habilidades" id="habiH" value="0"> 
						<label class="label-radio" for="habiH"> Ser creativo</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiI" value="0"> 
						<label class="label-radio" for="habiI"> Proponer</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiJ" value="0"> 
						<label class="label-radio" for="habiJ"> Categorizar/Clasificar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiK" value="0"> 
						<label class="label-radio" for="habiK"> Describir/Explicar</label>					
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiL" value="0"> 
						<label class="label-radio" for="habiL"> Evaluar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiM" value="0"> 
						<label class="label-radio" for="habiM"> Procesar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiN" value="0"> 
						<label class="label-radio" for="habiN"> Expresar</label>					
						<input type="checkbox" class="checkbox" name="habilidades" id="habiO" value="0">
						<label class="label-radio" for="habiO"> Escuchar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiP" value="0">
						<label class="label-radio" for="habiP"> Resolver conflictos</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiQ" value="0">
						<label class="label-radio" for="habiQ"> Solicitar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiR" value="0">
						<label class="label-radio" for="habiR"> Decidir</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiS" value="0">
						<label class="label-radio" for="habiS"> Interpretar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiT" value="0">
						<label class="label-radio" for="habiT"> Rebatir</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiU" value="0">
						<label class="label-radio" for="habiU"> Innovar</label>
						
						<input type="checkbox" class="checkbox" name="habilidades" id="habiV" value="0">
						<label class="label-radio" for="habiV"> Otras</label>
						
						<div class="hidden">
							<label for="input">¿Cuáles?</label>
							<input type="text" name="cuales" id="input" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">6. ¿Concideras que careces o carecias de alguna(s) área(s) conocimiento básica(s) (sistemas, publicidad, investigacion, manufactura, etc.), al momento de ejercer tu prefesión por primera vez, y no fue(ron) desarrollada(s) durante tu formacion profesional?</label>
					<div class="radio">
						<input type="radio" name="areas" id="areasSi" value="1">
						<label class="label-radio" for="areasSi"> Si</label>
						
						<input type="radio" name="areas" id="areasNo" value="0">
						<label class="label-radio" for="areasNo"> No</label>
					</div>
					<div class="hidden">
						<label for="">¿Cuáles?</label>
						<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
					</div>
				</div>
				<div class="form-group">
					<label for="">7. Subraya máximo cinco valores o actitudes importantes que requieres o requerias tener al momento de ejercer tu profesión por primera vez y que no fueran desarrolladas durante tu dormación profesional.</label>
					<div class="checkbox">
						
						<input type="checkbox" name="actitudes" id="actA" value="1">
						<label class="label-radio" for="actA"> Respeto</label>
						
						<input type="checkbox" name="actitudes" id="actB" value="0">
						<label class="label-radio" for="actB"> Honestidad</label>
						
						<input type="checkbox" name="actitudes" id="actC" value="0">
						<label class="label-radio" for="actC"> Lealtad</label>
						
						<input type="checkbox" name="actitudes" id="actD" value="0">
						<label class="label-radio" for="actD"> Discrecionalidad</label>
						
						<input type="checkbox" name="actitudes" id="actE" value="0">
						<label class="label-radio" for="actE"> Responsabilidad</label>
						
						<input type="checkbox" name="actitudes" id="actF" value="0">
						<label class="label-radio" for="actF"> Tolerancia</label>
						
						<input type="checkbox" name="actitudes" id="actG" value="0">
						<label class="label-radio" for="actG"> Respeto a la naturaleza</label>
						
						<input type="checkbox" name="actitudes" id="actH" value="0">
						<label class="label-radio" for="actH"> Imparcialidad</label>
						
						<input type="checkbox" name="actitudes" id="actI" value="0">
						<label class="label-radio" for="actI"> Solidalidad</label>
						
						<input type="checkbox" name="actitudes" id="actJ" value="0">
						<label class="label-radio" for="actJ"> Integridad</label>
						
						<input type="checkbox" name="actitudes" id="actK" value="0">
						<label class="label-radio" for="actK"> Disciplina</label>					
						
						<input type="checkbox" name="actitudes" id="actL" value="0">
						<label class="label-radio" for="actL"> Eficiencia</label>
						
						<input type="checkbox" name="actitudes" id="actM" value="0">
						<label class="label-radio" for="actM"> Perseverancia</label>
						
						<input type="checkbox" name="actitudes" id="actN" value="0">
						<label class="label-radio" for="actN"> Puntualidad</label>
						
						<input type="checkbox" name="actitudes" id="actO" value="0">
						<label class="label-radio" for="actO"> Calidad en el trabajo</label>
						
						<input type="checkbox" name="actitudes" id="actP" value="0">
						<label class="label-radio" for="actP"> Limpieza</label>
						
						<input type="checkbox" name="actitudes" id="actQ" value="0">
						<label class="label-radio" for="actQ"> Disponibilidad</label>
						
						<input type="checkbox" name="actitudes" id="actR" value="0">
						<label class="label-radio" for="actR"> Profesionalidad</label>
						
						<input type="checkbox" name="actitudes" id="actS" value="0">
						<label class="label-radio" for="actS"> Empatia</label>
						
						<input type="checkbox" name="actitudes" id="actT" value="0">
						<label class="label-radio" for="actT"> Honradez</label>
						
						<input type="checkbox" name="actitudes" id="actU" value="0">
						<label class="label-radio" for="actU"> Justicia</label>
						
						<input type="checkbox" name="actitudes" id="actV" value="0">
						<label class="label-radio" for="actV"> Otras</label>

						<div class="hidden">
							<label for="input">¿Cuáles?</label>
							<input type="text" name="cuales" id="input" class="form-control">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="tContrato">8. ¿Comó calificas las instalaciónes (aulas, biblioteca, sala de cómputo, laboratorios, otros), de la UTM?</label>
					<div class="radio">
						
						<input type="radio" name="instalaciones" id="instE" value="1">
						<label class="label-radio" for="instE"> Excelente</label>
						
						<input type="radio" name="instalaciones" id="instMB" value="0">
						<label class="label-radio" for="instMB"> Muy buena</label>
						
						<input type="radio" name="instalaciones" id="instB" value="0">
						<label class="label-radio" for="instB"> Buena</label>
						
						<input type="radio" name="instalaciones" id="instR" value="0">
						<label class="label-radio" for="instR"> Regular</label>
						
						<input type="radio" name="instalaciones" id="instM" value="0">
						<label class="label-radio" for="instM"> Mala</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="tContrato">9. ¿Comó calificas los servicios (escolares, y administrativos) de la UTM?</label>
					<div class="radio">
						
						<input type="radio" name="servicios" id="servE" value="1">
						<label class="label-radio" for="servE"> Excelente</label>
						
						<input type="radio" name="servicios" id="servMB" value="0">
						<label class="label-radio" for="servMB"> Muy buena</label>
						
						<input type="radio" name="servicios" id="servB" value="0">
						<label class="label-radio" for="servB"> Buena</label>
						
						<input type="radio" name="servicios" id="servR" value="0">
						<label class="label-radio" for="servR"> Regular</label>
						
						<input type="radio" name="servicios" id="servM" value="0">
						<label class="label-radio" for="servM"> Mala</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="tContrato">10. ¿Comó calificas los equipos, intrumentos, maquinaria, herramientas, y software de la UTM?</label>
					<div class="radio">
							
						<input type="radio" name="equipo" id="equipE" value="1">
						<label class="label-radio" for="equipE"> Excelente</label>
							
						<input type="radio" name="equipo" id="equipMB" value="0">
						<label class="label-radio" for="equipMB"> Muy buena</label>
							
						<input type="radio" name="equipo" id="equipB" value="0">
						<label class="label-radio" for="equipB"> Buena</label>
							
						<input type="radio" name="equipo" id="equipR" value="0">
						<label class="label-radio" for="equipR"> Regular</label>
							
						<input type="radio" name="equipo" id="equipM" value="0">
						<label class="label-radio" for="equipM"> Mala</label>
					</div>
				</div>

				<div class="form-group">
					<label for="tContrato">11. ¿Comó calificas, en general, la limpieza de la infraestructura de la UTM?</label>
					<div class="radio">
						
						<input type="radio" name="limpieza" id="limpE" value="1">
						<label class="label-radio" for="limpE"> Excelente</label>
						
						<input type="radio" name="limpieza" id="limpMB" value="0">
						<label class="label-radio" for="limpMB"> Muy buena</label>
						
						<input type="radio" name="limpieza" id="limpB" value="0">
						<label class="label-radio" for="limpB"> Buena</label>
						
						<input type="radio" name="limpieza" id="limpR" value="0">
						<label class="label-radio" for="limpR"> Regular</label>
						
						<input type="radio" name="limpieza" id="limpM" value="0">
						<label class="label-radio" for="limpM"> Mala</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">12. ¿Comó calificas, en general, la capacidad de la UTM?</label>
					<div class="radio">
						
						<input type="radio" name="capacidad" id="capE" value="1">
						<label class="label-radio" for="capE"> Excelente</label>
						
						<input type="radio" name="capacidad" id="capMB" value="0">
						<label class="label-radio" for="capMB"> Muy buena</label>
						
						<input type="radio" name="capacidad" id="capB" value="0">
						<label class="label-radio" for="capB"> Buena</label>
						
						<input type="radio" name="capacidad" id="capR" value="0">
						<label class="label-radio" for="capR"> Regular</label>
						
						<input type="radio" name="capacidad" id="capM" value="0">
						<label class="label-radio" for="capM"> Mala</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">13. ¿Comó calificas el desempeño de los docentes (transmision de los conocimientos, aclaracion de dudas, y asesorias) de la UTM?</label>
					<div class="radio">
						<input type="radio" name="desempenio" id="desempE" value="1">
						<label class="label-radio" for="desempE"> Excelente</label>
						
						<input type="radio" name="desempenio" id="desempMB" value="0">
						<label class="label-radio" for="desempMB"> Muy buena</label>
						
						<input type="radio" name="desempenio" id="desempB" value="0">
						<label class="label-radio" for="desempB"> Buena</label>
						
						<input type="radio" name="desempenio" id="desempR" value="0">
						<label class="label-radio" for="desempR"> Regular</label>
						
						<input type="radio" name="desempenio" id="desempM" value="0">
						<label class="label-radio" for="desempM"> Mala</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">14. ¿Comó calificas las tecnicas (investigación, análisis, comparación, etc.) y metodos (uso de casos de estudio, aplicación del conocimento en ploblemas reales, etc.) de enseñanza aplicados por los docentes de la UTM?</label>
					<div class="radio">
						
						<input type="radio" name="tecYMetodos" id="tecE" value="1"> 
						<label class="label-radio" for="tecE"> Excelente</label>
						
						<input type="radio" name="tecYMetodos" id="tecMB" value="0">
						<label class="label-radio" for="tecMB"> Muy buena</label>
						
						<input type="radio" name="tecYMetodos" id="tecB" value="0"> 
						<label class="label-radio" for="tecB"> Buena</label>
						
						<input type="radio" name="tecYMetodos" id="tecR" value="0"> 
						<label class="label-radio" for="tecR"> Regular</label>
						
						<input type="radio" name="tecYMetodos" id="tecM" value="0"> 
						<label class="label-radio" for="tecM"> Mala</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">15. ¿Comó calificas la forma de evaluación aplicados por los docentes de la UTM?</label>
					<div class="radio">
						<input type="radio" name="evaluacion" id="evalE" value="1">
						<label class="label-radio" for="evalE"> Excelente</label>
						
						<input type="radio" name="evaluacion" id="evalMB" value="0">
						<label class="label-radio" for="evalMB"> Muy buena</label>
						
						<input type="radio" name="evaluacion" id="evalB" value="0">
						<label class="label-radio" for="evalB"> Buena</label>
						
						<input type="radio" name="evaluacion" id="evalR" value="0">
						<label class="label-radio" for="evalR"> Regular</label>
						
						<input type="radio" name="evaluacion" id="evalM" value="0">
						<label class="label-radio" for="evalM"> Mala</label>
					</div>
				</div>
				<div class="form-group">
					<label for="tContrato">16. ¿Continuarias realizando algun estudio de posgrado en la Universidad Tecnológica de la Mixteca?</label>
					<div class="radio">
						<input type="radio" name="estPosgrado" id="estPSi" value="1">
						<label class="label-radio" for="estPSi"> Si</label>
						
						<input type="radio" name="estPosgrado" id="estPNo" value="0">
						<label class="label-radio" for="estPNo"> No</label>
					</div>
					@if ($dato == "AA")
						<label for="">¿Por qué?</label>
						<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
					@endif
				</div> 
				<div class="form-group">
					<label for="doctorado">¿Que recomendarias mejorar en cada una de las opciones que calificaste como regular o malo?</label>
					<textarea name="" id="doctorado" class="form-control" rows="3" required="required"></textarea>
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