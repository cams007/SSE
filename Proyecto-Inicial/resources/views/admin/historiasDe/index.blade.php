@extends('admin.layouts.master')

@section('title', 'index')


@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Historias de éxito</p>

		</div><!--div-1-->
		
		<a href="{{url('/admin/historiasdeExito/crearHistoriaDe')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!--Button crear historia, acceder por medio de la url-->
		
		<table> <!--Contenido de la pagina-->
			<tr>
				<td>Titulo</td>
				<td>Descripción</td>
				<td>Acción</td>
			</tr>
			<!--Recibimos del controlador HistoriasExito $historiaas-->
			@foreach($historias as $historia)
			<tr>
				<td>{{ $historia->titulo}}</td>
				<td> <?php  $imp =substr($historia->descripcion,0,20); echo $imp;?> </td><!--se muestran 20 caracteres de la descripción-->
				<td>
					<a href="{{route('admin.editarHistoria', $historia)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar--><!--accedemos al name de la ruta-->
          			<a href=""><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
	        @endforeach
         </table><!--Fin del contenido de la pagina-->

		<div class="div-5"><!--div-5--><!--Paginador-->
			<?php if (isset($_GET['q'])){ ?>
			{!! $historias->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
				{!! $historias->render() !!}
			<?php } ?>
		</div><!--div-5--><!--Fin del paginador-->
	</div><!--contenedor-->

@stop