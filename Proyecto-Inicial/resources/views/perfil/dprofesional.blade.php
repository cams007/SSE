@extends('layouts.master')

@section('title', 'Desarrollo profesional')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
	<h1 class="text-center">Desarrollo Profesional</h1>
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
					<td><input id="dprof" type="checkbox"></td>
				  	<td><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_empty.png')}}"></td>
				  	<td><a href="#">Grupo GSI</a></td>
				  	<td>CDMX</td>
				  	<td></td>
				</tr>
				<tr>
					<td><input id="dprof" type="checkbox"></td>
				  	<td><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_empty.png')}}"><img src="{{url('assets/images/empresa_estrella_empty.png')}}"><img src="{{url('assets/images/empresa_estrella_empty.png')}}"></td>
				  	<td>Veureka</td>
				  	<td>Huajuapan de León, Oax.</td>
				  	<td></td>
				</tr>
				<tr>
					<td><input id="dprof" type="checkbox"></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				</tr>
				<tr>
					<td><input id="dprof" type="checkbox"></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				</tr>
			</table>
		</div>

	</div>

@stop
