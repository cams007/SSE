@extends('admin.layouts.master')

@section('title', 'Editar empresa')

@section('style')
	<link href="{{ url('css/cssadmin/editarEmpresa.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/admin/empresa.js') }}"></script>
@stop

@section('content')
	<div class="contenedor"><!-- contenedor -->
		<div class="div-1">
			<p class="text-center">Editar empresa</p>
		</div><!--div-1-->

		@php
			$sector = array(1=>'Pública',2=>'Privada',3=>'Propia');
		@endphp

		<form method="post" enctype="multipart/form-data" action="{{route('admin.editarEmpresa.submit')}}">
	 		{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}"/>

			<input name="id" type="hidden" value="{{$empresa->id}}"/>
			<div class="seccion1">
	 		<label for="" class="">Nombre de la empresa: </label>
	 		<input class="nombre" type="text" name="nombre_emp" value="{{$empresa->nombre}}" required />

			<div class="columnitas">
				<div>
			 		<label for="" class="">Descripción: </label>
			 		<textarea rows="4" cols="50" name="descripcion" required>{{$empresa->descripcion}}</textarea>
				</div>

				<div>
					<label for="" class="">Fotografía de la empresa: </label>
					<input id="file-input" name="imagen" type="file"/>
					<img id="imgSalida" src="{{ url($empresa->imagen_url)}}" alt=""/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Calle: </label>
					<input type="text" name="calle" value="{{$empresa->calle}}" required/>
				</div>
				<div>
					<label for="" class="">Número: </label>
					<input type="text" name="numero" value="{{$empresa->numero}}" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Colonia:</label>
					<input type="text" name="colonia" value="{{$empresa->colonia}}" required/>
				</div>

				<div>
					<label for="" class="">Ciudad:</label>
					<input type="text" name="ciudad" value="{{$empresa->ciudad}}" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Estado:</label>
					<input type="text" name="estado" value="{{$empresa->estado}}" required/>
				</div>

				<div>
					<label for="" class="">Código postal:</label>
					<input type="text" name="codigo_p" value="{{$empresa->codigo_postal}}" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
					<label for="" class="">Giro: </label>
					<input type="text" name="giro" value="{{$empresa->giro}}" required/>
				</div>

				<div>
			 		<label for="" class="">Sector: </label>
			 		<select name="sector">
			 			@foreach($sector as $idn=>$nombre)
			 				@if($nombre == $empresa->sector)
			 					<option value={{$nombre}} selected>{{$nombre}}</option><!--Tipo de datos enum-->
			 				@else
			 					<option value={{$nombre}}>{{$nombre}}</option><!--Tipo de datos enum-->
			 				@endif
			 			@endforeach
			 		</select>
				</div>
			</div>
		</div>
		<div class="seccion2">
			<div class="columnitas">
				<div>
					<label for="" class="">RFC: </label>
			 		<input type="text" name="rfc_emp" value="{{$empresa->rfc}}" required/>
				</div>

				<div>
			 		<label for="" class="">Teléfono: </label>
			 		<input type="text" name="telefono_emp" value="{{$empresa->telefono}}" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Correo: </label>
			 		<input type="email" name="correo_emp" value="{{$empresa->correo}}" required/>
				</div>

				<div>
			 		<label for="" class="">Página web: </label>
			 		<input type="text" name="pagina_w" value="{{$empresa->pagina_web}}" required/>
				</div>
			</div>
	 		<input name="contacto_id" type="hidden" value="{{$empresa->contacto_id}}" required/>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Motivos de no contratación: </label>
			 		<textarea rows="4" cols="50" name="noContratacion" required>{{$empresa->motivo_no_contratacion}}</textarea>
				</div>

				<div>
			 		<label for="" class="">Recomendaciones: </label>
			 		<textarea rows="4" cols="50" name="recomendacion" required>{{$empresa->recomendaciones}}</textarea>
				</div>
			</div>
			<!--Datos del contacto de la empresa-->
			<input name="idcontacto" type="hidden" value="{{$contacto->id}}" required/>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Nombre del contacto: </label>
			 		<input type="text" name="nombre_cont" value="{{$contacto->nombre}}" required/>
				</div>

				<div>
			 		<label for="" class="">Puesto: </label>
			 		<input type="text" name="puesto_cont" value="{{$contacto->puesto}}" required/>
				</div>
			</div>

			<div class="columnitas">
				<div>
			 		<label for="" class="">Número telefónico: </label>
			 		<input type="text" name="numeroTel_cont" value="{{$contacto->telefono}}" required/>
				</div>

				<div>
			 		<label for="" class="">Correo electrónico: </label>
			 		<input type="email" name="email_cont" value="{{$contacto->correo}}" required/>
				</div>
			</div>

			<div class="boton">
	 			<button type="submit" class="flat">Actualizar</button>
			</div>
		</div>
		</form>

	</div><!--contenedor-->

@stop
