@extends('admin.layouts.master')

@section('title', 'Historias de éxito')


@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/cssadmin/tableAdmin.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/modalAdmin.css') }}" rel="stylesheet">
	<link href="{{ url('css/cssadmin/historias.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/empresa.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
	<script src="{{ url('js/admin/historiaDExito.js') }}"></script>
@stop

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
			<p>Historias de éxito</p>
		</div><!--div-1-->

		@include('admin.partials.messages')<!--Mensages que se muestran para al creal,eliminar,edit-->

		<div class="div-2-2-1"> <!--inicio div-2-2-1-->
			<div>
				<a href="{{url('/admin/historiasdeExito/crearHistoriaDe')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!--Button crear historia, acceder por medio de la url-->
			</div>
		
			<div class="search">
				{!! Form::open(['url' => url()->current(), 'method' => 'GET', 'role' => 'search']) !!}
					{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de eventos']) !!}
				{!! Form::close() !!}
			</div>
		</div><!--fin div-2-2-1-->

		<table> <!--Contenido de la pagina-->
			<thead>
				<td>Título</td>
				<td>Descripción</td>
				<td>Acción</td>
			</thead>
			<!--Recibimos del controlador HistoriasExito $historiaas-->
			<tbody>
				@foreach($historias as $historia)
					<tr data-historia="{{$historia}}">
						<td><a href="#verHistoria" class="btn-show">{{ $historia->titulo}}</a></td>
						<td>
							<?php
								$imp = substr( $historia->descripcion, 0, 20 );
								echo $imp;
							?>
						</td><!--se muestran 20 caracteres de la descripción-->
						<td>
							<a href="{{route('admin.editarHistoria', $historia)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar--><!--accedemos al name de la ruta-->
							<a href="#eliminarHistoria" class="btn-showDelete"><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a><!--Eliminar-->
						</td>
					</tr>
		        	@endforeach
			</tbody>
         </table><!--Fin del contenido de la pagina-->

		<div class="div-5"><!--div-5--><!--Paginador-->
			<?php if (isset($_GET['q'])){ ?>
			{!! $historias->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
				{!! $historias->render() !!}
			<?php } ?>
		</div><!--div-5--><!--Fin del paginador-->
	</div><!--contenedor-->

	<!--ventana emergente para eliminar-->
	<div id="eliminarHistoria" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Eliminar Historia de éxito</p>
			</div><!--parte-1-->

			<form action="{{route('admin.eliminarHistoria.submit')}}" method="post">
				<div class="parte-2"><!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

					<div class="descripcion" id="h_id"></div>

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="h_titulo"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="h_descripcion"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="h_imgen"></div><!--descripcion-->
					</div><!--item-1-->

					<!--<a href="{{ URL::previous() }}">Volver</a>-->
					<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
					<button type="submit" class="flat">Eliminar</button>
				</div>
			</form>
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

	<!--ventana emergente para ver-->
	<div id="verHistoria" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Ver Historia de éxito</p>
			</div><!--parte-1-->

			<div class="parte-2"><!--parte-2-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="hv_titulo"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="hv_descripcion"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="hv_imgen"></div><!--descripcion-->
				</div><!--item-1-->

					<!--<a href="{{ URL::previous() }}">Volver</a>-->
				<a href="#close"><button type="button" class="flat-secundario">Regresar</button></a>
			</div>
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

@stop