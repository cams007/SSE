@extends('admin.layouts.master')

@section('title', 'index')


@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
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
			<tr>
				<td>Nombre</td>
				<td>Lugar</td>
				<td>Fecha</td>
				<td>Tipo</td>
				<td>Acción</td>
			</tr>
			@foreach($eventos as $evento)
			<tr>
				<td>{{ $evento->nombre}}</td>
				<td>{{ $evento->lugar }}</td>
				<td>{{ $evento->fecha }}</td>
				<td>{{ $evento->categoria}}</td>
				<td>
					<a href="{{route('admin.editarEvento', $evento)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar--><!--accedemos al name de la ruta-->
          			<a href="{{route('admin.eliminarEvento', $evento)}}"><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
	        @endforeach
         </table><!--Fin del contenido de la pagina-->

		<div class="div-5"><!--div-5--><!--Paginador-->
			<?php if (isset($_GET['q'])){ ?>
			{!! $eventos->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
				{!! $eventos->render() !!}
			<?php } ?>
		</div><!--div-5--><!--Fin del paginador-->
	</div><!--contenedor-->

@stop