
<ul style="border: 1px outline #">
	  <li {{ Request::is('perfil') ? ' class=active' : ''}} >
	  	<a href="{{url('perfil')}}">Datos Basicos</a>
	  </li>
	  <li {{ Request::is('perfil/fpersonal') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/fpersonal')}}">Formación personal</a>
	  </li>
	  <li {{ Request::is('perfil/experiencia') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/experiencia')}}">Experiencia laboral</a>
	  </li>
	  <li {{ Request::is('perfil/dprofesional') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/dprofesional')}}">Desarrollo Profesional</a>
	  </li>
	  <li {{ Request::is('perfil/intereses') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/intereses')}}">Mis intereses</a>
	  </li>
	  <li {{ Request::is('perfil/ofertaslab') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/ofertaslab')}}">Mis ofertas laborales</a>
	  </li>
	  <li {{ Request::is('perfil/fprofesional') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/fprofesional')}}"> Formacion profesional</a>
	  </li>
	  <li {{ Request::is('perfil/egresadoReco') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/egresadoReco')}}"> Recomendaciones Egresado</a>
	  </li>
</ul>
