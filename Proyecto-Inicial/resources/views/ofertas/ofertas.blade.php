
@extends('layouts.master')

@section('title', 'Ofertas laborales')
@section('style')
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">

@section('content')
	<div class="contenedor"><!--contenedor-->
		<div class="div-1"><!--div-1-->
			<p class="text-center">Ofertas laborales</p>
			<hr class="hr">
		</div><!--div-1-->

	<!-- Filtros -->
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

@stop
