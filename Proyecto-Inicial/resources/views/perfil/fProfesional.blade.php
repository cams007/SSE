@extends('layouts.master')

@section('title', 'Mis intereses')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
<link href="{{ url('css/table.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="contenedor"><!--inicio contenedor-->
	<div class="div-1"><!--inicio div-1-->
		<!-- <p>Mi Perfil</p> -->
		<h1>Mi perfil</h1>
		<hr class="hr">
	</div><!--fin div-1-->
	
	<div class="clearfix">
		
		<div class="div-2"><!--inicio div-2-->
			<div class="div-2-1"><!--inicio div-2-1-->
			<aside id="cssmenu" class="column hrV">
				@include('partials.aside')
			</aside>
		</div><!--fin div-2-1-->
		
		<div class="column content">	
			<form method="POST" action="#">			
				<div class="form-group">
					<label for="tContrato">1. ¿Qué tiempo transcurrió para que consiguieras tu primer empleo, después de haber egresado?</label>
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
					<label for="tContrato">2. ¿Qué factores dificultaron o han dificultado tu contratación, al momento de conseguir tu primer empleo?</label>
					<select name="tContrato" id="inputTContrato" class="form-control">
						<option value="" checked>---Selecionar---</option>
						<option value="0"> No tener competencias laborales</option>
						<option value="1"> No estar titulado</option>
						<option value="2"> No acreditar el examen seleccionado</option>
						<option value="3"> Ser egresado de la UTM</option>
						<option value="4"> No dominar el idioma extranjero</option>
						<option value="5"> Inhabilidades Socio-comunicativas</option>
						<option value="6"> Otras</option>
					</select>
				</div>
<!-- if no empreo no mostrar tabla -->
				<div class="form-group">
					<label for="tContrato">3. ¿Cómo calificas los siguientes aspectos de la UTM al momento de ejercer tu profesión por primera vez? (donde 1 es Mala y 5 Excelente)</label>
					
					<table>
						<tr>
							<th>Aspecto a evaluar</th>
							<th class="col_calif"> Calificación <br>
								<span>1="Malo" a 5="Excelente"</span>
							</th>
						</tr>
						<tr>
							<td>Formación recibida</td>
							<td>
								<div class="radio">
									<input type="radio" name="formacion" id="form1" value="1">
									<label class="label-radio" for="form1"></label>
									
									<input type="radio" name="formacion" id="form2" value="2">
									<label class="label-radio" for="form2"></label>
									
									<input type="radio" name="formacion" id="form3" value="3">
									<label class="label-radio" for="form3"></label>
									
									<input type="radio" name="formacion" id="form4" value="4">
									<label class="label-radio" for="form4"></label>
									
									<input type="radio" name="formacion" id="form5" value="5">
									<label class="label-radio" for="form5"></label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Instalaciones (aulas, biblioteca, salas de cómputo, laboratorios, otros)</td>
							<td>
								<div class="radio">
									
									<input type="radio" name="instalaciones" id="inst1" value="1">
									<label class="label-radio" for="inst1"></label>
									
									<input type="radio" name="instalaciones" id="inst2" value="2">
									<label class="label-radio" for="inst2"></label>
									
									<input type="radio" name="instalaciones" id="inst3" value="3">
									<label class="label-radio" for="inst3"></label>
									
									<input type="radio" name="instalaciones" id="inst4" value="4">
									<label class="label-radio" for="inst4"></label>
									
									<input type="radio" name="instalaciones" id="inst5" value="5">
									<label class="label-radio" for="inst5"></label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Servicios (escolares y administrativos)</td>
							<td>
								<div class="radio">
									
									<input type="radio" name="servicios" id="serv1" value="1">
									<label class="label-radio" for="serv1"></label>
									
									<input type="radio" name="servicios" id="serv2" value="2">
									<label class="label-radio" for="serv2"></label>
									
									<input type="radio" name="servicios" id="serv3" value="3">
									<label class="label-radio" for="serv3"></label>
									
									<input type="radio" name="servicios" id="serv4" value="4">
									<label class="label-radio" for="serv4"></label>
									
									<input type="radio" name="servicios" id="serv5" value="5">
									<label class="label-radio" for="serv5"></label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Equipos, instrumentos, maquinaria, herramientas y software</td>
							<td>
								<div class="radio">
									
									<input type="radio" name="equipos" id="equip1" value="1">
									<label class="label-radio" for="equip1"></label>
									
									<input type="radio" name="equipos" id="equip2" value="2">
									<label class="label-radio" for="equip2"></label>
									
									<input type="radio" name="equipos" id="equip3" value="3">
									<label class="label-radio" for="equip3"></label>
									
									<input type="radio" name="equipos" id="equip4" value="4">
									<label class="label-radio" for="equip4"></label>
									
									<input type="radio" name="equipos" id="equip5" value="5">
									<label class="label-radio" for="equip5"></label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Limpieza de la infraestructura</td>
							<td>
								<div class="radio">
									
									<input type="radio" name="limpieza" id="limp1" value="1">
									<label class="label-radio" for="limp1"></label>
									
									<input type="radio" name="limpieza" id="limp2" value="0">
									<label class="label-radio" for="limp2"></label>
									
									<input type="radio" name="limpieza" id="limp3" value="0">
									<label class="label-radio" for="limp3"></label>
									
									<input type="radio" name="limpieza" id="limp4" value="0">
									<label class="label-radio" for="limp4"></label>
									
									<input type="radio" name="limpieza" id="limp5" value="0">
									<label class="label-radio" for="limp5"></label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Capacidad de la infraestructura</td>
							<td>
								<div class="radio">
									
									<input type="radio" name="infraestructura" id="infrae1" value="1">
									<label class="label-radio" for="infrae1"></label>
									
									<input type="radio" name="infraestructura" id="infrae2" value="0">
									<label class="label-radio" for="infrae2"></label>
									
									<input type="radio" name="infraestructura" id="infrae3" value="0">
									<label class="label-radio" for="infrae3"></label>
									
									<input type="radio" name="infraestructura" id="infrae4" value="0">
									<label class="label-radio" for="infrae4"></label>
									
									<input type="radio" name="infraestructura" id="infrae5" value="0">
									<label class="label-radio" for="infrae5"></label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Desempeño de los docentes (transmisión de conocimientos, aclaración de dudas y asesorias)</td>
							<td>
								<div class="radio">
									
									<input type="radio" name="desempenio" id="desemp1" value="1">
									<label class="label-radio" for="desemp1"></label>
									
									<input type="radio" name="desempenio" id="desemp2" value="0">
									<label class="label-radio" for="desemp2"></label>
									
									<input type="radio" name="desempenio" id="desemp3" value="0">
									<label class="label-radio" for="desemp3"></label>
									
									<input type="radio" name="desempenio" id="desemp4" value="0">
									<label class="label-radio" for="desemp4"></label>
									
									<input type="radio" name="desempenio" id="desemp5" value="0">
									<label class="label-radio" for="desemp5"></label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Técnicas (investigación, análisis, comparación, etc.) y métodos (uso de casos de estudio, aplicación del conocimiento en problemas reales, etc.) de enseñanza aplicados por los Docentes</td>
							<td>
								<div class="radio">
									
									<input type="radio" name="tecnicas" id="tec1" value="1">
									<label class="label-radio" for="tec1"></label>
									
									<input type="radio" name="tecnicas" id="tec2" value="0">
									<label class="label-radio" for="tec2"></label>
									
									<input type="radio" name="tecnicas" id="tec3" value="0">
									<label class="label-radio" for="tec3"></label>
									
									<input type="radio" name="tecnicas" id="tec4" value="0">
									<label class="label-radio" for="tec4"></label>
									
									<input type="radio" name="tecnicas" id="tec5" value="0">
									<label class="label-radio" for="tec5"></label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Forma y pertinencia de evaluación aplicados por los Docentes</td>
							<td>
								<div class="radio">
									
									<input type="radio" name="pertinencia" id="pert1" value="1">
									<label class="label-radio" for="pert1"></label>
									
									<input type="radio" name="pertinencia" id="pert2" value="0">
									<label class="label-radio" for="pert2"></label>
									
									<input type="radio" name="pertinencia" id="pert3" value="0">
									<label class="label-radio" for="pert3"></label>
									
									<input type="radio" name="pertinencia" id="pert4" value="0">
									<label class="label-radio" for="pert4"></label>
									
									<input type="radio" name="pertinencia" id="pert5" value="0">
									<label class="label-radio" for="pert5"></label>
								</div>
							</td>
						</tr>
					</table>
				</div>

				<div class="form-group">
					<label for="tContrato">4. ¿Concideras que careces o carecias de algun(nos) conocimiento(s) básico(s), al momento de ejercer tu prefesión por primera vez, y no fue(ron) desarrollado(s) durante tu formacion profesional?</label>
					<div class="radio">
						
						<input type="radio" name="conocimientos" id="conocimSi" value="1">
						<label class="label-radio" for="conocimSi"> Si</label>
						
						<input type="radio" name="conocimientos" id="conocimNo" value="0">
						<label class="label-radio" for="conocimNo"> No</label>
					</div>
					<div class="hidden">
						<label for="">¿Cuáles?</label>
						<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
					</div>
				</div>

				<div class="form-group">
					<label for="">5. Selecciona máximo cinco habilidades importantes que requieres o requerias dominar al momento de ejercer tu profesión por primera vez y que no fueran desarrolladas durante tu dormación profesional.</label>
					
					<div class="column-3">
						<div class="checkbox">
							<input type="checkbox" class="checkbox" name="actitudes" id="A" value="1">
							<label class="label-radio" for="A"> Comuinicar</label>

							<input type="checkbox" class="checkbox" name="actitudes" id="B" value="0">
							<label class="label-radio" for="B"> dirigir	</label>
							
							<input type="checkbox" class="checkbox" name="actitudes" id="C" value="0">
							<label class="label-radio" for="C"> Tabajo en equipo	</label>
							
							<input type="checkbox" class="checkbox" name="actitudes" id="D" value="0">
							<label class="label-radio" for="D"> Identificar y resolver problemas	</label>
							
							<input type="checkbox" class="checkbox" name="actitudes" id="E" value="0">
							<label class="label-radio" for="E"> Analizar	</label>
							
							<input type="checkbox" class="checkbox" name="actitudes" id="F" value="0">
							<label class="label-radio" for="F"> Negociar	</label>
						</div>
						<div class="checkbox">
							<input type="checkbox" class="checkbox" name="actitudes" id="G" value="0">
							<label class="label-radio" for="G"> Aprender</label>

							<input type="checkbox" class="checkbox" name="actitudes" id="H" value="0">
							<label class="label-radio" for="H"> Ser creativo</label>

							<input type="checkbox" class="checkbox" name="actitudes" id="I" value="0">
							<label class="label-radio" for="I"> Proponer</label>

							<input type="checkbox" class="checkbox" name="actitudes" id="J" value="0">
							<label class="label-radio" for="J"> Categorizar/Clasificar</label>

							<input type="checkbox" class="checkbox" name="actitudes" id="K" value="0">
							<label class="label-radio" for="K"> Describir/Explicar</label>

							<input type="checkbox" class="checkbox" name="actitudes" id="L" value="0">
							<label class="label-radio" for="L"> Evaluar</label>
						</div>
						<div class="checkbox">
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="" value="0"> M) Procesar
							</label>
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="" value="0"> N) Expresar
							</label>
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="" value="0"> O) Escuchar
							</label>
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="" value="0"> P) Resolver conflictos
							</label>
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="" value="0"> Q) Solicitar
							</label>
						</div>
						<div class="checkbox">
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="" value="0"> R) Decidir
							</label>
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="" value="0"> S) Interpretar
							</label>
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="" value="0"> T) Rebatir
							</label>
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="" value="0"> U) Innovar
							</label>
							<label class="label-radio">
								<input type="checkbox" class="checkbox" name="actitudes" id="otras" value="0"> V) Otras
							</label>
							<div class="hidden">
								<label for="input">¿Cuáles?</label>
								<input type="text" name="cuales" id="input" class="form-control">
							</div>
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
					@if ($dato == "AA")
						<label for="">¿Cuáles?</label>
						<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
					@endif
				</div>
				<div class="form-group">
					<label for="">7. Subraya máximo cinco valores o actitudes importantes que requieres o requerias tener al momento de ejercer tu profesión por primera vez y que no fueran desarrolladas durante tu dormación profesional.</label>
					
					<div class="column-3">
						<div class="checkbox">
							<input type="checkbox" name="valores" id="" value="1">
							<label class="label-radio">	Respeto</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio">	Honestidad</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio">	Lealtad</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio">	Discrecionalidad</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio">	Responsabilidad</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio">	Tolerancia</label>
						</div>
						<div class="checkbox">
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Respeto a la naturaleza</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Imparcialidad</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Solidalidad</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Integridad</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Disciplina</label>
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Eficiencia</label>
						</div>
						<div class="checkbox">
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Perseverancia</label>
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Puntualidad</label>
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Calidad en el trabajo</label>
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Limpieza</label>
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Disponibilidad</label>
						</div>
						<div class="checkbox">
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Profesionalidad</label>
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Empatia</label>
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Honradez</label>
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Justicia</label>
							
							<input type="checkbox" name="valores" id="" value="0">
							<label class="label-radio"> Otras</label>
						</div>	
					</div>
					<div id="email" class="hidden">
						<label for="input">¿Cuáles?</label>
						<input type="text" name="cuales" id="input" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="tContrato">8. ¿Continuarias realizando algun estudio de posgrado en la Universidad Tecnológica de la Mixteca?</label>
					<div class="radio">
						<input type="radio" name="estPost" id="estPostSi" value="1">
						<label class="label-radio" for="estPostSi"> Si</label>
						
						<input type="radio" name="estPost" id="estPostNo" value="0">
						<label class="label-radio" for="estPostNo"> No</label>
					</div>
					<div class="hidden">
						<label for="">¿Por qué?</label>
						<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
					</div>
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
</div><!--fin contenedor-->
@stop

{{-- Crear base de datos de imagenes, 20 para train, 50 para test, reconocer y detectar rostro --}}

{{-- Cambiar select por radiobutton --}}