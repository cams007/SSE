@extends('admin.layouts.master')

@section('title', 'Empresas')

@section('style')
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/cssadmin/tableAdmin.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/modalAdmin.css') }}" rel="stylesheet">
	<link href="{{ url('css/cssadmin/empresas.css') }}" rel="stylesheet">
	<!-- <link href="{{ url('css/empresa.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
	<script src="{{ url('js/admin/empresa.js') }}"></script>
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
			<p>Empresas</p>
		</div><!--div-1-->
		<a href="{{url('/admin/empresas/reporte', $valor) }}" target="_blank">PDF</a><!--editar-->
		
		<div class="div-2-2-1"> <!--inicio div-2-2-1-->
			<div>
				<a href="{{url('/admin/empresas/crearEmpresa')}}"><img src="{{ url('assets/images/crear.png') }}" alt=""></a><!--Button para crear empresas-->
			</div>

			<div class="search">
				{!! Form::open(['url' => url()->current(), 'method' => 'GET', 'role' => 'search']) !!}
					{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de eventos']) !!}
				{!! Form::close() !!}
			</div>
		</div><!--fin div-2-2-1-->

		<table> <!--Contenido de la pagina-->
			<thead>
				<td>Nombre</td>
				<td>ubicación</td>
				<td>Teléfono</td>
				<td>Descripción</td>
				<td>Acción</td>
			</thead>
			<tbody>
				@foreach($empresas as $empresa)
				<tr data-empresa="{{$empresa}}">
					<td><a href="#verEmpresa" class="btn-show">{{$empresa->nombre}}</a></td>
					<td>{{$empresa->ciudad}}</td>
					<td>{{$empresa->telefono}}</td>
					<td>{{$empresa->descripcion}}</td>
					<td>
						<a href="{{url('/admin/empresas/editarEmpresa',$empresa->id)}}"><img src="{{ url('assets/images/editar.png') }}" alt=""></a><!--editar-->
	          				<a href="#eliminarEmpresa" class="btn-showDelete"><img src="{{ url('assets/images/eliminar.png') }}" alt=""></a><!--Eliminar-->
					</td>
				</tr>
				@endforeach
			</tbody>
         </table>

		<div class="div-5"><!--div-5--><!-- Paginación -->
			<?php if (isset($_GET['q'])){ ?>
			{!! $empresas->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
				{!! $empresas->render() !!}
			<?php } ?>
		</div><!--div-5--><!--Fin paginacion-->
	</div><!--contenedor-->

	<!--Ventana emergente para eliminar-->
	<div id="eliminarEmpresa" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#" class="close1">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Eliminar Empresa</p>
			</div><!--parte-1-->

			<form action="{{route('admin.eliminarEmpresa.submit')}}" method="post">
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
						<div class="descripcion" id="e_rfc"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_sector"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_giro"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_tel"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_correo"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_calle"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_numero"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_colonia"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_ciudad"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_estado"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_codigoP"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_paginaWeb"></div><!--descripcion-->
					</div><!--item-1-->

					<div class="item-1"><!--item-1-->
						<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
						<div class="descripcion" id="e_imgen"></div><!--descripcion-->
					</div><!--item-1-->

					<!--<a href="{{ URL::previous() }}">Volver</a>-->
					<a href="#"><button type="button" class="flat-secundario">Cancelar</button></a>
					<button type="submit" class="flat">Eliminar</button>
				</div>
			</form>

		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

	<!--Ventana emergente para ver-->
	<div id="verEmpresa" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#" class="close1">&times;</a>
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Ver Empresa</p>
			</div><!--parte-1-->

			<div class="parte-2"><!--parte-2-->
				<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

				<div class="descripcion" id="ev_id"></div>

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_nombre"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_descripcion"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_rfc"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_sector"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_giro"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_tel"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_correo"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_calle"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_numero"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_colonia"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_ciudad"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_estado"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_codigoP"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_paginaWeb"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="ev_imgen"></div><!--descripcion-->
				</div><!--item-1-->

				<!--<a href="{{ URL::previous() }}">Volver</a>-->
				<a href="#"><button type="button" class="flat-secundario">Regresar</button></a>
			</div>
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->
@stop