@extends('layouts.master')

@section('title', 'Tabulador de salarios')

@section('style')

  <link href="{{ url('css/tabuladorSalarios.css') }}" rel="stylesheet">

	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
	<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
@stop


@section('content')

	<h1 class="text-center">Tabulador de salarios</h1>
	<hr class="hr">
	<!--Filtro-->
	<div class="filtro_1">
		<p class="titulo_select1">Carrera:</p>
		<select name="carrera">
			<option value="*">Todas</option>
			<option value="ingAlimentos">Ing. en Alimentos</option>
			<option value="ingAlimentos">Ing. en Computación</option>
			<option value="ingAlimentos">Ing. en Diseño</option>
		</select>
	</div>
	<div class="filtro_3"> 							<!--cambiar la clase -->
		<p class="titulo_select">Busqueda:</p>
		<input type="text" name="BusquedaEspecifica" value="x">
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

