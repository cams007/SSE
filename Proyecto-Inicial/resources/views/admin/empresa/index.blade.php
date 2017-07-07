@extends('admin.layouts.master')

@section('title', 'Empresas')

@section('style')

<link href="{{ url('css/ranking.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Empresas</p>

		</div><!--div-1-->
		
		<a href="{{url('/admin/crearEmpresa')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--crear Alumno-->
		<table> <!--Contenido de la pagina-->
			<tr>
				<td>Nombre</td>
				<td>ubicación</td>
				<td>Sector</td>
				<td>Acción</td>
			</tr>
			<tr>
				<td>Kada</td>
				<td>pemsamientos</td>
				<td>privado</td>
				<td>
					<a href="{{url('/admin/editarEmpresa')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/user0.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
			<tr>
				<td>Oracle</td>
				<td>zaragoza #20</td>
				<td>privado</td>
				<td>
					<a href="{{url('/admin/editarEmpresa')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/user0.png') }}" alt=""></a><!--Eliminar-->
				</td>
			</tr>
			<tr>
          		<td>IBM</td>
				<td>J. mujica #74</td>
          		<td>Privado</td>
          		<td>
          			<a href="{{url('/admin/editarEmpresa')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--editar-->
          			<a href=""><img src="{{ url('assets/images/user0.png') }}" alt=""></a><!--Eliminar-->
          		</td>
          	</tr>
          	<tr>
          		<td>CFE</td>
          		<td>lirios #1</td>
          		<td>Publico</td>
          		<td>
          			<a href="{{url('/admin/editarEmpresa')}}"><img src="{{ url('assets/images/empresa_estrella_full.png') }}" alt=""></a><!--editar-->
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