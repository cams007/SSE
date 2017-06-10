@extends('layouts.master')

@section('title', 'Mis intereses')

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
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
		
		<div class="column content">
			<form method="POST" action="#">
				<div class="form-group">
					<label for="doctorado">¿Que recomendarias mejorar en cada una de las opciones que calificaste como regular o malo?</label>
					<textarea name="" id="doctorado" class="form-control" rows="3" required="required"></textarea>
				</div>

				<div class="form-group text-center">
					<button type="submit" class="flat">
						Guardar
					</button>
				</div>
			</form>	
		</div>
		
	</div>
</div><!--fin contenedor-->
@stop