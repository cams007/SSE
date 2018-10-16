@extends('layouts.master')

@section('title', 'Historias de éxito')

@section('style')
	<link href="{{ url('css/historiasExito.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/ofertas.css') }}" rel="stylesheet"> -->
@stop

@section('script')
	<script src="{{ url('js/historiasExito.js') }}"></script>
@stop

@section('content')
<div class="contenedor"><!--contenedor-->

	<div class="div-1"><!--div-1-->
		<p class="text-center">Historias de éxito</p>
	</div><!-- div-1 -->

	<div class="buscador_historias"> <!-- Buscador -->
        {!! Form::open(['url' => 'historiasExito', 'method' => 'GET', 'role' => 'search']) !!}
			{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de historias']) !!}
		{!! Form::close() !!}
    </div>

		<div class="se-encontraron">
			<p>Se encontraron {{ $historias->total() }} resultados</p>
		</div>
	<div class="div-2"><!--div-2-->
		<ul class="list">
		@foreach($historias as $historia)
		<li data-historia="{{ $historia }}">
			<div class="historia">
				<div class="foto"><!--figura1-->
					<img src="{{url($historia->imagen_url)}}" class="foto">
				</div><!--figura1-->

				<div class="div-2-2">
					<div class="titulo">
						<p>{{ $historia->titulo }}</p>
					</div>
					<div class="descripcion">
						<p class="texto-descripcion">{{ $historia->descripcion }}</p>
					</div>
					<div class="click">
						<div class="alineacion-link">
							<a class="seguirLeyendo" href="#verHistoria">[Seguír leyendo]</a>
						</div>
					</div>
				</div><!--div-2-2-2-->
			</div><!--historia-->
		</li>
		@endforeach
		</ul>

	</div><!-- div-2 -->
		<!-- Paginación -->
	<div class="div-3">
		<?php if (isset($_GET['q'])){ ?>
		{!! $historias->appends(['q' => $_GET["q"]])->render() !!}
		<?php }else{ ?>
			{!! $historias->render() !!}
		<?php } ?>
	</div><!--div-3-->

</div><!--contenedor-->


<div id="verHistoria" class="modaloverlay"> <!-- div-modaloverlay -->
	<div class="modal"> <!-- div-modal -->
		<a href="#close" class="close">&times;</a>
		<!-- <div> -->
		<div class="parte-1"><!--parte-1-->
			<p class="txt" id="h_titulo"></p>
		</div><!--parte-1-->

			<div class="parte-2"><!--parte-2-->

				<div class="item-1"><!--item-1-->
					<img src="#" class="foto" id="h_imagen">
				</div><!--item-1-->

				<div class="item-1" id="h_descripcion"><!--item-1-->
				</div><!--item-1-->

			</div><!--parte-2-->

			<div class="parte-3"><!--parte-3-->
				<div class="btn-group">
					<a href="#close">Salir</a>
				</div>
			</div><!--parte-3-->
		</form>
		<!-- </div> -->
	</div> <!-- div-modal -->
</div> <!-- div-modaloverlay -->

@stop
