<ul>
	  <li {{ Request::is('eventosUTM') ? ' class=active' : ''}} >
	  	<a href="{{url('eventosUTM')}}">Todos los eventos</a>
	  </li>
	  <li {{ Request::is('eventosUTM/culturales') ? ' class=active' : ''}}>
	  	<a href="{{url('eventosUTM/culturales')}}">Culturales</a>
	  </li>
	  <li {{ Request::is('eventosUTM/academicos') ? ' class=active' : ''}}>
	  	<a href="{{url('eventosUTM/academicos')}}">Académicos</a>
	  </li>
</ul>
