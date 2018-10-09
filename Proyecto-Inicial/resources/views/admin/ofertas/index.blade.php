@extends('admin.layouts.master')

@section('title', 'Ofertas')


@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/cssadmin/tableAdmin.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/modalAdmin.css') }}" rel="stylesheet">
	<link href="{{ url('css/cssadmin/ofertas.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/empresa.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
	<!--
		Este archivo esta en public, presenta la ventana emergente
		para crear, ver y eliminar un evento
	-->
	<script src="{{ url('js/admin/ofertas.js') }}"></script>
@stop

@php
	$carrera = array(
		0=>'Ingeniería en Diseño',
		1=>'Ingeniería en Computación',
		2=>'Ingeniría en Alimentos',
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
			<p>Ofertas laborales</p>
		</div><!--div-1-->

		<a href="{{url('/admin/ofertas/reporte', $valor) }}" target="_blank" class="pdf">Descargar PDF</a><!--editar-->

		<div class="div-2-2-1"> <!--inicio div-2-2-1-->
			<div>
				<a href="{{url('/admin/ofertas/crearOferta')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!--Button crear Evento-->
			</div>
		
			<div class="search">
				{!! Form::open(['url' => url()->current(), 'method' => 'GET', 'role' => 'search']) !!}
					{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de ofertas']) !!}
				{!! Form::close() !!}
			</div>
		</div><!--fin div-2-2-1-->

		<table> <!--Contenido de la pagina-->
			<thead>
				<td>
					Puesto
				</td>
				<td class="columnados">
					Empresa
				</td>
				<td>
					Descripción
				</td>
				<td>
					Ubicación
				</td>
				<!-- <td> Salario </td> -->
				<td>
					Carrera
				</td>
				<td class="last">
					Acción
				</td>

			</thead>

			<tbody>
				@foreach( $ofertas as $oferta )
					<tr data-oferta="{{ $oferta }}" data-empresa="{{ $oferta->empresa }}">
						<td>
							<a href="#verOferta" class="btn-show">
								{{ $oferta->titulo_empleo }}
							</a>
						</td>
						<td>
							{{ $oferta->empresa->nombre }}
						</td>
						<td>
							{{ $oferta->descripcion }}
						</td>
						<td>
							{{ $oferta->ubicacion }}
						</td>
						<td>
							{{ $carrera[ $oferta->carrera ] }}
						</td>
						<td>
							<a href="{{url('/admin/ofertas/editarOferta', $oferta->id )}}">
								<img src="{{ url('assets/images/editar.png') }}" alt="">
							</a><!--editar-->
							<a href="#eliminarOferta" class="btn-showDelete">
								<img src="{{ url('assets/images/eliminar.png') }}" alt="">
							</a><!--Eliminar-->
						</td>
					</tr>
				@endforeach
			</tbody>

         	</table><!--Fin del contenido de la pagina-->

		<div class="div-5"><!--div-5--><!--Paginador-->
			<?php if (isset($_GET['q'])){ ?>
				{!! $ofertas->appends(['q' => $_GET["q"]])->render() !!}
				<?php }else{ ?>
					{!! $ofertas->render() !!}
				<?php } ?>
			</div><!--div-5--><!--Fin del paginador-->
		</div><!--contenedor-->

	<div id="verOferta" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#" class="close">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt" id = "getOferta"></p>
			</div><!--parte-1-->

			<div class="parte-2"><!--parte-2-->
				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="getEmpresa"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="getDescripcion"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="getUbicacion"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="getSalario"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="getExperiencia"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="getCarrera"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="getStatus"></div><!--descripcion-->
				</div><!--item-1-->

				<!--<a href="{{ URL::previous() }}">Volver</a>-->
				<a href="#close"><button type="button" class="flat-secundario">Regresar</button></a>
			</div>
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

	<!--Ventana emergente para eliminar-->
	<div id="eliminarOferta" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#" class="close1">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt" id = "getOfertaD"></p>
			</div><!--parte-1-->

			<form action="{{route('admin.eliminarOferta.submit')}}" method="post">
				<div class="parte-2"><!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
					
					<div class="descripcion" id="oferta_id"></div>

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="getEmpresaD"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="getDescripcionD"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="getUbicacionD"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="getSalarioD"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="getExperienciaD"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="getCarreraD"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="getStatusD"></div><!--descripcion-->
					</div><!--item-1-->

					<!--<a href="{{ URL::previous() }}">Volver</a>-->
					<a href="#close">
						<button type="button" class="flat-secundario">Cancelar</button>
					</a>
					<button type="submit" class="flat">Eliminar</button>
				</div>
			</form>

		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

@stop