
<ul>
	  <li {{ Request::is('perfil') ? ' class=active' : ''}} >
	  	<a href="{{url('perfil')}}">Datos Basicos</a>
	  </li>
	  <li {{ Request::is('perfil/fpersonal') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/fpersonal')}}">Formación personal</a>
	  </li>
	  <li {{ Request::is('perfil/experiencia') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/experiencia')}}">Experiencia laboral</a>
	  </li>
	  <li {{ Request::is('perfil/intereses') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/intereses')}}">Mis intereses</a>
	  </li>
	  <li {{ Request::is('perfil/ofertaslab') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/ofertaslab')}}">Mis ofertas laborales</a>
	  </li>
	  <li>
	  	<a href="{{url('perfil/ofertaslab')}}">Opcion 3</a>
	  </li>
	  <li>
	  	<a href="{{url('perfil/ofertaslab')}}">Opcion 4</a>
	  </li>
</ul>
