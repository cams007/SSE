
@extends('layouts.master')

@section('title', 'Ranking de empresas')

@section('content')
	<h1 class="text-center">Ranking de empresas</h1>

	<hr class="hr">
		
	<!-- Filtros -->
	<div class="filtro_3">
		<p class="titulo_select">Calificación</p>
		<select name="Calificacion">
			<option selected="">Elija una opción</option>
			<option value="saab">0 de 5</option>
			<option value="saab">1 de 5</option>
			<option value="saab">2 de 5</option>
		  	<option value="saab">3 de 5</option>
		  	<option value="saab">4 de 5</option>
		  	<option value="saab">5 de 5</option>
		</select>
	</div>
	<div class="filtro_3">
		<p class="titulo_select">Ubicación</p>
		<select name="Ubicacion">
			<option selected="">Elija una ubicación</option>
		  	<option value="volvo">CDMX</option>
		  	<option value="saab">Huajuapán de León</option>
		  	<option value="saab">Puebla</option>
		</select>
	</div>
	<div class="filtro_3">
		<p class="titulo_select">Giro de empresa</p>
		<select name="Giro">
			<option selected="">Elija un giro</option>
		  	<option value="volvo">Consultoría</option>
			<option value="saab">Desarrollo de software</option>
		</select>
	</div>
	<br>

	<!-- Resultados -->
	<table>
		<tr>
		  <th>Calificación</th>
		  <th>Nombre de la empresa</th>
		  <th>Ubicación</th>
		</tr>
		<tr>
		  <td>4/5</td>
		  <td><a href="#">Grupo GSI</a></td>
		  <td>CDMX</td>
		</tr>
		<tr>
		  <td>2/5</td>
		  <td>Veureka</td>
		  <td>Huajuapan de León, Oax.</td>
		</tr>
		<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
		
	</table>
	
@stop