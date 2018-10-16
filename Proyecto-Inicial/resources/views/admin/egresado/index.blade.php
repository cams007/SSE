@extends('admin.layouts.master')

@section('title', 'index')

@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/cssadmin/tableAdmin.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/modalAdmin.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/empresa.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/egresados.css') }}" rel="stylesheet">
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/admin/egresado.js') }}"></script>
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@php
	$carrera = array(
		0=>'Ingeniería en Diseño',
		1=>'Ingeniería en Computación',
		2=>'Ingeniería en Alimentos',
		3=>'Ingeniería en Electrónica',
		4=>'Ingeniería en Mecatrónica',
		5=>'Ingeniería Industrial',
		6=>'Ingeniería en Física Aplicada',
		7=>'Licenciatura en Ciencias Empresariales',
		8=>'Licenciatura en Matemáticas Aplicadas',
		9=>'Licenciatura en Estudios Mexicanos',
		10=>'Ingeniería en Mecánica Automotriz'
	);
@endphp

@section('content')
	<div class="contenedor"><!-- contenedor -->
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

		<div class="div-1">
			<p>Egresados</p>
		</div><!--div-1-->

		<a href="{{url('/admin/egresado/reporte', $valor) }}" target="_blank" class="pdf">Descargar PDF</a><!--editar-->
		
		<div class="div-2-2-1"> <!--inicio div-2-2-1-->
			<div>
				<a href="{{url('/admin/egresado/crearEgresado')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!-- Button crear Egresado-->
			</div>
		

			<div class="search">
				{!! Form::open(['url' => url()->current(), 'method' => 'GET', 'role' => 'search']) !!}
					{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de egresados']) !!}
				{!! Form::close() !!}
			</div>
		</div><!--fin div-2-2-1-->

		@php
			$i = 1;
		@endphp
		<table> <!--Contenido de la pagina-->
			<thead>
				<td>Número</td>
				<td>Matricula</td>
				<td>Nombre</td>
				<td>Carrera</td>
				<td>Generación</td>
				<td>Acción</td>
			</thead>
			<tbody>
			@foreach($egresados as $egresado)
				<tr data-egresado="{{$egresado}}" data-preparacion="{{$egresado->preparacion}}">
					<td>{{$i}}</td>
					<td>{{$egresado->matricula}}</td>
					<td>
						<a href="#verEgresado" class="btn-show">{{$egresado->ap_paterno}} {{$egresado->ap_materno}} {{$egresado->nombres}}</a>
					</td>
					<td>{{ $carrera[ $egresado->preparacion->carrera ] }}</td>
					<td>{{ $egresado->preparacion->generacion }}</td>
					<td>
						<a href="{{url('/admin/egresado/editarEgresado', $egresado->matricula)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar-->
						<a href="#eliminarEgresado" class="btn-showDelete"><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a><!--Eliminar-->
					</td>
				</tr>
				@php
					$i++;
				@endphp

			@endforeach
			</tbody>
         </table>

		<div class="div-5"><!--div-5--><!-- Paginación -->
			<?php if (isset($_GET['q'])){ ?>
			{!! $egresados->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
				{!! $egresados->render() !!}
			<?php } ?>
		</div><!--div-5--><!--Fin paginacion-->
	</div><!--contenedor-->

	<!--Ventana emergente para eliminar-->
	<div id="eliminarEgresado" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Eliminar Egresado</p>
			</div><!--parte-1-->

			<form action="{{route('admin.eliminarEgresado.submit')}}" method="post">
				<div class="parte-2"><!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

					<div class="descripcion" id="eg_matricula"></div>

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="eg_nombreComp"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="eg_curp"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="eg_genero"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="eg_fechaNac"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="eg_nacionalidad"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="eg_telefono"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="eg_lugarOrig"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="egPr_carrera"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="egPr_generacion"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="egPr_fechaI"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="egPr_fechaF"></div><!--descripcion-->
					</div><!--item-1-->

					<!--<a href="{{ URL::previous() }}">Volver</a>-->
					<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
					<button type="submit" class="flat">Eliminar</button>
				</div>
			</form>

		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

	<!--Ventana emergente para ver-->
	<div id="verEgresado" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Ver Egresado</p>
			</div><!--parte-1-->

			<div class="parte-2"><!--parte-2-->
				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egv_nombreComp"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egv_curp"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egv_genero"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egv_fechaNac"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egv_nacionalidad"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egv_telefono"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egv_lugarOrig"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egPrv_carrera"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egPrv_generacion"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egPrv_fechaI"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="egPrv_fechaF"></div><!--descripcion-->
				</div><!--item-1-->

				<!--<a href="{{ URL::previous() }}">Volver</a>-->
				<a href="#close"><button type="button" class="flat-secundario">Regresar</button></a>
			</div>
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

@stop
