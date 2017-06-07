
@extends('layouts.master')

@section('title', 'Ranking de empresas')

@section('style')
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">

@section('content')
	<h1 class="text-center">Ranking de empresas</h1>
	<hr class="hr">
	
	<div class="clearfix">
		<!-- Filtros -->
		<div class="filtro_3">
			<p class="titulo_select">Giro de empresa</p>
			<select name="Giro">
				<option selected="">Todas</option>
			  	<option value="volvo">Consultoría</option>
				<option value="saab">Desarrollo de software</option>
				<option value="saab">Desarrollo web</option>
				<option value="saab">Desarrollo movil</option>
			</select>
		</div>
		<div class="filtro_3">
			<p class="titulo_select">Calificación</p>
			<select name="Calificacion">
				<option selected="">Todas</option>
				<option value="saab">Menor a 2.5</option>
				<option value="saab">Mayor o igual a 2.5</option>
			</select>
		</div>
		<div class="filtro_3">
			<p class="titulo_select">Ubicación</p>
			<select name="Ubicacion">
				<option selected="">Todas</option>
			  	<option value="cdmx">CDMX</option>
			  	<option value="oaxaca">Huajuapan de León</option>
			  	<option value="oaxaca">Guadalajara, Jalisco</option>
			  	<option value="oaxaca">Pruebla, Puebla</option>
			</select>
		</div>
		<br>
		<!-- Resultados -->
		<table>
			<tr>
				<th>Lugar</th>
			  	<th>Calificación</th>
			  	<th>Nombre de la empresa</th>
			  	<th>Ubicación</th>
			  	<th>Giro de la empresa</th>
			</tr>
			<tr>
			  	<td><img src="{{ url('assets/images/trofeo.png') }}"></td>
			  	<td>
			  		<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			  	</td>
			  	<td><a href="#datosEmpresa">Grupo GSI</a></td>
			  	<td>CDMX</td>
			  	<td>Consultoría</td>
			</tr>
			<tr>
				<td class="text_red">2</td>
			  	<td>
			  		<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			  	</td>
			  	<td ><a href="#datosEmpresa"">Veureka</a></td>
			  	<td>Huajuapan de León, Oax.</td>
			  	<td>Desarrollo de software</td>
			</tr>
			<tr>
				<td class="text_red">3</td>
			  	<td>
			  		<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			  	</td>
			  	<td ><a href="#datosEmpresa">Lumina</a></td>
			  	<td>Puebla</td>
			  	<td>Desarrollo web</td>
			</tr>
			<tr>
				<td class="text_red">4</td>
			  	<td>
			  		<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			  	</td>
			  	<td ><a href="#datosEmpresa">Veureka</a></td>
			  	<td>Huajuapan de León</td>
			  	<td>Desarrollo movil</td>
			</tr>
			<tr>
				<td class="text_red">5</td>
			  	<td>
			  		<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			  	</td>
			  	<td ><a href="#datosEmpresa">Grupo Modelo</a></td>
			  	<td>Huajuapan de León</td>
			  	<td>Bebidas</td>
			</tr>
			<tr>
				<td class="text_red">6</td>
			  	<td>
			  		<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
					<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
			  	</td>
			  	<td ><a href="#datosEmpresa">Google México</a></td>
			  	<td>CDMX</td>
			  	<td>Desarrollo</td>
			</tr>
		</table>
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
	</div>



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

					<div>
						<br><br>
						<h4>Calificar esta empresa</h4>
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
						<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">
					</div>
					<div>
						<textarea name="" id="comentario" class="form-control" rows="3"></textarea>
					</div>

					<div class="btn-group">
						<button type="button" class="flat-secundario">Cancelar</button>
						<button type="button" class="flat aling-right">Guardar</button>
					</div>
		    	</form>
		    </div>
		</div>
	</div>
	
@stop