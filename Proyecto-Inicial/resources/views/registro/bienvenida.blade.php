@extends('layouts.master')

@section('title', 'Bienvenida')

@section('style')
<link href="{{ url('css/registro.css') }}" rel="stylesheet">
@stop

@section('content')
        <div>
        	<p class="seccion">¡Felicitaciones!</p><br>
          	<div >
             	<p >La coordinación de seguimiento a egresados es una instancia que contribuye a lograr un mayor vínculo entre los estudiantes, la UTM y las empresas de diversos sectores productivos.</p>
                <p >Esta labor ayuda a que los egresados se mantengan enterados y participen en acciones de beneficio a la comunidad universitaria.</p>

                <p >El espacio virtual que ahora visitan es una herramienta para fortalecer este vinculo, dentro de esta página podrás registrarte para mantener una mayor comunicación con nuestra universidad, podrán acceder a información de actividades, oportunidades de desarrollo laboral y académico, historias de éxito, ranking de empresas así como tips/consejos y un directorio de empresas.</p>
             	<br>

                <h2 >Para comenzar...</h2>
                <p >Favor de contestar las siguientes preguntas, de acuerdo a tu apreciación</p><br>

                <form action="#" method="get">
                <p>Considero que mi carrera ha sido...</p>
                    <input type="checkbox" name="e" value="Excelente" checked="checked"> Excelente
                    <input type="checkbox" name="b" value="Buena" >buena
                    <input type="checkbox" name="b" value="Buena" >Regular
                    <input type="checkbox" name="b" value="Buena" >Insatisfactoria <br><br>

                    <p>el clima universitario de la UTM es...</p>
                    <input type="checkbox" name="e" value="Excelente" checked="checked"> Excelente
                    <input type="checkbox" name="b" value="Buena" >bueno
                    <input type="checkbox" name="b" value="Buena" >Regular
                    <input type="checkbox" name="b" value="Buena" >Insatisfactorio
                    <p align="right">Adelante y ¡Disfruta!</p><br>
                <button class="button2">Continuar</button>  
                </form>

          	</div>
        </div>
@stop
