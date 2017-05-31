
@extends('layouts.master')

@section('title', 'Ofertas laborales')
@section('style')
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">

@section('content')

	<h1 class="text-center">Ofertas laborales</h1>
	<hr class="hr">

	<!-- Filtros -->
	<div class="filtro_1">
		<p class="titulo_select">Ubicación</p>
		<select name="ubicacion">
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
			<th>Fecha de publicación</th>
			<th>Título del empleo</th>
			<th>Empresa</th>
			<th>Ubicación</th>
			<th>Descripción</th>
		</tr>
		 
		<tr>
			<td class="text_red">Hoy</td>
			<td>Desarrollador web</td>
			<td><a href="{{url('datos_empresa')}}">Grupo GSI</a></td>
			<td>CDMX</td>
			<td>Descripción del empleo, requisitos... <a href="#" class="more_detail"> + </a></td>
		</tr>
		<tr>
			<td class="text_red">Hoy</td>
			<td>Desarrollador java</td>
			<td><a href="{{url('datos_empresa')}}">KadaSoftware</a></td>
			<td>Huajuapan de León, Oaxaca</td>
			<td>Conceptos básico de java, frame... <a href="#" class="more_detail"> + </a></td>
		</tr>
		<tr>
			<td>09/marzo/2017</td>
			<td>Tester</td>
			<td><a href="{{url('datos_empresa')}}">KadaSoftware</a></td>
			<td>Huajuapan de León, Oaxaca</td>
			<td>Descripción del empleo... <a href="#" class="more_detail"> + </a></td>
		</tr>
		<tr>
			<td>08/marzo/2017</td>
			<td>Profesor física</td>
			<td><a href="{{url('datos_empresa')}}">Universidad de Sonora</a></td>
			<td>Hermosillo, Sonora</td>
			<td>Profesor investigador de tiempo completo... <a href="#" class="more_detail"> + </a></td>
		</tr>
		<tr>
			<td>02/marzo/2017</td>
			<td>Gerente ADO Huajuapan</td>
			<td><a href="{{url('datos_empresa')}}">ADO Huajuapan</a></td>
			<td>Huajuapan de León, Oaxaca</td>
			<td>Prestaciones superiores a las de... <a href="#" class="more_detail"> + </a></td>
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