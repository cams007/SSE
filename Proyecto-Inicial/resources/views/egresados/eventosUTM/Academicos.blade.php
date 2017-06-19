@extends('layouts.master')

@section('title', 'Eventos Académicos')

@section('style')
	<link href="{{ url('css/eventosAcademicos.css') }}" rel="stylesheet">
	<!--<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">-->
@stop

@section('content')
<div class="contenedor"><!--inicio contenedor-->

 <div class="div-1"> <!--incio div-1-->

	 <p class="text-center">Eventos Académicos</p>
	

 </div><!--fin div-1-->

 <div class="div-2"><!--inicio div-2-->

	 <div class="div-2-1"><!--inicio div-2-1-->

		 <!--<div class="clearfix">-->
		 <aside class="column" id="cssmenu">
			 @include('partials.AsideEventosUtm')
		 </aside>

	 </div><!--fin div-2-1-->

	 <div class="div-2-2"><!--inicio div-2-2-->
		<!--<div class="column content">-->
		<div class="div-2-2-1"> <!--inicio div-2-2-1-->
			 <div class="search">
	            <input type="search" name="q" placeholder="Buscar">
	        </div>
		</div><!--fin div-2-2-1-->

		 <div class="div-2-2-2"><!--inicio div-2-2-2-->

			 <div class="div-2-2-2-1"><!--inicio div2-2-2-1-->

					 <div class="foto1"><!--incio foto-->
				 <!--<figure>
					 <img src="{{ url('assets/images/acad1UTM.PNG') }}" width="400" height="353">
					 <figcaption><h2>Seminario EQUIPAR</h2></figcaption>
				 </figure>-->
					 </div><!--fin foto-->

				 <div class="descripcion-foto1"><!--inicio descripcion-foto-->
					 <div class="texto-descripcion"><!--inicio orquesta-div-1-->
						 <h2 class="texto-descripcion">Orquesta de Oaxaca</h2>
					 </div><!--fin orquesta-div-1-->

						<div class="contenedor-fecha"><!--inicio cotenedor-fecha-->
								<div class="icono-calendario"><!--inicio icono-calendario-->
						 			<img src="{{ url('assets/images/eventos_calendar.png') }}" alt="" class="iconos">
								</div><!--fin icono-calendario-->
								<div class="texto-fecha"><!--inicio ubicacion-->
						 			<p class="texto-fecha">Martes 07 de Junio 2017, 10:00 hrs.</p>
								</div><!--fin texto-fecha-->
						</div><!--fin contenedor-fecha-->

						<div class="contenedor-ubicacion"><!--inicio contenedor-ubicacion-->
							<div class="icono-ubicacion"><!--inicio icono-ubicacion-->
						 		<img src="{{ url('assets/images/eventos_location.png') }}" alt="" class="iconos">
							</div><!--fin icono-ubicacion-->
							<div class="texto-ubicacion"><!--inicio texto-ubicacion-->
						 		<p class="texto-ubicacion">Auditorio UTM. Huajuapan de león Oaxaca.</p>
							</div><!--fin texto-ubicacion-->
					 	</div><!--fin contenedor-ubicacion-->

					 <div class="asistiras"><!--inicio foto1-asistiras-->
						 <p>¿Asistirás?</p>
					 </div><!--fin foto1-asistiras-->

					 <div class="botones-si-no">
						 <input type="button" class="si" value="Sí">
						 <input type="button" class="no" value="No">
					 </div>
				 </div><!--fin descripcion-foto-->

			 </div><!--fin div-2-2-2-1-->

			 <div class="div-2-2-2-2"><!--inicio div-2-2-2-2-->

				 <div class="foto2"><!--inicio foto2-->
					 <!--<figure>
					 <img src="{{ url('assets/images/biblioteca.JPG') }}" width="400" height="353">
					 <figcaption><h2>Orquesta de Oaxaca</h2></figcaption>
				 </figure>-->
				 </div><!--fin foto2-->

				 <div class="descripcion-foto2"><!--inicio descripcion-foto2-->
					 <div class="texto-descripcion"><!--inicio jarabe-->
					 <h2 class="texto-descripcion">Jarabe Mixteco</h2>
				 </div><!--fin jarabe-->

				 <div class="contenedor-fecha"><!--inicio cotenedor-fecha-->
						 <div class="icono-calendario"><!--inicio icono-calendario-->
							 <img src="{{ url('assets/images/eventos_calendar.png') }}" alt="" class="iconos">
						 </div><!--fin icono-calendario-->
						 <div class="texto-fecha"><!--inicio ubicacion-->
							 <p class="texto-fecha">Lunes 20 de enero 2017, 12:00 hrs.</p>
						 </div><!--fin texto-fecha-->
				 </div><!--fin contenedor-fecha-->

				 <div class="contenedor-ubicacion"><!--inicio contenedor-ubicacion-->
					 <div class="icono-ubicacion"><!--inicio icono-ubicacion-->
						 <img src="{{ url('assets/images/eventos_location.png') }}" alt="" class="iconos">
					 </div><!--fin icono-ubicacion-->
					 <div class="texto-ubicacion"><!--inicio texto-ubicacion-->
						 <p class="texto-ubicacion">Auditorio UTM. Huajuapan de león Oaxaca.</p>
					 </div><!--fin texto-ubicacion-->
				 </div><!--fin contenedor-ubicacion-->


				 <div class="asistiras"><!--inicio foto1-asistiras-->
					 <p>¿Asistirás?</p>
				 </div><!--fin foto1-asistiras-->

				 <div class="botones-si-no">
					 <input type="button" class="si" value="Sí">
					 <input type="button" class="no" value="No">
				 </div>

				 </div><!--fin descripcion-foto2-->

			 </div><!--fin div-2-2-2-2--->

		 </div><!--fin div-2-2-3-->

	 <div class="div-2-2-3"><!--inicio div-2-2-3-->

		 <div class="paginate">
	 		<a class="back" href="#"><img src="{{ url('assets/images/paginator_back.png') }}"></a>
	       	<a class="page" href="#">1</a>
	       	<a class="active" href="#">2</a>
	       	<a class="page" href="#">3</a>
	       	<a class="page" href="#">4</a>
	       	<a class="page" href="#">5</a>
	       	<a class="forward" href="#"><img src="{{ url('assets/images/paginator_forward.png') }}"></a>
	 	</div>

	 </div><!--fin div-2-2-3-->

	 <!--</div>-->

 </div><!--fin div-2-2-->
 <!--</div>-->
 </div><!--fin div-2-->

</div><!--fin contenedor-->

@stop
