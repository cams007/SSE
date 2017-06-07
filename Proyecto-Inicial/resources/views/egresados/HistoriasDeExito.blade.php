@extends('layouts.master')

@section('title', 'Historias de Éxito')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
	<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Historias de Éxito</h1>
	<hr class="hr">

	<div>
		<div>
			<figure>
	 			<img src="{{ url('assets/images/historiae1.jpg') }}" width="200" height="153">
			</figure>
			<a href=""><h1>premio a protocolo de tesis</h1></a>
			<p>
				Los miembros de la Comisión de Premios 2016-2018 de la Sociedad Mexicana de<br> Biotecnología y Bioingeniería (SMBB), seleccionó al Protocolo Tesis de Maestría <br> intitulado “Potencial probiótico y producción de péptidos antimicrobianos in vitro de <br> bacterias ácido lácticas del pulque” como ganador en esta categoría.<br>
			</p>
			<a href=""><p>[Seguír leyendo]</p></a>
		</div>

		<div>
			<figure>
	 			<img src="{{ url('assets/images/historiae2.jpg') }}" width="200" height="153">
			</figure>
			<a href=""><h1>PACo: An Educative Instrument to Transform Society</h1></a>
			<p>
				PACo: An Educative Instrument to Transform Society" del UsaLab: Laboratorio de <br>Usabilidad UTM que ha calificado a la ronda final en el concurso mundial de <br>estudiantes (Student Design Competition), la cual se llevará a cabo durante la <br>conferencia de CHI 2017.<br> 
			</p>
			<a href=""><p>[Seguír leyendo]</p></a>
		</div>
		
	<!-- Paginación -->
	<div class="paginate">
		<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
      	<a class="page" href="#">1</a>
      	<a class="active" href="#">2</a>
      	<a class="page" href="#">3</a>
      	<a class="page" href="#">4</a>
      	<a class="page" href="#">5</a>
      	<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
	</div>
	</div>

@stop