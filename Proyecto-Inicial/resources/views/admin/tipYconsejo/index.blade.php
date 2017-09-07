@extends('admin.layouts.master')

@section('title', 'index')


@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/table.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Tips y consejos</p>
		</div><!--div-1-->

		@include('admin.partials.messages')<!--Mensages -->
		
		<a href="{{url('/admin/tipConsejo/crearTipConsejo')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!--Button crear historia, acceder por medio de la url-->

		<div class="div-2-2-1"> <!--inicio div-2-2-1-->
			<div class="search">
				{!! Form::open(['url' => url()->current(), 'method' => 'GET', 'role' => 'search']) !!}
						{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de eventos']) !!}
				{!! Form::close() !!}
			</div>
		</div><!--fin div-2-2-1-->
		
		<table> <!--Contenido de la pagina-->
			<thead>
					<td>Titulo</td>
					<td>Descripción</td>
					<td>Acción</td>
				</tr>
			</thead>
			<!--Recibimos del controlador TipsYConsejosAdminController $tips-->
			<tbody>
			@foreach($tips as $tip)
			<tr data-id="{{$tip->id}}">
				<td>{{ $tip->titulo}}</td>
				<td> <?php  $imp =substr($tip->descripcion,0,20); echo $imp;?> </td><!--se muestran 20 caracteres de la descripción-->
				<td>
					<a href="{{route('admin.editarTipConsejo', $tip)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar--><!--accedemos al name de la ruta-->
          			<button class="btn-showDelete" value="{{$tip->id}}">Eliminar</button><!--Eliminar-->
				</td>
			</tr>
	        @endforeach
	        </tbody>
         </table><!--Fin del contenido de la pagina-->

         {!! Form::open(['route' => ['admin.eliminarTipConsejo.submit', ':TIP_ID'], 'method' => 'GET', 'id' => 'form-delete']) !!}
         {!! Form::close() !!}

		<div class="div-5"><!--div-5--><!--Paginador-->
			<?php if (isset($_GET['q'])){ ?>
			{!! $tips->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
				{!! $tips->render() !!}
			<?php } ?>
		</div><!--div-5--><!--Fin del paginador-->
	</div><!--contenedor-->

	<div id="showDelete" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>

			<div class="parte-1"><!--parte-1-->
				<p class="txt">Dato del evento</p>
			</div><!--parte-1-->
			
				<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
				<input name="id" type="hidden" value="id" />
				<div>
					<h4>Titulo</h4>
					<span id="titulo_tip"></span>
				</div>

				<div>
					<h4>Descripción</h4>
					<span id="descripcion_tip"></span>
				</div>

				<div>
					<h4>imagen</h4>
					<div id="img_tip"></div>
				</div>
				<div id="respuesta">Hola</div>
		</div>
	</div>

@stop

@section('script')
<script src="{{ url('js/admin/tips.js') }}"></script>
@stop