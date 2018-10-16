@extends('layouts.master')

@section('title', 'Ofertas laborales')

@section('style')
	<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<link href="{{ url('css/table.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
	<script src="{{ url('js/ofertas.js') }}"></script>
	<script type="text/javascript">
		var APP_URL = {!! json_encode(url('/ofertas')) !!}
	</script>
@stop

@section('content')
<div class="contenedor"><!--contenedor-->
	
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
	
	<div class="div-1"><!--div-1-->
		<p class="text-center">Ofertas laborales</p>
	</div><!--div-1-->
	<!-- Buscador -->
	<div class="buscador_ofertas">
		{!! Form::open(['url' => 'ofertas', 'method' => 'GET', 'role' => 'search']) !!}
			{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de ofertas']) !!}
		{!! Form::close() !!}
	</div>

	<!-- Resultados -->
	<div class="se-encontraron">
		<p>Se encontraron {{ $ofertas->total() }} ofertas</p>
	</div>
	<div class="div-4"><!--div-4-->
		<table>
			<thead>
				<tr>
					<th>Fecha de publicación</th>
					<th>Título del empleo</th>
					<th>Empresa</th>
					<th>Ubicación</th>
					<th>Descripción</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ofertas as $oferta)
					<tr data-oferta="{{ $oferta }}" data-empresa="{{ $oferta->empresa }}" data-contacto="{{ $oferta->empresa->contacto }}">
						<td> {{ $oferta->created_at->diffForHumans() }} </td>
						<td>{{ $oferta->titulo_empleo }}</td>
						<td><a href="#datosEmpresa" class="btn-empresa">{{ $oferta->empresa->nombre }}</a></td>
						<td>{{ $oferta->ubicacion }}</td>
						<td>{{ $oferta->descripcion }}<a href="#detalleOferta" class="more_detail"> + </a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div><!--div-4-->
	<!-- Paginación -->
	<div class="div-5"><!--div-5-->
		@if ( Request::get('q') )
			{!! $ofertas->appends(['q' => $_GET["q"]])->render() !!}
		@else
			{!! $ofertas->render() !!}
		@endif
	</div><!--div-5-->
</div><!--contenedor-->


<div id="datosEmpresa" class="modaloverlay"> <!-- div-modaloverlay -->
	<div class="modal">
		<a href="#close" class="close">&times;</a>
		<div class="parte-1"><!--parte-1-->
			<p class="txt">Datos de la empresa</p>
		</div><!--parte-1-->

		<!-- <form action="#close"> -->
			<div class="parte-2"><!--parte-2-->
				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion" id="e_nombre"></div>
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion" id="e_direccion"></div>
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion" id="e_telefono"></div>
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion" id="e_correo"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion" id="e_contacto"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/empresa_puesto.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion" id="e_puesto"></div><!--descripcion-->
				</div><!--item-1-->
			</div><!--parte-2-->

			<div class="parte-3"><!--parte-3-->
				<div class="btn-group">
					<a href="#close"><button class="flat" href="#close">Salir</button></a>
				</div>
			</div><!--parte-3-->
		<!-- </form> -->
	<!-- </div> -->
	</div>
</div> <!-- div-modaloverlay -->

<div id="detalleOferta" class="modaloverlay">
  	<div class="modal">
	    <a href="#close" class="close">&times;</a>	  
	    	<div class="parte-1"><!--parte-1-->
			<p class="txt">Detalles de la oferta</p>
		</div><!--parte-1-->
	    	<form method="post" action="{{ url('ofertas/postularme') }}" class="detalles_ofertas">
		    	<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<div class="descripcion" id="correo_oferta"></div>
			<div class="descripcion" id="nombre_oferta"></div>
			<div class="descripcion" id="e_id"></div>

			<div>
				<div>
					<img src="{{ url('assets/images/address.png') }}">
				</div>
				<div>
					<h3 id="oferta_puesto"></h3>
					<h4 id="oferta_empresa"></h4>
					<span id="oferta_descripcion"></span>
				</div>
			</div>

			<div>				
				<div>
					<span> {{"Solicita: "}} </span>
				</div>
				<div>
					<span id="oferta_vacante"></span>
					<span id="oferta_carrera"></span><br>
					<span id="oferta_experiencia"></span>
				</div>
			</div>

			<div>
				<div>
					<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos"></p>
				</div>
				<div>
					<span id="oferta_salario"></span>
				</div>
			</div>

			<div>
				<div>
					<img src="{{ url('assets/images/empresa_puesto.png') }}" style="width: 30px; height: 30px"alt="" class="iconos"></p>
				</div>
				<div>
					<span id="oferta_ubicacion">  </span>
				</div>
			</div>

			<div class="btn-group">
				<a href="#close"><button type="button" class="flat-secundario">Cerrar</button></a>
				<button type="submit" class="flat aling-right">Postularme</button>
			</div>
	    	</form>
	    </div>
	</div>
</div>

@stop