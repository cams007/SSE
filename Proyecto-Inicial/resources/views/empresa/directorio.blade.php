@extends('layouts.master')

@section('title', 'Tabulador de salarios')

@section('style')
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">
<link href="{{ url('css/modal.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="contenedor"><!--contenedor-->

    <div class="div-1"><!--div-1-->
		<p class="text-center">Directorio de empresas</p>
      	<hr class="hr">
	</div><!--div-1-->

    <div class="buscador_empresas"> <!-- Buscador -->
        <input type="search" name="q" placeholder="Buscador de empresas">
    </div>

    <div class="listado"><!--listado-->

        <div class="contenedor-empresa"><!--contenedor-empresa-->
			<div class="estrella-empresa"><!--estrella-empresa-->
				<div class="nombre_empresa">
					<a href="#datosEmpresa">KadaSoftware</a>
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
				<p class="descripcion">Empresa desarrolladora de software a la medida.</p>
			</div><!--texto descripcion-->
        </div> <!--contenedor-empresa-->

		<div class="contenedor-empresa"><!--contenedor-empresa-->
			<div class="estrella-empresa"><!--estrella-empresa-->
				<div class="nombre_empresa">
					<a href="#datosEmpresa">KadaSoftware</a>
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
				<p class="descripcion">Empresa desarrolladora de software a la medida.</p>
			</div><!--texto descripcion-->
		</div> <!--contenedor-empresa-->

		<div class="contenedor-empresa"><!--contenedor-empresa-->
			<div class="estrella-empresa"><!--estrella-empresa-->
				<div class="nombre_empresa">
					<a href="#datosEmpresa">KadaSoftware</a>
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
				<p class="descripcion">Empresa desarrolladora de software a la medida.</p>
			</div><!--texto descripcion-->
		</div> <!--contenedor-empresa-->

	</div><!--listado-->
	
	<div class="paginate"> <!-- Paginación -->
		<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
		<a class="page" href="#">1</a>
		<a class="active" href="#">2</a>
		<a class="page" href="#">3</a>
		<a class="page" href="#">4</a>
		<a class="page" href="#">5</a>
		<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
	</div> <!-- Paginación -->

</div><!--contenedor-->


<div id="datosEmpresa" class="modaloverlay"> <!-- div-modaloverlay -->
	<div class="modal"> <!-- div-modal -->
		<a href="#close" class="close">&times;</a>
		<!-- <div> -->
		<div class="parte-1"><!--parte-1-->
			<p class="txt">Datos de empresa</p>
		</div><!--parte-1-->

		<form action="{{url('datos_empresa')}}" method="get">
			<div class="parte-2"><!--parte-2-->
				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion"><!--descripcion-->
						<p class="texto-descripcion"> {{" Apple Inc. "}} </p>
					</div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion"><!--descripcion-->
						<p class="texto-descripcion">{{" Cupertino, California, Estados Unidos "}}</p>
					</div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion"><!--descripcion-->
						<p class="texto-descripcion"> {{" 1-800-275-2273 "}} </p>
					</div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion"><!--descripcion-->
						<p class="texto-descripcion">{{" info@apple.com "}} </p>
					</div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion"><!--descripcion-->
						<p class="texto-descripcion">{{" Tim Cook "}}  </p>
					</div><!--descripcion-->
				</div><!--item-1-->

				<div class="item-1"><!--item-1-->
					<div class="icono"><!--icono-->
						<img src="{{ url('assets/images/empresa_puesto.png') }}" alt="" class="iconos">
					</div><!--icono-->
					<div class="descripcion"><!--descripcion-->
						<p class="texto-descripcion">{{" CEO "}}   </p>
					</div><!--descripcion-->
				</div><!--item-1-->
			</div><!--parte-2-->

			<div class="parte-3"><!--parte-3-->
				<div class="btn-group">
					<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
					<button type="submit" class="flat aling-right">Ver</button>
				</div>
			</div><!--parte-3-->
		</form>
		<!-- </div> -->
	</div> <!-- div-modal -->
</div> <!-- div-modaloverlay -->

@stop
