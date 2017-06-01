
<ul style="border: 1px outline ">
	  <li {{ Request::is('perfil') ? ' class=active' : ''}} >
	  	<a href="{{url('perfil')}}">Datos basicos</a>
	  </li>
	  <li {{ Request::is('perfil/fpersonal') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/fpersonal')}}">Estudios realizados</a>
	  </li>
	  <li {{ Request::is('perfil/experiencia') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/experiencia')}}">Mi primer empleo</a>
	  </li>
	  <li {{ Request::is('perfil/dprofesional') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/dprofesional')}}">Mis otros empleos</a>
	  </li>
	  <li {{ Request::is('perfil/fprofesional') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/fprofesional')}}"> Satisfación en mi formación profesional</a>
	  </li>
	  <li {{ Request::is('perfil/egresadoReco') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/egresadoReco')}}"> Recomendaciones egresado</a>
	  </li>
	  <li {{ Request::is('perfil/intereses') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/intereses')}}">Mis intereses</a>
	  </li>
	  <li {{ Request::is('perfil/ofertaslab') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/ofertaslab')}}">Mis ofertas laborales</a>
	  </li>
</ul>
