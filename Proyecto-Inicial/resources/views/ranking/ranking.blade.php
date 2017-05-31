
@extends('layouts.master')

@section('title', 'Ranking de empresas')

@section('style')
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
<link href="{{ url('css/empresa.css') }}" rel="stylesheet">

@section('content')
	<h1 class="text-center">Ranking de empresas</h1>
	<p class="calificar"><a href="{{url('directorio_empresas')}}">Calificar empresa <img src="{{ url('assets/images/start_select.png') }}"></a></p>

	<hr class="hr">
		
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
		  	<td>4.9</td>
		  	<td><a href="{{url('datos_empresa')}}">Grupo GSI</a></td>
		  	<td>CDMX</td>
		  	<td>Consultoría</td>
		</tr>
		<tr>
			<td class="text_red">2</td>
		  	<td>3.2</td>
		  	<td ><a href="{{url('datos_empresa')}}">Veureka</a></td>
		  	<td>Huajuapan de León, Oax.</td>
		  	<td>Desarrollo de software</td>
		</tr>
		<tr>
			<td class="text_red">3</td>
		  	<td>4.9</td>
		  	<td ><a href="{{url('datos_empresa')}}">Lumina</a></td>
		  	<td>Puebla</td>
		  	<td>Desarrollo web</td>
		</tr>
		<tr>
			<td class="text_red">4</td>
		  	<td>4.8</td>
		  	<td ><a href="{{url('datos_empresa')}}">Veureka</a></td>
		  	<td>Huajuapan de León</td>
		  	<td>Desarrollo movil</td>
		</tr>
		<tr>
			<td class="text_red">5</td>
		  	<td>3.4</td>
		  	<td ><a href="{{url('datos_empresa')}}">Grupo Modelo</a></td>
		  	<td>Huajuapan de León</td>
		  	<td>Bebidas</td>
		</tr>
		<tr>
			<td class="text_red">6</td>
		  	<td>5</td>
		  	<td ><a href="{{url('datos_empresa')}}">Google México</a></td>
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
	
@stop