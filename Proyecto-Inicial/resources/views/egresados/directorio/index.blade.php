@extends('layouts.master')

@section('title', 'Directorio de empresas')

@section('style')
	<link href="{{ url('css/empresa.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/directorio.js') }}"></script>
@stop

@section('content')
<div class="contenedor"><!--contenedor-->

    <div class="div-1"><!--div-1-->
		<p class="text-center">Directorio de empresas</p>
	</div><!--div-1-->

    <div class="buscador_empresas"> <!-- Buscador -->
        {!! Form::open(['url' => 'directorio', 'method' => 'GET', 'role' => 'search']) !!}
			{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de empresas']) !!}
		{!! Form::close() !!}
    </div>
    <div class="se-encontraron">
      <p>Se encontraron {{ $empresas->total() }} empresas</p>
    </div>
    <div class="listado"><!--listado-->

		<ul>
			@foreach($empresas as $empresa)
				<li data-empresa="{{ $empresa }}" data-contacto="{{ $empresa->contacto }}" class="list">
					<div class="contenedor-empresa" ><!--contenedor-empresa-->
						<div class="estrella-empresa"><!--estrella-empresa-->
							<div class="nombre_empresa">
								<a href="#datosEmpresa" class="btn-empresa">{{ $empresa->nombre }}</a>
							</div>
							<div class="calificacion_empresa">
								<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
								<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
							</div>
						</div><!--estrella-empresa-->
						<div class="texto-descripcion"><!--texto-descripcion-->
							<p class="descripcion">{{ $empresa->descripcion }}</p>
						</div><!--texto descripcion-->
			        </div> <!--contenedor-empresa-->
				</li>
			@endforeach
		</ul>


	</div><!--listado-->

	<?php if (isset($_GET['q'])){ ?>
	{!! $empresas->appends(['q' => $_GET["q"]])->render() !!}
	<?php }else{ ?>
		{!! $empresas->render() !!}
	<?php } ?>

</div><!--contenedor-->


<div id="datosEmpresa" class="modaloverlay"> <!-- div-modaloverlay -->
	<div class="modal"> <!-- div-modal -->
		<a href="#close" class="close">&times;</a>
		<!-- <div> -->
		<div class="parte-1"><!--parte-1-->
			<p class="txt">Datos de empresa</p>
		</div><!--parte-1-->

		<form action="{{ url('directorio/empresa') }}" method="get">
			<div class="parte-2"><!--parte-2-->
				<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

				<div class="descripcion" id="id"></div>

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="e_nombre"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos"></div>
					<div class="descripcion" id="e_direccion"></div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion" id="e_telefono"></div><!--descripcion-->
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
					<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
					<button type="submit" class="flat aling-right" id="btn-ver">Ver</button>
				</div>
			</div><!--parte-3-->
		</form>
		<!-- </div> -->
	</div> <!-- div-modal -->
</div> <!-- div-modaloverlay -->

@stop
