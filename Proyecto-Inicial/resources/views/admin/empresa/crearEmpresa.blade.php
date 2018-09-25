@extends('admin.layouts.master')

@section('title', 'Alta empresa')

@section('style')

<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->
	<link href="{{ url('css/cssadmin/crearEmpresa.css') }}" rel="stylesheet">
@stop
@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Alta empresa</p>

		</div><!--div-1-->

		@php
			$sector = array(1=>'Pública',2=>'Privada',3=>'Propia');

		@endphp

		<form method="post" enctype="multipart/form-data" action="{{route('admin.crearEmpresa.submit')}}">
			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<div class="seccion1">
	 		<label for="" class="">Nombre de la empresa: </label>
	 		<input class="nombre" type="text" name="nombre_emp" required/>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Descripción: </label>
			 		<textarea rows="4" cols="50" name="descripcion" required></textarea>
				</div>

				<div>
					<label for="" class="">Fotografía de la empresa: </label>
			 		<input id="file-input" type="file" name="imagen" required/>
			 		<img id="imgSalida" src="" />
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Calle: </label>
			 		<input type="text" name="calle" required/>
				</div>

				<div>
					<label for="" class="">Número: </label>
					<input type="text" name="numero" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Colonia:</label>
					<input type="text" name="colonia" required/>
				</div>

				<div>
					<label for="" class="">Ciudad:</label>
					<input type="text" name="ciudad" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Estado:</label>
					<input type="text" name="estado" required/>
				</div>

				<div>
					<label for="" class="">Código postal:</label>
					<input type="text" name="codigo_p" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Giro: </label>
					<input type="text" name="giro"/>
				</div>

				<div>
					<label for="" class="">Sector: </label>
					<select name="sector">
						@foreach($sector as $idn=>$nombre)
								<option value={{$nombre}}>{{$nombre}}</option><!--Tipo de datos enum-->
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<div class="seccion2">
			<div class="columnitas">
				<div>
			 		<label for="" class="">RFC: </label>
			 		<input type="text" name="rfc_emp"/>
				</div>

				<div>
			 		<label class="">Telefono: </label>
			 		<input type="text" name="telefono_emp" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Correo: </label>
			 		<input type="email" name="correo_emp" required/>
				</div>

				<div>
			 		<label for="" class="">Página web: </label>
			 		<input type="text" name="pagina_w" required/>
				</div>
			</div>
			<!--Habilitacion de la empresa-->
	 		<input type="hidden" name="habilitado" value="1" placeholder=""/>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Motivos de no contratacion: </label>
			 		<textarea rows="4" cols="50" name="noContratacion"></textarea>
				</div>

				<div>
			 		<label for="" class="">Recomendaciones: </label>
			 		<textarea rows="4" cols="50" name="recomendacion" required></textarea>
				</div>
			</div>
			<!--Datos del contacto de la empresa-->
			<div class="columnitas">
				<div>
			 		<label for="" class="">Nombre del contacto: </label>
			 		<input type="text" name="nombre_cont" required/>
				</div>

				<div>
			 		<label for="" class="">Puesto: </label>
			 		<input type="text" name="puesto_cont" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Número telefónico: </label>
			 		<input type="text" name="numeroTel_cont" required/>
				</div>

				<div>
			 		<label for="" class="">Correo electrónico: </label>
			 		<input type="email" name="email_cont" required/>
				</div>
			</div>

			<div class="boton">
	 			<button type="submit" class="flat">Crear</button>
			</div>
		</div>
		</form>

	</div><!--contenedor-->

@stop

@section('script')
<script src="{{ url('js/admin/empresa.js') }}"></script>
@stop
