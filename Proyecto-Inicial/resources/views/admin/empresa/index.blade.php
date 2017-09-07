@extends('admin.layouts.master')

@section('title', 'Empresas')

@section('style')
	<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Empresas</p>
		</div><!--div-1-->
		
		@include('admin.partials.messages')<!--Mensages -->
		
		<a href="{{url('/admin/empresas/crearEmpresa')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!--Button para crear empresas-->

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
				<td>ubicación</td>
				<td>Teléfono</td>
				<td>Descripción</td>
				<td>Acción</td>
			</tr>
			@foreach($empresas as $empresa)
			<tr>
				<td>{{$empresa->nombre}}</td>
				<td>{{$empresa->ciudad}}</td>
				<td>{{$empresa->telefono}}</td>
				<td>{{$empresa->descripcion}}</td>
				<td>
					<a href="{{url('/admin/empresas/editarEmpresa',$empresa->id)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
			@endforeach
         </table>

		<div class="div-5"><!--div-5--><!-- Paginación -->
			<?php if (isset($_GET['q'])){ ?>
			{!! $empresas->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
				{!! $empresas->render() !!}
			<?php } ?>
		</div><!--div-5--><!--Fin paginacion-->
	</div><!--contenedor-->

@stop