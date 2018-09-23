<ul>
	  <li {{ Request::is('directorio/empresa') ? ' class=active' : ''}} >
	  	<a href="{{url('directorio/empresa')}}" onclick="event.preventDefault(); 
                              document.getElementById('directorio-form').submit();">Datos básicos</a>
                            	<form id="directorio-form" action="{{url('directorio/empresa')}}" method="get" style="display: none;">
                              	{{ csrf_field() }}
					
						<div class="descripcion" id="id">
							<input type="hidden" name="id" value='{{$request->id}}'/>';
						</div>
                            	</form>
	  </li>
	  <li {{ Request::is('directorio/empresa/comentarios') ? ' class=active' : ''}}>
	  	<a href="{{url('directorio/empresa/comentarios')}}" onclick="event.preventDefault(); 
                              document.getElementById('comentarios-form').submit();">Comentarios recibidos</a>
					<form id="comentarios-form" action="{{url('directorio/empresa/comentarios')}}" method="get" style="display: none;">
						{{ csrf_field() }}
						
						<div class="descripcion" id="id">
							<input type="hidden" name="id" value='{{$request->id}}'/>';
						</div>
                            	</form>
	  </li>
	  <li {{ Request::is('directorio/empresa/ofertas') ? ' class=active' : ''}}>
	  	<a href="{{url('directorio/empresa/ofertas')}}" onclick="event.preventDefault(); 
                              document.getElementById('ofertas-form').submit();">Ofertas laborales</a>
		  			<form id="ofertas-form" action="{{url('directorio/empresa/ofertas')}}" method="get" style="display: none;">
                              	{{ csrf_field() }}
					
						<div class="descripcion" id="id">
							<input type="hidden" name="id" value='{{$request->id}}'/>';
						</div>
                            	</form>
	  </li>
</ul>