<ul>
	  <li {{ Request::is('eventos') ? ' class=active' : ''}} >
	  	<a href="{{url('eventos')}}">Todos los eventos</a>
	  </li>
	  <li {{ Request::is('eventos/culturales') ? ' class=active' : ''}}>
	  	<a href="{{url('eventos/culturales')}}">Culturales</a>
	  </li>
	  <li {{ Request::is('eventos/academicos') ? ' class=active' : ''}}>
	  	<a href="{{url('eventos/academicos')}}">Académicos</a>
	  </li>
</ul>
