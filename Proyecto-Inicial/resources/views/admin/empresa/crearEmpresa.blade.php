@extends('admin.layouts.master')

@section('title', 'Alta empresa')

@section('style')
	<link href="{{ url('css/cssadmin/crearEmpresa.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/admin/empresa.js') }}"></script>
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
	 		<input class="nombre" type="text" name="nombre_emp" placeholder="Ingrese nombre de la empresa" required/>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Descripción: </label>
			 		<textarea rows="4" cols="50" name="descripcion" placeholder="Describa la empresa" required></textarea>
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
			 		<input type="text" name="calle" placeholder="Calle" required/>
				</div>

				<div>
					<label for="" class="">Número: </label>
					<input type="text" name="numero" placeholder="Número" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Colonia:</label>
					<input type="text" name="colonia" placeholder="Colonia" required/>
				</div>

				<div>
					<label for="" class="">Ciudad:</label>
					<input type="text" name="ciudad" placeholder="Ciudad" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Estado:</label>
					<input type="text" name="estado" placeholder="Estado" required/>
				</div>

				<div>
					<label for="" class="">Código postal:</label>
					<input type="text" name="codigo_p" placeholder="Código postal" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Giro: </label>
					<input type="text" name="giro" placeholder="Giro de la empresa" required/>
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
			 		<input type="text" name="rfc_emp" placeholder="RFC" required/>
				</div>

				<div>
			 		<label class="">Telefono: </label>
			 		<input type="text" name="telefono_emp" placeholder="Teléfono" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Correo: </label>
			 		<input type="email" name="correo_emp" placeholder="Correo" required/>
				</div>

				<div>
			 		<label for="" class="">Página web: </label>
			 		<input type="text" name="pagina_w" placeholder="Página web de la empresa" required/>
				</div>
			</div>
			<!--Habilitacion de la empresa-->
	 		<input type="hidden" name="habilitado" value="1" placeholder=""/>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Motivos de no contratación: </label>
			 		<textarea rows="4" cols="50" name="noContratacion" placeholder="Describa los motivos de no contatación" required></textarea>
				</div>

				<div>
			 		<label for="" class="">Recomendaciones: </label>
			 		<textarea rows="4" cols="50" name="recomendacion" placeholder="Recomendaciones de la empresa" required></textarea>
				</div>
			</div>
			<!--Datos del contacto de la empresa-->
			<div class="columnitas">
				<div>
			 		<label for="" class="">Nombre del contacto: </label>
			 		<input type="text" name="nombre_cont" placeholder="Nombre de contacto" required/>
				</div>

				<div>
			 		<label for="" class="">Puesto: </label>
			 		<input type="text" name="puesto_cont" placeholder="Puesto del contacto" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Número telefónico: </label>
			 		<input type="text" name="numeroTel_cont" placeholder="Teléfono del contacto" required/>
				</div>

				<div>
			 		<label for="" class="">Correo electrónico: </label>
			 		<input type="email" name="email_cont" placeholder="Correo del contacto" required/>
				</div>
			</div>

			<div class="boton">
	 			<button type="submit" class="flat">Guardar</button>
			</div>
		</div>
		</form>
	</div><!--contenedor-->

@stop
