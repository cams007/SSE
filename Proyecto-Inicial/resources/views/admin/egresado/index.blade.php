@extends('admin.layouts.master')

@section('title', 'index')

@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Egresados</p>

		</div><!--div-1-->
		
		<a href="{{url('/admin/egresado/crearEgresado')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!-- Button crear Egresado-->

		<table> <!--Contenido de la pagina-->
			<tr>
				<td>Matricula</td>
				<td>Nombre</td>
				<td>Carrera</td>
				<td>Acción</td>
			</tr>
			@foreach($egresados as $egresado)
			<tr>
				<td>{{$egresado->matricula}}</td>
				<td>{{$egresado->ap_paternos}}</td>
				<td>{{$egresado->preparacion->carrera}}</td>
				<td>
					<a href="{{url('/admin/egresado/editarEgresado', $egresado->matricula)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
			@endforeach
         </table>

		<div class="div-5"><!--div-5--><!-- Paginación -->
			<?php if (isset($_GET['q'])){ ?>
			{!! $egresados->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
				{!! $egresados->render() !!}
			<?php } ?>
		</div><!--div-5--><!--Fin paginacion-->
	</div><!--contenedor-->

@stop