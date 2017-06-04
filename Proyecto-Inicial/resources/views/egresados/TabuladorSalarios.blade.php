@extends('layouts.master')

@section('title', 'Tabulador de salarios')

@section('content')

	<h1 class="text-center">Tabulador de salarios</h1>
	<hr class="hr">
	<!--Filtro-->
	<div class="filtro_1">
		<p class="titulo_select">Carrera:</p>
		<select name="carrera">
			<option value="*">Todos</option>
			<option value="ingAlimentos">Ing. en Alimentos</option>
			<option value="ingAlimentos">Ing. en Computación</option>
			<option value="ingAlimentos">Ing. en Diseño</option>
		</select>
	</div>
	<!--Tabla de resultados-->
	<table>
		<tr>
		  <th>Título del empleo</th>
		  <th>Años de experiencia</th>
		  <th>Monto mínimo</th>
		  <th>Monto máximo</th>
		</tr>
		 
		<tr>
		  <td>Ingeniero Mecatrónico</td>
		  <td>2 años</td>
		  <td>8,000 mensuales</td>
		  <td>15,000 mensuales</td>
		</tr>
		 
		<tr>
		  <td>Gerente de banco</td>
		  <td>3 años</td>
		  <td>20,000 mensuales</td>
		  <td>30,000 mensuales</td>
		</tr>
		 
		<tr>
		  <td>Administrador de Base de Datos</td>
		  <td>5 años</td>
		  <td>20,000 mensuales</td>
		  <td>30,000 mensuales</td>
		</tr>
		<tr>
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
		</tr>
		<tr>
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
		</tr>
		<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		</tr>
	</table>
@stop