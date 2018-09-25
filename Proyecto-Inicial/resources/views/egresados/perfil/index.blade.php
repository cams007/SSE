@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="contenedor"><!--inicio contenedor-->
	<div class="div-1"> <!--incio div-1-->
		<p class="text-center">Mi perfil</p>
	</div><!--fin div-1-->

	<div class="div-2"><!--inicio div-2-->
		<div class="div-2-1"><!--inicio div-2-1-->
			<aside id="cssmenu" class="column hrV">
				@include('partials.aside')
			</aside>
		</div><!--fin div-2-1-->
		<div class="div-2-2"><!--inicio div-2-2-->
			<div class="column content">
				<form method="POST" action="{{url('perfil')}}">

					{{-- TODO: Protección contra CSRF --}}
					{{ csrf_field() }}

					<div class="contenedor-info"><!--inicio contenedor-info-->
						<div class="icono"><!--inicio icono-->
							<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos" title="Nombre">
						</div><!--fin icono-->
						<div class="info"><!--inicio info-->
							<span class="info-perfil"> {{ $egresados->nombres }} {{ $egresados->ap_paterno }} {{ $egresados->ap_materno }} </span>
						</div><!--info-->
					</div><!--contenedor-info-->

					<div class="contenedor-info"><!--inicio contenedor-info-->
						<div class="icono"><!--inicio icono-->
							<img src="{{ url('assets/images/birthday.png') }}" alt="" class="iconos" title="Fecha de nacimiento">
						</div><!--fin icono-->
						<div class="info"><!--inicio info-->
							<span class="info-perfil"> {{ $egresados->fecha_nacimiento }} </span>
						</div><!--info-->
					</div><!--contenedor-info-->

					<div class="contenedor-info"><!--inicio contenedor-info-->
						<div class="icono"><!--inicio icono-->
							<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos" title="Lugar de origen">
						</div><!--fin icono-->
						<div class="info"><!--inicio info-->
							<span class="info-perfil"> {{ $egresados->lugar_origen }}</span>
						</div><!--info-->
					</div><!--contenedor-info-->

					<div class="entradas">
						<input type="text" name="e_direccionActual" class="input-icon inputHome" placeholder="Agrega tu ciudad actual"  value="{{$egresados->direccion_actual}} " title="Dirección actual" />
					</div>

					<div class="entradas">
						<input type="email" name="e_correo" class="input-icon inputEmail" placeholder="Agregar un correo electrónico" value="{{$egresados->usuario->correo}}" title="Correo electrónico" />
					</div>

					<div class="entradas">
						<input type="tel" name="e_telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" title="Teléfono" />
					</div>

					<div class="entradas">
						<p>Género</p>
						{!! Form::select('e_genero', config('options.generos'), $egresados->genero, ['class' => 'select', 'required']) !!}
					</div>

					<div class="entradas">
						<p>Nacionalidad</p>
						{!! Form::select('e_nacionalidad', config('options.nacionalidades'), $egresados->nacionalidad, ['class' => 'select', 'required', "onchange" => "changeNacionalidad(this.value)"]) !!}
						<input type="text" name="e_otraNacionalidad" id="otra_nacionalidad" class="input-icon inputTel" placeholder="Agregar nacionalidad" />
					</div>

					<div class="entradas">
						<p>Curriculum vitae</p>
						<input type="file" name="e_cv">
					</div>
					<div class="btn-group">
						<button type = "button" class="flat-secundario aling-left">Cancelar</button>
						<button type = "submit" class="flat aling-right">Guardar</button>
					</div>
<<<<<<< HEAD

				</form>
			</div>
		</div><!--fin div-2-2-->
		<div class="div-2-3">
			<div class="foto">
				@if($egresados->imagen_url)
					<img src="{{url($egresados->imagen_url)}}" style="width:90%; height:100%; float: left; border-radius: 50%">
					@else
					<img src="{{url('assets/images/egresados/default.png')}}" alt="user-picture" class="img-thumbnail img">
					@endif
			</div>
			<form class="seleccion-foto" enctype="multipart/form-data" action="perfil/upphoto" method="POST">
				<input type="file" name="e_img" accept="image/*">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" class="flat" value="Actualizar">
=======
				</div>
>>>>>>> dbd21ce90abe8cd1f7b88f3241f54c7968a7dc4e
			</form>
			<!-- </div> -->
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

@stop
