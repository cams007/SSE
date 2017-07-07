@extends('layouts.master')

@section('title', 'Alumnos')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Alumnos</p>

		</div><!--div-1-->
		
		<a href="{{url('/admin/crearAlumno')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--crear Alumno-->
		<table> <!--Contenido de la pagina-->
			<tr>
				<td>Matricula</td>
				<td>Nombre</td>
				<td>Carrera</td>
				<td>Acción</td>
			</tr>
			<tr>
				<td>452525</td>
				<td>Juan</td>
				<td>Ing. Computación</td>
				<td>
					<a href="{{url('/admin/editarAlumno')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/user0.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
			<tr>
				<td>123045</td>
				<td>Alejandra</td>
				<td>empresariales</td>
				<td>
					<a href="{{url('/admin/crearAlumno')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/user0.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
			<tr>
				<td>2012020085</td>
          		<td>Itzel morales pablo</td>
          		<td>Ing. diseño</td>
          		<td>
          			<a href="{{url('/admin/crearAlumno')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/user0.png') }}" alt=""></a><!--Eliminar-->
          		</td>
          	</tr>
          	<tr>
          		<td>521402102</td>
          		<td>Alma santiago morales</td>
          		<td>Ing. Computación</td>
          		<td>
          			<a href="{{url('/admin/crearAlumno')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/user0.png') }}" alt=""></a><!--Eliminar-->
          		</td>
          	</tr>
         </table>

		<div class="div-5"><!--div-5-->
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
		</div><!--div-5-->
	</div><!--contenedor-->

@stop