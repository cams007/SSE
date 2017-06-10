
@extends('layouts.master')

@section('title', 'Ofertas laborales')
@section('style')
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
<link href="{{ url('css/modal.css') }}" rel="stylesheet">
<link href="{{ url('css/table.css') }}" rel="stylesheet">

@section('content')
	<div class="contenedor"><!--contenedor-->
		<div class="div-1"><!--div-1-->
			<p class="text-center">Ofertas laborales</p>
	      	<hr class="hr">
		</div><!--div-1-->
<<<<<<< HEAD
	<div>
	<!-- Filtros -->
	<!-- <div class="filtro_1"> -->
	<div class="div-2"><!--div-2-->
		<p class="titulo_select">Ubicación:</p>
	</div><!--div-2-->
	<div class="div-3"><!--div-3-->
		<select name="ubicacion" class="ubicacion">
			<option selected="">Todas</option>
		  	<option value="cdmx">CDMX</option>
		  	<option value="oaxaca">Huajuapan de León</option>
		  	<option value="oaxaca">Guadalajara, Jalisco</option>
		  	<option value="oaxaca">Pruebla, Puebla</option>
		</select>
	</div><!--div-3-->

	<!-- Resultados -->
	<div class="div-4"><!--div-4-->
	<table>
			<tr>
				<th>Fecha de publicación</th>
				<th>Título del empleo</th>
				<th>Empresa</th>
				<th>Ubicación</th>
				<th>Descripción</th>
			</tr>
			<tr>
				<td class="text_red">Hoy</td>
				<td>Desarrollador web</td>
				<td><a href="#datosEmpresa">Grupo GSI</a></td>
				<td>CDMX</td>
				<td>Descripción del empleo, requisitos... <a href="#detalleOferta" class="more_detail"> + </a></td>
			</tr>
			<tr>
				<td class="text_red">Hoy</td>
				<td>Desarrollador java</td>
				<td><a href="#datosEmpresa">KadaSoftware</a></td>
				<td>Huajuapan de León, Oaxaca</td>
				<td>Conceptos básico de java, frame... <a href="#detalleOferta" class="more_detail"> + </a></td>
			</tr>
			<tr>
				<td>09/marzo/2017</td>
				<td>Tester</td>
				<td><a href="#datosEmpresa">KadaSoftware</a></td>
				<td>Huajuapan de León, Oaxaca</td>
				<td>Descripción del empleo... <a href="#detalleOferta" class="more_detail"> + </a></td>
			</tr>
			<tr>
				<td>08/marzo/2017</td>
				<td>Profesor física</td>
				<td><a href="#datosEmpresa">Universidad de Sonora</a></td>
				<td>Hermosillo, Sonora</td>
				<td>Profesor investigador de tiempo completo... <a href="#detalleOferta" class="more_detail"> + </a></td>
			</tr>
			<tr>
				<td>02/marzo/2017</td>
				<td>Gerente ADO Huajuapan</td>
				<td><a href="#datosEmpresa">ADO Huajuapan</a></td>
				<td>Huajuapan de León, Oaxaca</td>
				<td>Prestaciones superiores a las de... <a href="#detalleOferta" class="more_detail"> + </a></td>
			</tr>
		</table>
</div><!--div-4-->

	<!-- Paginación -->
	<div class="div-5"><!--div-5-->
	<div class="paginate">
		<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
      	<a class="page" href="#">1</a>
      	<a class="active" href="#">2</a>
      	<a class="page" href="#">3</a>
      	<a class="page" href="#">4</a>
      	<a class="page" href="#">5</a>
      	<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
=======

		<!-- Filtros -->
		<div class="div-2"><!--div-2-->
			<p class="titulo_select">Ubicación</p>
		</div><!--div-2-->
		<div class="div-3"><!--div-3-->
			<select name="ubicacion" class="ubicacion">
				<option selected="">Todas</option>
			  	<option value="cdmx">CDMX</option>
			  	<option value="oaxaca">Huajuapan de León</option>
			  	<option value="oaxaca">Guadalajara, Jalisco</option>
			  	<option value="oaxaca">Pruebla, Puebla</option>
			</select>
		</div><!--div-3-->

		<div class="buscador">
            <input type="search" name="q" placeholder="Buscar">
>>>>>>> 13baa9f0e6bb83ce8f5c534d5dded8abc098ea66
        </div>

		<!-- Resultados -->
		<div class="div-4"><!--div-4-->
			<table>
				<tr>
					<th>Fecha de publicación</th>
					<th>Título del empleo</th>
					<th>Empresa</th>
					<th>Ubicación</th>
					<th>Descripción</th>
				</tr>
				<tr>
					<td class="text_red">Hoy</td>
					<td>Desarrollador web</td>
					<td><a href="#datosEmpresa">Grupo GSI</a></td>
					<td>CDMX</td>
					<td>Descripción del empleo, requisitos... <a href="#detalleOferta" class="more_detail"> + </a></td>
				</tr>
				<tr>
					<td class="text_red">Hoy</td>
					<td>Desarrollador java</td>
					<td><a href="#datosEmpresa">KadaSoftware</a></td>
					<td>Huajuapan de León, Oaxaca</td>
					<td>Conceptos básico de java, frame... <a href="#detalleOferta" class="more_detail"> + </a></td>
				</tr>
				<tr>
					<td>09/marzo/2017</td>
					<td>Tester</td>
					<td><a href="#datosEmpresa">KadaSoftware</a></td>
					<td>Huajuapan de León, Oaxaca</td>
					<td>Descripción del empleo... <a href="#detalleOferta" class="more_detail"> + </a></td>
				</tr>
				<tr>
					<td>08/marzo/2017</td>
					<td>Profesor física</td>
					<td><a href="#datosEmpresa">Universidad de Sonora</a></td>
					<td>Hermosillo, Sonora</td>
					<td>Profesor investigador de tiempo completo... <a href="#detalleOferta" class="more_detail"> + </a></td>
				</tr>
				<tr>
					<td>02/marzo/2017</td>
					<td>Gerente ADO Huajuapan</td>
					<td><a href="#datosEmpresa">ADO Huajuapan</a></td>
					<td>Huajuapan de León, Oaxaca</td>
					<td>Prestaciones superiores a las de... <a href="#detalleOferta" class="more_detail"> + </a></td>
				</tr>
			</table>
		</div><!--div-4-->

		<!-- Paginación -->
		<div class="div-5"><!--div-5-->
		<div class="paginate">
			<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
	      	<a class="page" href="#">1</a>
	      	<a class="active" href="#">2</a>
	      	<a class="page" href="#">3</a>
	      	<a class="page" href="#">4</a>
	      	<a class="page" href="#">5</a>
	      	<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
	        </div>
       </div><!--div-5-->
	</div><!--contenedor-->


	<div id="datosEmpresa" class="modaloverlay">
	  	<div class="modal">
		    <a href="#close" class="close">&times;</a>
		    <div>
		    	<h1>Datos de empresa</h1>
		    	<form action="#">
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
						<button type="button" class="flat-secundario">Salir</button>
					</div>
		    	</form>
		    </div>
		</div>
	</div>


	<div id="detalleOferta" class="modaloverlay">
	  	<div class="modal">
		    <a href="#close" class="close">&times;</a>
		    <div>
		    	<h1>Detalles de oferta</h1>
		    	<form action="#">
			    	<div>
						<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos">
						<h2> {{" Desarrollador web "}} </h2>
						<h4>Grupo GSI</h4>
					</div>

					<div>
						<!-- <img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos">  -->
						<span> {{" Grupo GSI, empresa mexicana fundada en el año de 2004, reconocida por su experiencia y calidad al brindar servicios de Tecnología de Información. Solicita: Desarrollador web"}} </span>
						<p>Licenciatura terminada en Ing. en Sistemas, Informática, Ciencias de la Computación o afín. Experiencia mínima de 2 años.</p>
					</div>

					<div>
						<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos">
						<span> {{" $25,000 - $30,000"}} </span>
					</div>

					<div>
						<img src="{{ url('assets/images/empresa_puesto.png') }}" alt="" class="iconos">
						<span> {{" Ciudad de México (Distrito Federal) "}} </span>
					</div>
					<div class="btn-group">
						<button type="button" class="flat-secundario aling-left">Cancelar</button>
						<button type="button" class="flat aling-right">Postularme</button>
					</div>
		    	</form>
		    </div>
		</div>
	</div>


@stop
