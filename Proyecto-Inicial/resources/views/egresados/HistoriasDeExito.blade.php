@extends('layouts.master')

@section('title', 'Historias de Éxito')

@section('style')
	<link href="{{ url('css/historiasExito.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/ofertas.css') }}" rel="stylesheet"> -->
@stop

@section('content')
<div class="contenedor"><!--contenedor-->

	<div class="div-1"><!--div-1-->
		<p class="text-center">Historias de Éxito</p>

	</div><!-- div-1 -->

	<div class="div-2"><!--div-2-->

			<div class="historia">

			 		<div class="foto-1"><!--figura1-->
			 		</div><!--figura1-->

				<div class="div-2-2">
			 		<div class="titulo">
						<p>ENACTUS 2015 primer lugar</p>
					</div>
					<div class="descripcion">
						<p class="texto-descripcion">Los miembros de la Comisión de Premios 2016-2018 de la Sociedad Mexicana de Biotecnología y Bioingeniería (SMBB), seleccionó al ...</p>
					</div>
					<div class="click">
						<div class="alineacion-link">
						<a href="">[Seguír leyendo]</a>
					</div>
					</div>
				</div><!--div-2-2-2-->

		</div><!--historia-->


		<div class="historia">

				<div class="foto-2"><!--figura1-->
				</div><!--figura1-->

			<div class="div-2-2">
				<div class="titulo">
					<p>CHI 2017</p>
				</div>
				<div class="descripcion">
					<p class="texto-descripcion">Los miembros de la Comisión de Premios 2016-2018 de la Sociedad Mexicana de Biotecnología y Bioingeniería (SMBB), seleccionó al ...</p>
				</div>
				<div class="click">
					<div class="alineacion-link">
					<a href="">[Seguír leyendo]</a>
				</div>
				</div>
			</div><!--div-2-2-2-->

		</div><!--historia-->

		<div class="historia">

				<div class="foto-3"><!--figura1-->
				</div><!--figura1-->

			<div class="div-2-2">
				<div class="titulo">
					<p>Premio CENEVAL</p>
				</div>
				<div class="descripcion">
					<p class="texto-descripcion">Los miembros de la Comisión de Premios 2016-2018 de la Sociedad Mexicana de Biotecnología y Bioingeniería (SMBB), seleccionó al ...</p>
				</div>
				<div class="click">
					<div class="alineacion-link">
					<a href="">[Seguír leyendo]</a>
				</div>
				</div>
			</div><!--div-2-2-2-->

	</div><!--historia-->

	<div class="historia">

			<div class="foto-4"><!--figura1-->
			</div><!--figura1-->

		<div class="div-2-2">
			<div class="titulo">
				<p>Concurso nacional de Tesis</p>
			</div>
			<div class="descripcion">
				<p class="texto-descripcion">Los miembros de la Comisión de Premios 2016-2018 de la Sociedad Mexicana de Biotecnología y Bioingeniería (SMBB), seleccionó al ...</p>
			</div>
			<div class="click">
				<div class="alineacion-link">
				<a href="">[Seguír leyendo]</a>
			</div>
			</div>
		</div><!--div-2-2-2-->

</div><!--historia-->

</div><!-- div-2 -->
		<!-- Paginación -->
	<div class="div-3">
		<div class="paginate">
			<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
      	<a class="page" href="#">1</a>
      	<a class="active" href="#">2</a>
      	<a class="page" href="#">3</a>
      	<a class="page" href="#">4</a>
      	<a class="page" href="#">5</a>
      	<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
			</div>
		</div><!--div-3-->

</div><!--contenedor-->

@stop