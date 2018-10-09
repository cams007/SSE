
<ul>
	  <li {{ Request::is('perfil') ? ' class=active' : ''}} >
	  	<a href="{{url('perfil')}}">Datos básicos</a>
	  </li>
	  <li {{ Request::is('perfil/estudiosRealizados') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/estudiosRealizados')}}">Estudios realizados</a>
	  </li>
	  <li {{ Request::is('perfil/primerEmpleo') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/primerEmpleo')}}">Mi primer empleo</a>
	  </li>
	  <li {{ Request::is('perfil/empleos') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/empleos')}}">Mis otros empleos</a>
	  </li>
	  <li {{ Request::is('perfil/satisfaccion') ? ' class=active' : ''}}>
	  	<a href="{{url('perfil/satisfaccion')}}"> Satisfación en mi formación profesional</a>
	  </li>
</ul>
