@extends('layouts.master')

@section('title', 'Desarrollo profesional')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Mi perfil</h1>
	<hr class="hr">
	<div class="clearfix">
		<aside class="column" id="cssmenu">
			@include('partials.aside')
		</aside>
		<div class="column content">	
			<table>
				<tr>
					<th></th>
				  	<th>Empresa en la que laboró</th>
				  	<th>Puesto</th>
				  	<th>Antigüedad</th>
				  	<th>Funciones principales</th>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
				  	<td>4/5</td>
				  	<td><a href="#">Grupo GSI</a></td>
				  	<td>CDMX</td>
				  	<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
				  	<td>2/5</td>
				  	<td>Veureka</td>
				  	<td>Huajuapan de León, Oax.</td>
				  	<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				</tr>
			</table>
		</div>
		
	</div>

@stop