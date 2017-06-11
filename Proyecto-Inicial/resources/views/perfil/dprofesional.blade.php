@extends('layouts.master')

@section('title', 'Desarrollo profesional')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
<link href="{{ url('css/modal.css') }}" rel="stylesheet">
<link href="{{ url('css/table.css') }}" rel="stylesheet">
@stop

@section('content')
<<<<<<< HEAD
<<<<<<< HEAD
	<h1 class="text-center">Desarrollo Profesional</h1>
=======
	<h1>Mi perfil</h1>
>>>>>>> 0cc72541e4e8bf9a099a36271fb593705459f1b2
	<hr class="hr">
	<div class="clearfix">
		<aside class="column" id="cssmenu">
			@include('partials.aside')
		</aside>
<<<<<<< HEAD
		<div class="column content">
=======
=======
<div class="contenedor"><!--inicio contenedor-->
	<div class="div-1"><!--inicio div-1-->
		<!-- <p>Mi Perfil</p> -->
		<h1>Mi perfil</h1>
		<hr class="hr">
	</div><!--fin div-1-->
	
	<div class="clearfix">
		
		<div class="div-2"><!--inicio div-2-->
			<div class="div-2-1"><!--inicio div-2-1-->
			<aside id="cssmenu" class="column hrV">
				@include('partials.aside')
			</aside>
		</div><!--fin div-2-1-->

>>>>>>> 5b808344407bbbb4b005f8ce2049805efc05e688
		<div class="column content-lg">	
			<div class="clearfix margin">
				<div class="column">
					<a href="#addEmpleo">Agregar empleo</a>
				</div>
				<div class="aling-right">
					<a href="" class="column disabled"> Eliminar</a>
					<a href="" class="column disabled"> Editar</a>
				</div>
			</div>
	
<<<<<<< HEAD
>>>>>>> 0cc72541e4e8bf9a099a36271fb593705459f1b2
=======
>>>>>>> 5b808344407bbbb4b005f8ce2049805efc05e688
			<table>
				<tr>
					<th></th>
				  	<th>Empresa en la que laboró</th>
				  	<th>Puesto</th>
				  	<th>Antigüedad</th>
				  	<th>Funciones principales</th>
				</tr>
<<<<<<< HEAD
<<<<<<< HEAD
				<tr>
					<td><input id="dprof" type="checkbox"></td>
				  	<td><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_empty.png')}}"></td>
				  	<td><a href="#">Grupo GSI</a></td>
=======
=======
>>>>>>> 5b808344407bbbb4b005f8ce2049805efc05e688
				<tr >
					<td class="text-center"><input type="checkbox"></td>
				  	<td>4/5</td>
				  	<td>Grupo GSI</td>
<<<<<<< HEAD
>>>>>>> 0cc72541e4e8bf9a099a36271fb593705459f1b2
=======
>>>>>>> 5b808344407bbbb4b005f8ce2049805efc05e688
				  	<td>CDMX</td>
				  	<td></td>
				</tr>
				<tr>
<<<<<<< HEAD
<<<<<<< HEAD
					<td><input id="dprof" type="checkbox"></td>
				  	<td><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_full.png')}}"><img src="{{url('assets/images/empresa_estrella_empty.png')}}"><img src="{{url('assets/images/empresa_estrella_empty.png')}}"><img src="{{url('assets/images/empresa_estrella_empty.png')}}"></td>
=======
					<td class="text-center"><input type="checkbox"></td>
				  	<td>2/5</td>
>>>>>>> 0cc72541e4e8bf9a099a36271fb593705459f1b2
=======
					<td class="text-center"><input type="checkbox"></td>
				  	<td>2/5</td>
>>>>>>> 5b808344407bbbb4b005f8ce2049805efc05e688
				  	<td>Veureka</td>
				  	<td>Huajuapan de León, Oax.</td>
				  	<td></td>
				</tr>
				<tr>
<<<<<<< HEAD
<<<<<<< HEAD
					<td><input id="dprof" type="checkbox"></td>
=======
					<td class="text-center"><input type="checkbox"></td>
>>>>>>> 0cc72541e4e8bf9a099a36271fb593705459f1b2
=======
					<td class="text-center"><input type="checkbox"></td>
>>>>>>> 5b808344407bbbb4b005f8ce2049805efc05e688
				  	<td></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				</tr>
				<tr>
<<<<<<< HEAD
<<<<<<< HEAD
					<td><input id="dprof" type="checkbox"></td>
=======
					<td class="text-center"><input type="checkbox"></td>
>>>>>>> 0cc72541e4e8bf9a099a36271fb593705459f1b2
=======
					<td class="text-center"><input type="checkbox"></td>
>>>>>>> 5b808344407bbbb4b005f8ce2049805efc05e688
				  	<td></td>
				  	<td></td>
				  	<td></td>
				  	<td></td>
				</tr>
			</table>
			<a href="{{url('perfil/fprofesional')}}" class="button flat"> Siguiente</a>
		</div>		
	</div>
	
	<div id="addEmpleo" class="modaloverlay">
	  	<div class="modal">
		    <a href="#close" class="close">&times;</a>
		    <div>
		    	<h1>Agregar Empleo</h1>
		    	<form action="#">
			    	<div>
						<input type="text" class="input-icon inputAddress" placeholder="Nombre de la empresa" />
					</div>
					<div>
						<input type="text" class="input-icon inputPuesto" placeholder="Agregar puesto" />
					</div>
					<div>
						<input type="text" class="input-icon inputAntiguedad" placeholder="Antiguedad __años __meses" />
					</div>
					<div>
						<input type="text" class="input-icon inputFuncionDes" placeholder="Agregar funcion desempeñada" />
					</div>
					<div class="btn-group">
						<button type="button" class="flat-secundario aling-left">Cancelar</button>
						<button type="button" class="flat aling-right">Agregar</button>
					</div>
		    	</form>
		    </div>
		</div>
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 0cc72541e4e8bf9a099a36271fb593705459f1b2
=======
>>>>>>> 5b808344407bbbb4b005f8ce2049805efc05e688
	</div>
</div><!--fin contenedor-->
@stop