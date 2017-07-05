@extends('layouts.ingreso')

@section('title', 'Registrarse')

@section('style')
<link href="{{ url('css/registro.css') }}" rel="stylesheet">
@stop

@section('content')
        <div>
        	<h1>Registrarme</h1>
          	<div id="saludo">
             	<p id="bienvenida"><strong>Hola! Estás a punto de iniciar tu registro en el Sistema de Seguimiento de Egresados de la UTM, de antemano te agradecemos por colaborar cordialmente con tu universidad.</strong></p>
             	<br><br><br>
                <div class="column">
                    <a href="#privacidad">Leer aviso de privacidad.</a>
                </div>
                <p>Si no recuerdas tu matrícula comunícate a las Coordinación de Vinculación de Alumnos y Egresados UTM a los teléfonos:</p><br>
                <p>(953) 53 203 99 o (953) 53 20214 ext. 113 o 116.</p>
                <p>De lunes a Viernes de 8:00 a 13:00 y de 16:00 a 19:00 hrs.</p>             
             	
          	</div>
         	
         	<div id="datos">
         			<p class="p">Ingresa tu matrícula</p>
         			<input type="text" name="matricula" id="entradas" placeholder="p.e. 2012020032">
         			<p class="p">Ingresa tu CURP</p>
         			<input type="text" name="curp" id="entradas">
         			<p class="p">Ingresa un correo electrónico</p>
         			<input type="text" name="correo" id="entradas">
         			<p class="p">Ingresa un nombre de usuario</p>
         			<input type="text" name="usuario" id="entradas">
         			<p class="p">Ingresa tu contraseña</p>
         			<input type="text" name="pass" id="entradas">
         			<p class="p">Repite tu contraseña</p>
         			<input type="text" name="pass2" id="entradas">
         			<p class="p" align="right">Todos los campos son obligatorios</p>

         		<a href="#" class="button"> Cancelar</a>
                <a href="{{url('bienvenida')}}" class="button2">Registrarse</a>
          </div>
        </div>
    
    <div id="privacidad" class="modaloverlay">
        <div class="modal">
            <a href="#close" class="close">&times;</a>
            <div>
                <h3 align="center">Aviso de privacidad</h3><br>
                <form action="#">
                     <p>La Universidad Tecnológica de la Mixteca, con domicilio en carretera a acatlima Km. 2.5, Huajuapan de León, Oaxaca. utilizará tus datos personales recabados de este sistema para realizar un seguimiento preciso de las actividades profesionales de nuestro egresados que servirá como instrumento de análisis estadístico del desempeño académico de tu universidad. Tu información se tratará con absoluta confidencialidad, y solo será para uso del sistema, ni empleadores, ni personas ajenas al sistema podrán visualizarla. Para mayor información acerca del tratamiento y de los derechos que puedes hacer valer, puedes acceder al aviso de privacidad completo a través de nuestra oficina de seguimiento a egresados, ubicada en la misma dirección. </p><br>
                    <button class="button">Cancelar</button>
                <button class="button2">Aceptar</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@stop
