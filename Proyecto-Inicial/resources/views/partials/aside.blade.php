<!-- 	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation" ><a href="/" class="active">Datos Basicos</a></li>
			<li role="presentation" ><a href="fpersonal">Formación personal</a></li>
			<li role="presentation" ><a href="#"></a></li>
			<li role="presentation" ><a href="#">Mis intereses</a></li>
			<li role="presentation" ><a href="#">Mis ofertas laborales</a></li>
		</ul>
	</div> -->

<ul class="nav nav-pills nav-stacked">
	  <li role="presentation" {{ Request::is('perfil*') && 
!Request::is('perfil/fpersonal') && !Request::is('perfil/experiencia') && !Request::is('perfil/intereses') && !Request::is('perfil/ofertaslab') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil')}}">Datos Basicos</a>
	  </li>
	  <li role="presentation" {{ Request::is('perfil/fpersonal') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/fpersonal')}}">Formación personal</a>
	  </li>
	  <li role="presentation" {{ Request::is('perfil/experiencia') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/experiencia')}}">Experiencia laboral</a>
	  </li>
	  <li role="presentation" {{ Request::is('perfil/intereses') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/intereses')}}">Mis intereses</a>
	  </li>
	  <li role="presentation" {{ Request::is('perfil/ofertaslab') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/ofertaslab')}}">Mis ofertas laborales</a>
	  </li>
</ul>
