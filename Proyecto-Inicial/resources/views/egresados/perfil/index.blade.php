@extends('layouts.master')

@section('title', 'Mi perfil')

@section('style')
	<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
	<link href="{{ url('css/modal.css') }}" rel="stylesheet">
	<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
	<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')
	<div class="contenedor"><!--inicio contenedor-->

		<!-- Muestra un mensaje de alerta en caso de que el usuario no se puede registrar -->
		@if(Session::has('message_success'))
			<div class = "alert alert-success flashmensasse" id = "message_alert">
				<em> {!! session('message_success') !!}</em>
				<button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>
		@endif

		@if(Session::has('message_danger'))
			<div class = "alert alert-danger flashmensasse" id = "message_alert">
				<em> {!! session('message_danger') !!}</em>
				<button id = "hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>
		@endif

		<div class="div-1"><!--inicio div-1-->
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
						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono-perfil"><!--inicio icono-->
								<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos" title="Nombre">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span class="info-perfil"> {{ $egresados->nombres }} {{ $egresados->ap_paterno }} {{ $egresados->ap_materno }} </span>
							</div><!--info-->
						</div><!--contenedor-info-->
						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono-perfil"><!--inicio icono-->
								<img src="{{ url('assets/images/birthday.png') }}" alt="" class="iconos" title="Fecha de nacimiento">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span class="info-perfil"> {{ $egresados->fecha_nacimiento }} </span>
							</div><!--info-->
						</div><!--contenedor-info-->

						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono-perfil"><!--inicio icono-->
								<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos" title="Lugar de origen">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span class="info-perfil">Originario de {{ $egresados->lugar_origen }}</span>
							</div><!--info-->
						</div><!--contenedor-info-->

						<div class="contenedor-info"><!--inicio contenedor-info-->
							<div class="icono-perfil"><!--inicio icono-->
								<img src="{{ url( 'assets/images/email.png') }}" alt="" class="iconos" title="Lugar de origen">
							</div><!--fin icono-->
							<div class="info"><!--inicio info-->
								<span class="info-perfil">{{ $egresados->usuario->correo }}</span>
							</div><!--info-->
						</div><!--contenedor-info-->

						<div>
							@if( $egresados->direccion_actual == NULL )
								<div class="contenedor-info"><!--inicio contenedor-info-->
									<div class="icono-perfil"><!--inicio icono-->
										<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos" title="Direccion actual">
									</div><!--fin icono-->
									<a href="#actualizarDireccion" class="btn-empresa">Agregar dirección actual</a>
									<!--- <input type="tel" name="e_telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" title="Teléfono" />
									-->
								</div>
							@else	
								<div class="contenedor-info"><!--inicio contenedor-info-->
									<div class="icono-perfil"><!--inicio icono-->
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
									<div class="icono-perfil"><!--inicio icono-->
										<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos" title="Numero telefónico">
									</div><!--fin icono-->
									<a href="#actualizarTelefono" class="btn-empresa">Agregar número de teléfono</a>
									<!--- <input type="tel" name="e_telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" title="Teléfono" />
									-->
								</div>
							@else	
								<div class="contenedor-info"><!--inicio contenedor-info-->
									<div class="icono-perfil"><!--inicio icono-->
										<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos" title="Numero telefónico">
									</div><!--fin icono-->
									<div class="info"><!--inicio info-->
										<span class="info-perfil">{{ $egresados->telefono }}</span>
									</div><!--info-->
									<a href="#actualizarTelefono" class="btn-empresa">Actualizar</a>
								</div><!--contenedor-info-->
							@endif
						</div>
						
						<form enctype = "multipart/form-data" action="uploadcv" method="POST">
							<p>Curriculum Vitae</p>
							<input type="file" name="e_cv" accept="application/pdf" />
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<input type="submit" class="flat" value = "Actualizar">
						</form>					
				</div>
			</div><!--fin div-2-2-->
			
			<div class="div-2-3">
				@if($egresados->imagen_url)
					<img src="{{url($egresados->imagen_url)}}">
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
				{{ csrf_field() }}
				<div class="parte-2"><!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
					<div>
						<input type="text" name = "telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" required/>
						<input type="hidden" name = "modificacion" value = "telefono"/>
					</div>
					<div class="botones-telefono">
						<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
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
				{{ csrf_field() }}
				<div class="parte-2"><!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
					<div>
						<input type = "text" name = "direccion" class = "input-icon inputAddress" placeholder = "Agregar direccion"
							value = "{{ $egresados->direccion_actual }}" required/>
						<input type = "hidden" name = "modificacion" value = "direccion"/>
					</div>

					<div class="botones-direccion">
						<a href="#close"><button type="button" class="flat-secundario">Cancelar</button></a>
						<button type = "submit" class="flat aling-right">Guardar</button>
					</div>
				</div>
			</form>
			<!-- </div> -->
		</div> <!-- div-modal -->
	</div> <!-- div-modaloverlay -->

@stop
