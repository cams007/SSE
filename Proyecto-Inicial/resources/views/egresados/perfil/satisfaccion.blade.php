@extends('layouts.master')

@section('title', 'Satisfacción en mi formación')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
	<link href="{{ url('css/table.css') }}" rel="stylesheet">
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')
<div class="contenedor"><!--inicio contenedor-->
	@if(Session::has('message_success'))
		<div class = "alert alert-success flashmensasse" id = "message_alert">
			<em> {!! session('message_success') !!}</em>
			<button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		</div>
	@endif

	@if(Session::has('message_danger'))
		<div class = "alert alert-danger flashmensasse" id = "message_alert">
			<em> {!! session('message_danger') !!}</em>
			<button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		</div>
	@endif

	<div class="div-1"> <!--incio div-1-->
		<p class="text-center">Mi perfil</p>
	</div><!--fin div-1-->

	<div>

		<div class="div-2"><!--inicio div-2-->
			<div class="div-2-1"><!--inicio div-2-1-->
				<aside id="cssmenu" class="column hrV">
					@include('partials.aside')
				</aside>
			</div><!--fin div-2-1-->

		<div class="column content">
			@if( $count == 0 )
				<form action="{{ url('perfil/guardarsatisfaccion') }}" method="post">
					{{ csrf_field() }}
					
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
					<!-- if no empreo no mostrar tabla -->
					<div class="form-group">
						<label for="tContrato" class="pregunta1">1. ¿Cómo calificas los siguientes aspectos de la UTM al momento de ejercer tu profesión por primera vez? (donde 1 es Mala y 5 Excelente)</label>

						<table>
							<tr>
								<th>Aspecto a evaluar</th>
								<th class="col_calif">Calificación<br>
									<span>1 = "Malo" a 5 = "Excelente"</span>
								</th>
							</tr>
							<tr>
								<td>Formación recibida</td>
								<td>
									<div class="radio">
										<input type="radio" class="radio-b" name="formacion" id="form1" value="Excelente" required>
										<label class="label-radio" for="form1"></label>

										<input type="radio" name="formacion" id="form2" value="Muy buena">
										<label class="label-radio" for="form2"></label>

										<input type="radio" name="formacion" id="form3" value="Buena">
										<label class="label-radio" for="form3"></label>

										<input type="radio" name="formacion" id="form4" value="Regular">
										<label class="label-radio" for="form4"></label>

										<input type="radio" name="formacion" id="form5" value="Mala">
										<label class="label-radio" for="form5"></label>
									</div>
								</td>
							</tr>
							<tr>
								<td>Instalaciones (aulas, biblioteca, salas de cómputo, laboratorios, otros)</td>
								<td>
									<div class="radio">

										<input type="radio" name="instalaciones" id="inst1" value="Excelente" required >
										<label class="label-radio" for="inst1"></label>

										<input type="radio" name="instalaciones" id="inst2" value="Muy buena">
										<label class="label-radio" for="inst2"></label>

										<input type="radio" name="instalaciones" id="inst3" value="Buena">
										<label class="label-radio" for="inst3"></label>

										<input type="radio" name="instalaciones" id="inst4" value="Regular">
										<label class="label-radio" for="inst4"></label>

										<input type="radio" name="instalaciones" id="inst5" value="Mala">
										<label class="label-radio" for="inst5"></label>
									</div>
								</td>
							</tr>
							<tr>
								<td>Servicios (escolares y administrativos)</td>
								<td>
									<div class="radio">

										<input type="radio" name="servicios" id="serv1" value="Excelente" required>
										<label class="label-radio" for="serv1"></label>

										<input type="radio" name="servicios" id="serv2" value="Muy buena">
										<label class="label-radio" for="serv2"></label>

										<input type="radio" name="servicios" id="serv3" value="Buena">
										<label class="label-radio" for="serv3"></label>

										<input type="radio" name="servicios" id="serv4" value="Regular">
										<label class="label-radio" for="serv4"></label>

										<input type="radio" name="servicios" id="serv5" value="Mala">
										<label class="label-radio" for="serv5"></label>
									</div>
								</td>
							</tr>
							<tr>
								<td>Equipos, instrumentos, maquinaria, herramientas y software</td>
								<td>
									<div class="radio">

										<input type="radio" name="equipos" id="equip1" value="Excelente" required>
										<label class="label-radio" for="equip1"></label>

										<input type="radio" name="equipos" id="equip2" value="Muy buena">
										<label class="label-radio" for="equip2"></label>

										<input type="radio" name="equipos" id="equip3" value="Buena">
										<label class="label-radio" for="equip3"></label>

										<input type="radio" name="equipos" id="equip4" value="Regular">
										<label class="label-radio" for="equip4"></label>

										<input type="radio" name="equipos" id="equip5" value="Mala">
										<label class="label-radio" for="equip5"></label>
									</div>
								</td>
							</tr>
							<tr>
								<td>Limpieza de la infraestructura</td>
								<td>
									<div class="radio">
										<input type="radio" name="limpieza" id="limp1" value="Excelente" required>
										<label class="label-radio" for="limp1"></label>

										<input type="radio" name="limpieza" id="limp2" value="Muy buena">
										<label class="label-radio" for="limp2"></label>

										<input type="radio" name="limpieza" id="limp3" value="Buena">
										<label class="label-radio" for="limp3"></label>

										<input type="radio" name="limpieza" id="limp4" value="Regular">
										<label class="label-radio" for="limp4"></label>

										<input type="radio" name="limpieza" id="limp5" value="Mala">
										<label class="label-radio" for="limp5"></label>
									</div>
								</td>
							</tr>
							<tr>
								<td>Capacidad de la infraestructura</td>
								<td>
									<div class="radio">

										<input type="radio" name="infraestructura" id="infrae1" value="Excelente" required>
										<label class="label-radio" for="infrae1"></label>

										<input type="radio" name="infraestructura" id="infrae2" value="Muy buena">
										<label class="label-radio" for="infrae2"></label>

										<input type="radio" name="infraestructura" id="infrae3" value="Buena">
										<label class="label-radio" for="infrae3"></label>

										<input type="radio" name="infraestructura" id="infrae4" value="regular">
										<label class="label-radio" for="infrae4"></label>

										<input type="radio" name="infraestructura" id="infrae5" value="Mala">
										<label class="label-radio" for="infrae5"></label>
									</div>
								</td>
							</tr>
							<tr>
								<td>Desempeño de los docentes (transmisión de conocimientos, aclaración de dudas y asesorías)</td>
								<td>
									<div class="radio">

										<input type="radio" name="desempenio" id="desemp1" value="Excelente" required>
										<label class="label-radio" for="desemp1"></label>

										<input type="radio" name="desempenio" id="desemp2" value="Muy buena">
										<label class="label-radio" for="desemp2"></label>

										<input type="radio" name="desempenio" id="desemp3" value="Buena">
										<label class="label-radio" for="desemp3"></label>

										<input type="radio" name="desempenio" id="desemp4" value="Regular">
										<label class="label-radio" for="desemp4"></label>

										<input type="radio" name="desempenio" id="desemp5" value="Mala">
										<label class="label-radio" for="desemp5"></label>
									</div>
								</td>
							</tr>
							<tr>
								<td>Técnicas (investigación, análisis, comparación, etc.) y métodos (uso de casos de estudio, aplicación del conocimiento en problemas reales, etc.) de enseñanza aplicados por los Docentes</td>
								<td>
									<div class="radio">
										<input type="radio" name="tecnicas" id="tec1" value="Excelente" required>
										<label class="label-radio" for="tec1"></label>

										<input type="radio" name="tecnicas" id="tec2" value="Muy buena">
										<label class="label-radio" for="tec2"></label>

										<input type="radio" name="tecnicas" id="tec3" value="Buena">
										<label class="label-radio" for="tec3"></label>

										<input type="radio" name="tecnicas" id="tec4" value="Regular">
										<label class="label-radio" for="tec4"></label>

										<input type="radio" name="tecnicas" id="tec5" value="Mala">
										<label class="label-radio" for="tec5"></label>
									</div>
								</td>
							</tr>
							<tr>
								<td>Forma y pertinencia de evaluación aplicados por los Docentes</td>
								<td>
									<div class="radio">
										<input type="radio" name="pertinencia" id="pert1" value="Excelente" required>
										<label class="label-radio" for="pert1"></label>

										<input type="radio" name="pertinencia" id="pert2" value="Muy buena">
										<label class="label-radio" for="pert2"></label>

										<input type="radio" name="pertinencia" id="pert3" value="Buena">
										<label class="label-radio" for="pert3"></label>

										<input type="radio" name="pertinencia" id="pert4" value="Regular">
										<label class="label-radio" for="pert4"></label>

										<input type="radio" name="pertinencia" id="pert5" value="Mala">
										<label class="label-radio" for="pert5"></label>
									</div>
								</td>
							</tr>
						</table>
					</div>

					<div class="form-group">
						<label>2. Selecciona máximo cinco habilidades importantes que requieres o requerías dominar al
						momento de ejercer tu profesión por primera vez y que no fueran desarrolladas durante tu formación profesional.</label>

						<div class="column-3">
							<div class="checkbox">
								<input type="checkbox" class="checkbox" name="actitudes[]" id="A" value="Comuninicar">
								<label class="label-radio" for="A">Comunicar</label><br>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="B" value="Dirigir">
								<label class="label-radio" for="B">Dirigir</label><br>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="C" value="Tabajo en equipo">
								<label class="label-radio" for="C">Trabajo en equipo</label>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="D" value="Identificar y resolver problemas">
								<label class="label-radio" for="D">Identificar y resolver problemas</label>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="E" value="Analizar">
								<label class="label-radio" for="E">Analizar</label> <br>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="F" value="Negociar">
								<label class="label-radio" for="F">Negociar</label>
							</div>
							<div class="checkbox">
								<input type="checkbox" class="checkbox" name="actitudes[]" id="G" value="Aprender" >
								<label class="label-radio" for="G">Aprender</label> <br>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="H" value="Ser creativo">
								<label class="label-radio" for="H">Ser creativo</label> <br>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="I" value="Proponer">
								<label class="label-radio" for="I">Proponer</label>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="J" value="Categorizar/Clasificar">
								<label class="label-radio" for="J">Categorizar/Clasificar</label>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="K" value="Describir/Explicar">
								<label class="label-radio" for="K">Describir/Explicar</label><br>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="L" value="Evaluar">
								<label class="label-radio" for="L">Evaluar</label>
							</div>
							<div class="checkbox">
								<input type="checkbox" class="checkbox" name="actitudes[]" id="M" value="Procesar">
								<label class="label-radio" for="M">Procesar</label> <br>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="N" value="Expresar">
								<label class="label-radio" for="N">Expresar</label><br>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="O" value="Escuchar">
								<label class="label-radio" for="O">Escuchar</label>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="P" value="Resolver conflictos">
								<label class="label-radio" for="P">Resolver conflictos</label>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="Q" value="Solicitar">
								<label class="label-radio" for="Q">Solicitar</label>
							</div>
							<div class="checkbox">
								<input type="checkbox" class="checkbox" name="actitudes[]" id="R" value="Decidir">
								<label class="label-radio" for="R">Decidir</label>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="S" value="Interpretar">
								<label class="label-radio" for="S">Interpretar</label>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="T" value="Debatir">
								<label class="label-radio" for="T">Debatir</label><br>

								<input type="checkbox" class="checkbox" name="actitudes[]" id="U" value="Innovar">
								<label class="label-radio" for="U">Innovar</label> <br>
							</div>
						</div>
					</div>

					<div class="form-group ">
						<label>3. Subraya máximo cinco valores o actitudes importantes que requieres o requerías tener al 
						momento de ejercer tu profesión por primera vez y que no fueron desarrolladas durante tu formación profesional.</label>
						<div class="column-3">
							<div class="checkbox">
								<input type="checkbox" class="checkbox2" name="valores[]" id = "valA" value="Respeto" >
								<label class="label-radio" for="valA">Respeto</label><br>
								
								<input type="checkbox" class="checkbox2" name="valores[]" id = "valB" value="Honestidad">
								<label class="label-radio" for = "valB">Honestidad</label> <br>
								
								<input type="checkbox" class="checkbox2" name="valores[]" id = "valC" value="Lealtad">
								<label class="label-radio" for="valC">Lealtad</label>
								
								<input type="checkbox" class="checkbox2" name="valores[]" id = "valD" value="Discrecionalidad">
								<label class="label-radio" for ="valD">Discrecionalidad</label>
								
								<input type="checkbox" class="checkbox2" name="valores[]" id = "valE" value="Responsabilidad">
								<label class="label-radio" for = "valE">Responsabilidad</label>
								
								<input type="checkbox" class="checkbox2" name="valores[]" id = "valF" value="Tolerancia">
								<label class="label-radio" for="valF">Tolerancia</label>
							</div>
							<div class="checkbox">
								<input type="checkbox" class="checkbox2" name="valores[]" id = "valG" value="Respeto a la naturaleza">
								<label class="label-radio" for="valG">Respeto a la naturaleza</label>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Imparcialidad" id = "valH">
								<label class="label-radio" for="valH">Imparcialidad</label>
								
								<input type="checkbox" class="checkbox2" name="valores[]" value="Solidalidad" id = "valI">
								<label class="label-radio" for="valI">Solidaridad</label> <br>
								
								<input type="checkbox" class="checkbox2" name="valores[]" value="Integridad" id = "valJ">
								<label class="label-radio" for="valJ">Integridad</label>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Disciplina" id = "valK">
								<label class="label-radio" for="valK">Disciplina</label> <br>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Eficiencia" id = "valL">
								<label class="label-radio" for="valL">Eficiencia</label>
							</div>
							<div class="checkbox">

								<input type="checkbox" class="checkbox2" name="valores[]" value="Perseverancia" id = "valM">
								<label class="label-radio" for="valM">Perseverancia</label>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Puntualidad" id = "valN">
								<label class="label-radio" for="valN">Puntualidad</label>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Calidad en el trabajo" id = "valO">
								<label class="label-radio" for="valO">Calidad en el trabajo</label>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Limpieza" id = "valP">
								<label class="label-radio" for="valP">Limpieza</label> <br>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Disponibilidad" id = "valQ">
								<label class="label-radio" for="valQ">Disponibilidad</label>
							</div>
							<div class="checkbox">

								<input type="checkbox" class="checkbox2" name="valores[]" value="Profesionalidad" id = "valR">
								<label class="label-radio" for="valR">Profesionalidad</label>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Empatia" id = "valS">
								<label class="label-radio" for="valS"> Empatia</label>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Honradez" id = "valT">
								<label class="label-radio" for="valT">Honradez</label>

								<input type="checkbox" class="checkbox2" name="valores[]" value="Justicia" id = "valU">
								<label class="label-radio" for="valU">Justicia</label> <br>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="tContrato">4. ¿Continuarías realizando algún estudio de posgrado en la Universidad Tecnológica de la Mixteca?</label>
						<div class="radio">
							<input type="radio" name="estPost" id="estPostSi" value="Sí" required>
							<label class="label-radio" for="estPostSi">Si</label>

							<input type="radio" name="estPost" id="estPostNo" value="No">
							<label class="label-radio" for="estPostNo">No</label>
						</div>
						<div class="hidden">
							<label for="">¿Por qué?</label>
							<input type="text" name="" id="input" class="form-control" value="" title="">
						</div>
					</div>
					
					<div class="btn-guardar">
						<button type = "submit" class="flat">Guardar</button>
					</div>
				</form>
			@else
				<label>Ya aplicó la encuesta</label>
			@endif
		</div>

	</div>
</div><!--fin contenedor-->
@stop