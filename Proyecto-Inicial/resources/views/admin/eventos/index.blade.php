@extends('admin.layouts.master')

@section('title', 'index')


@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/table.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<link href="{{ url('css/empresa.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Eventos UTM</p>
		</div><!--div-1-->

		@include('admin.partials.messages')<!--Mensages -->
		
		<a href="{{url('/admin/eventos/crearEvento')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!--Button crear Evento-->

		<div class="div-2-2-1"> <!--inicio div-2-2-1-->
			<div class="search">
				{!! Form::open(['url' => url()->current(), 'method' => 'GET', 'role' => 'search']) !!}
					{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de eventos']) !!}
				{!! Form::close() !!}
			</div>
		</div><!--fin div-2-2-1-->
		
		<table> <!--Contenido de la pagina-->
			<thead>
				<td>Nombre</td>
				<td>Lugar</td>
				<td>Fecha</td>
				<td>Tipo</td>
				<td>Acción</td>
			</thead>
			<tbody>
			@foreach($eventos as $evento)
			<tr data-evento="{{$evento}}">
				<td>{{ $evento->nombre}}</td>
				<td>{{ $evento->lugar }}</td>
				<td>{{ $evento->fecha }}</td>
				<td>{{ $evento->categoria}}</td>
				<td>
					<a href="{{route('admin.editarEvento', $evento)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar--><!--accedemos al name de la ruta-->
          			<a href="#eliminarEvento" class="btn-showDelete"><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
	        @endforeach
			</tbody>
         </table><!--Fin del contenido de la pagina-->

		<div class="div-5"><!--div-5--><!--Paginador-->
			<?php if (isset($_GET['q'])){ ?>
			{!! $eventos->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
				{!! $eventos->render() !!}
			<?php } ?>
		</div><!--div-5--><!--Fin del paginador-->
	</div><!--contenedor-->

	<!--Ventana emergente para eliminar-->
	<div id="eliminarEvento" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Eliminar Evento</p>
			</div><!--parte-1-->
			
			<form action="{{route('admin.eliminarEvento.submit')}}" method="post">
				<div class="parte-2"><!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

					<div class="descripcion" id="e_id"></div>

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_nombre"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_descripcion"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_lugar"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_fecha"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_categoria"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_imgen"></div><!--descripcion-->
					</div><!--item-1-->
					
					<!--<a href="{{ URL::previous() }}">Volver</a>-->
					<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
					<button type="submit" class="flat">Eliminar</button>
				</div>
			</form>

		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

@stop

@section('script')
<script src="{{ url('js/admin/evento.js') }}"></script>
@stop