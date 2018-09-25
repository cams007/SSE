@extends('layouts.master')

@section('title', 'Datos basicos')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
@stop

@section('content')
	<div class="contenedor"><!--inicio contenedor-->
		<div class="div-1"><!--inicio div-1-->
			<h1>Mi Perfil</h1>
			<hr class="hr">
		</div><!--fin div-1-->

		<div class="div-2"><!--inicio div-2-->
			<div class="div-2-1"><!--inicio div-2-1-->
				<aside id="cssmenu" class="column hrV">
					@include('partials.aside')
				</aside>
			</div><!--fin div-2-1-->
			<div class="div-2-2"><!--inicio div-2-2-->
				<div class="column content">
					<div>
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
								<span class="info-perfil">Originario de {{ $egresados->lugar_origen }}</span>
							</div><!--info-->
						</div><!--contenedor-info-->

						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono"><!--inicio icono-->
								<img src="{{ url( 'assets/images/email.png') }}" alt="" class="iconos" title="Lugar de origen">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span class="info-perfil">{{ $egresados->usuario->correo }}</span>
							</div><!--info-->
						</div><!--contenedor-info-->

						<div>
							@if( $egresados->direccion_actual == NULL )
								<div class="contenedor-info"><!--inicio contenedor-info-->
									<div class="icono"><!--inicio icono-->
										<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos" title="Direccion actual">
									</div><!--fin icono-->
									<a href="#actualizarDireccion" class="btn-empresa">Agregar dirección actual</a>
									<!--- <input type="tel" name="e_telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" title="Teléfono" />
									-->
								</div>
							@else	
								<div class="contenedor-info"><!--inicio contenedor-info-->
									<div class="icono"><!--inicio icono-->
										<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos" title="Direccion actual">
									</div><!--fin icono-->
									<div class="info"><!--inicio info-->
										<span class="info-perfil">{{ $egresados->direccion_actual }}</span>
									</div><!--info-->
									<a href="#actualizarDireccion" class="btn-empresa">Actualizar</a>
								</div><!--contenedor-info-->
							@endif
						</div>

						<div>
							@if( $egresados->telefono == NULL )
								<div class="contenedor-info"><!--inicio contenedor-info-->
									<div class="icono"><!--inicio icono-->
										<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos" title="Numero telefónico">
									</div><!--fin icono-->
									<a href="#actualizarTelefono" class="btn-empresa">Agregar número de teléfono</a>
									<!--- <input type="tel" name="e_telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" title="Teléfono" />
									-->
								</div>
							@else	
								<div class="contenedor-info"><!--inicio contenedor-info-->
									<div class="icono"><!--inicio icono-->
										<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos" title="Numero telefónico">
									</div><!--fin icono-->
									<div class="info"><!--inicio info-->
										<span class="info-perfil">{{ $egresados->telefono }}</span>
									</div><!--info-->
									<a href="#actualizarTelefono" class="btn-empresa">Actualizar</a>
								</div><!--contenedor-info-->
							@endif
						</div>
						<!--
						FALTA CHECAR SI SE SUBE EL CV DEL USUARIO
						<div>
							<p>Curriculum vitae</p>
							<input type="file" name="e_cv">
						</div>
						-->
						<!-- BOTON DE SIGUIENTE??
						<div class="text-center">
							<button type="submit" class="flat">
								Siguiente
							</button>
						</div>
						-->
					</div>
				</div>
			</div><!--fin div-2-2-->
			
			<div class="div-2-3">
				@if($egresados->imagen_url)
					<img src="{{url($egresados->imagen_url)}}" style="width:50%; height:30%; float: left; border-radius: 50%">
				@else
					<img src="{{url('assets/images/egresados/default.png')}}" alt="user-picture" class="img-thumbnail img">
				@endif
				<form enctype="multipart/form-data" action="perfil/upphoto" method="POST">
					<input type="file" name="e_img" accept="image/*">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" class="flat" value="Actualizar">
				</form>
			</div><!--fin div-2-3-->
		</div><!--fin div-2-->
	</div><!--fin contenedor-->

	<!-- Modal para agregar o actualizar TELEFONO -->
	<div id="actualizarTelefono" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>
			<!-- <div> -->
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Actualizar teléfono</p>
			</div><!--parte-1-->

			<form action="{{ url('perfil/guardar') }}" method="post">
				{{-- TODO: Protección contra CSRF --}}
				{{ csrf_field() }}
				<div class="parte-2"><!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
					<div>
						<input type="text" name = "telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" required/>
						<input type="hidden" name = "modificacion" value = "telefono"/>
					</div>
					<div class="btn-group">
						<button type="button" class="flat-secundario aling-left">Cancelar</button>
						<button type="submit" class="flat aling-right">Guardar</button>
					</div>
				</div>
			</form>
			<!-- </div> -->
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

	<!-- Modal para agregar o actualizar DIRECCION -->
	<div id="actualizarDireccion" class="modaloverlay"> <!-- div-modaloverlay -->
		<div class="modal"> <!-- div-modal -->
			<a href="#close" class="close">&times;</a>
			<!-- <div> -->
			<div class="parte-1"><!--parte-1-->
				<p class="txt">Actualizar dirección</p>
			</div><!--parte-1-->

			<form action="{{ url('perfil/guardar') }}" method="post">
				{{-- TODO: Protección contra CSRF --}}
				{{ csrf_field() }}
				<div class="parte-2"><!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
					<div>
						<input type = "text" name = "direccion" class = "input-icon inputAddress" placeholder = "Agregar direccion"
							value = "{{ $egresados->direccion_actual }}" required/>
						<input type = "hidden" name = "modificacion" value = "direccion"/>
					</div>
					<div class="btn-group">
						<button type = "button" class="flat-secundario aling-left">Cancelar</button>
						<button type = "submit" class="flat aling-right">Guardar</button>
					</div>
				</div>
			</form>
			<!-- </div> -->
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

@stop
