@extends('admin.layouts.master')

@section('title', 'Tip y consejo')


@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/cssadmin/tableAdmin.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/modalAdmin.css') }}" rel="stylesheet">
	<link href="{{ url('css/cssadmin/tips.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/empresa.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
	<script src="{{ url('js/admin/tips.js') }}"></script>
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
			<p>Tips y consejos</p>
		</div><!--div-1-->

		@include('admin.partials.messages')<!--Mensages -->

		<div class="div-2-2-1"> <!--inicio div-2-2-1-->
			<div>
				<a href="{{url('/admin/tipConsejo/crearTipConsejo')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!--Button crear historia, acceder por medio de la url-->
			</div>
		
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
			</thead>
			<!--Recibimos del controlador TipsYConsejosAdminController $tips-->
			<tbody>
			@foreach($tips as $tip)
				<tr data-tip="{{$tip}}">
					<td><a href="#verTip" class="btn-show">{{ $tip->titulo}}</a></td>
					<td>
						<?php
							$imp = substr( $tip->descripcion, 0, 20 );
							echo $imp;
						?>
					</td><!--se muestran 20 caracteres de la descripción-->
					<td>
						<a href="{{route('admin.editarTipConsejo', $tip)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar--><!--accedemos al name de la ruta-->
						<a href="#eliminarTip" class="btn-showDelete"><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a>
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

	<!--Ventana emergente para eliminar-->
	<div id="eliminarTip" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Eliminar Tip</p>
			</div><!--parte-1-->

			<form action="{{route('admin.eliminarTipConsejo.submit')}}" method="post">
				<div class="parte-2"><!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

					<div class="descripcion" id="t_id"></div>

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="t_titulo"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="t_descripcion"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="t_imgen"></div><!--descripcion-->
					</div><!--item-1-->

					<!--<a href="{{ URL::previous() }}">Volver</a>-->
					<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
					<button type="submit" class="flat">Enviar</button>
				</div>
			</form>

		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

	<!--Ventana emergente para ver-->
	<div id="verTip" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Ver Tip</p>
			</div><!--parte-1-->

			<div class="parte-2"><!--parte-2-->
				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="tv_titulo"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="tv_descripcion"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="tv_imgen"></div><!--descripcion-->
				</div><!--item-1-->

					<!--<a href="{{ URL::previous() }}">Volver</a>-->
				<a href="#close"><button type="button" class="flat-secundario">Regresar</button></a>
			</div>
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->
@stop