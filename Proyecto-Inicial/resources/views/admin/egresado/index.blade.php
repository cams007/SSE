@extends('admin.layouts.master')

@section('title', 'index')

@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop

@php
	$carrera = array(0=>'Ingeniería en Diseño',1=>'Ingeniería en Computación',2=>'Ingeniría en Alimentos',3=>'Ingeniería en Electrónica',4=>'Ingeniería en Mecatrónica',5=>'Ingeniería Industrial',6=>'Ingeniería en Física Aplicada',7=>'Licenciatura en Ciencias Empresariales',8=>'Licenciatura en Matemáticas Aplicadas',9=>'Licenciatura en Estudios Mexicanos',10=>'Ingeniería en Mecánica Automotriz');
@endphp

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Egresados</p>

		</div><!--div-1-->
		
		<a href="{{url('/admin/egresado/crearEgresado')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!-- Button crear Egresado-->
		
		@php $i =1;@endphp
		<table> <!--Contenido de la pagina-->
			<tr>
				<td>Número</td>
				<td>Matricula</td>
				<td>Nombre</td>
				<td>Carrera</td>
				<td>Acción</td>
			</tr>
			@foreach($egresados as $egresado)
			<tr>
				<td>{{$i}}</td>
				<td>{{$egresado->matricula}}</td>
				<td>{{$egresado->ap_paterno}} {{$egresado->ap_materno}} {{$egresado->nombres}}</td>
				<td>@foreach($carrera as $idn=>$nombre)
						@if($egresado->preparacion->carrera == $idn)
							{{$nombre}}
						@endif
					@endforeach
				</td>
				<td>
					<a href="{{url('/admin/egresado/editarEgresado', $egresado->matricula)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
			@php $i++; @endphp
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