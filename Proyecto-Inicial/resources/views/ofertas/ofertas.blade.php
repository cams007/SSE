
@extends('layouts.master')
@section('content')

<title>Ofertas laborales</title>
<h1 class="text-center">Ofertas laborales</h1>
	
<section class="block">

	<!-- Filtros -->
	<div class="filtro_1">
		<p class="titulo_select">Ubicación</p>
		<select name="Calificacion">
		  <option value="volvo">CDMX</option>
		  <option value="saab">Oaxaca</option>
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
		  <th>Descrición</th>
		</tr>
		 
		<tr>
		  <td>Hoy</td>
		  <td>Desarrollador web</td>
		  <td><a href="#">Grupo GSI</a></td>
		  <td>CDMX</td>
		  <td>Descripción del empleo, requisitos técnicos</td>
		</tr>
		 
		<tr>
		  <td>Hoy</td>
		  <td>Desarrollador java</td>
		  <td><a href="#">KadaSoftware</a></td>
		  <td>Huajuapan del León, Oaxaca</td>
		  <td>Descripción del empleo, requisitos técnicos</td>
		</tr>
		 
		<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
		<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
		<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
		<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
		
	</table>

</section>
	
@stop