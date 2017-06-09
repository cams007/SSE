@extends('layouts.master')

@section('title', 'Tabulador de salarios')

@section('style')
<!--<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">-->
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">

@section('content')
    <div class="contenedor"><!--contenedor-->

        <p class="text-center">Directorio de empresas</p>
        <hr class="hr">

        <!-- Buscador -->
        <div class="buscador_empresas">
            <input type="search" name="q" placeholder="Busacdor de empresas">
        </div>

        <div class="listado"><!--listado-->

          <div class="contenedor-empresa"><!--contenedor-empresa-->

            <div class="estrella-empresa"><!--estrella-empresa-->
                    <div class="nombre_empresa">
                      <a href="{{url('datos_empresa')}}">KadaSoftware</a>
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
                      <a href="{{url('datos_empresa')}}">KadaSoftware</a>
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
                      <a href="{{url('datos_empresa')}}">KadaSoftware</a>
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
            <!-- Paginación -->
            <div class="paginate">
                <a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
                <a class="page" href="#">1</a>
                <a class="active" href="#">2</a>
                <a class="page" href="#">3</a>
                <a class="page" href="#">4</a>
                <a class="page" href="#">5</a>
                <a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
            </div>
    </div><!--contenedor-->

<!--
	<div id="datosEmpresa" class="modaloverlay">
	  	<div class="modal">
		    <a href="#close" class="close">&times;</a>
		    <div>
		    	<h1>Datos de empresa</h1>
		    	<form action="{{url('datos_empresa')}}" method="get">
			    	<div>
						<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos">
						<span> {{" Apple Inc. "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos">
						<span> {{" Cupertino, California, Estados Unidos "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos">
						<span> {{" 1-800-275-2273 "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos">
						<span> {{" info@apple.com "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos">
						<span> {{" Tim Cook "}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/empresa_puesto.png') }}" alt="" class="iconos">
						<span> {{" CEO "}} </span>
					</div>

					<div class="btn-group">
						<button type="button" class="flat-secundario">Cancelar</button>
						<button type="submit" class="flat aling-right">Ver</button>
					</div>
		    	</form>
		    </div>
		</div>
	</div>
-->
@stop
