@extends('layouts.master')

@section('title', 'Bienvenida')

@section('style')
    <link href="{{ url('css/registro.css') }}" rel="stylesheet">
@stop

@section('content')
    <div>
        <br>
        	<p class="seccion">¡Felicitaciones!</p><hr><br>
          	<div >
             	<p >La coordinación de seguimiento a egresados es una instancia que contribuye a lograr un mayor vínculo entre los estudiantes, la UTM y las empresas de diversos sectores productivos.</p>
                <p >Esta labor ayuda a que los egresados se mantengan enterados y participen en acciones de beneficio a la comunidad universitaria.</p>

                <p >El espacio virtual que ahora visitas es una herramienta para fortalecer este vínculo. Dentro de esta página podrás registrarte para mantener una mayor comunicación con nuestra universidad, podrás acceder a información de actividades, oportunidades de desarrollo laboral y académico, historias de éxito, ranking de empresas; así como tips, consejos y un directorio de empresas.</p>
             	<br>
            </div>
            <br><br>
            <div>
                <p align="right">Adelante y ¡Disfruta!</p><br>
               <a href="{{url('/perfil')}}" class="button2">Continuar</a> 
            </div>          
    </div>
@stop
