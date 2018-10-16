@extends('layouts.master')

@section('title', 'Tips y consejos')

@section('style')
	<link href="{{ url('css/tipConsejos.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/ofertas.css') }}" rel="stylesheet"> -->
@stop

@section('script')
	<script src="{{ url('js/tipsConsejos.js') }}"></script>
@stop

@section('content')
<div class="contenedor"><!--contenedor-->

	<div class="div-1"><!--div-1-->
		<p class="text-center">Tips y consejos</p>

	</div><!-- div-1 -->

	<div class="buscador_tips"> <!-- Buscador -->
        {!! Form::open(['url' => 'tipsConsejos', 'method' => 'GET', 'role' => 'search']) !!}
			{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de tips']) !!}
		{!! Form::close() !!}
    </div>
		<div class="se-encontraron">
			<p>Se encontraron {{ $tips->total() }} resultados</p>
		</div>
	<div class="div-2"><!--div-2-->

		<ul class="list">
		@foreach($tips as $tip)
		<li data-tip="{{ $tip }}">
			<div class="tip">
				<div class="foto"><!--figura1-->
					<img src="{{url($tip->imagen_url)}}" class="foto">
				</div><!--figura1-->

				<div class="div-2-2">
					<div class="titulo">
						<p>{{ $tip->titulo }}</p>
					</div>
					<div class="descripcion">
						<p class="texto-descripcion">{{ $tip->descripcion }}</p>
					</div>
					<div class="click">
						<div class="alineacion-link">
							<a class="seguirLeyendo" href="#verTip">[Seguír leyendo]</a>
						</div>
					</div>
				</div><!--div-2-2-2-->
			</div><!--tip-->
		</li>
		@endforeach
		</ul>

	</div><!-- div-2 -->
		<!-- Paginación -->
	<div class="div-3">
		<?php if (isset($_GET['q'])){ ?>
		{!! $tips->appends(['q' => $_GET["q"]])->render() !!}
		<?php }else{ ?>
			{!! $tips->render() !!}
		<?php } ?>
	</div><!--div-3-->

</div><!--contenedor-->


<div id="verTip" class="modaloverlay"> <!-- div-modaloverlay -->
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
