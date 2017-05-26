@extends('layouts.master')

@section('title', 'Mis intereses')

@section('style')
<link href="{{ url('css/registro.css') }}" rel="stylesheet">
@stop

@section('content')
        <div>
        	<p class="seccion">Registrarme</p>
          	<div id="saludo">
             	<p id="bienvenida"><strong>Hola! Estás a punto de iniciar tu registro en el Sistema de Seguimiento de Egresados de la UTM, de antemano te agradecemos por colaborar cordialmente con tu universidad.</strong></p>
             	<br><br>
             	<a id="aviso" href="https://www.facebook.com">Leer aviso de privacidad</a>
             	
          	</div>
         	
         	<div id="datos">
         		<p class="p">Ingresa tu matrícula*</p>
         			<input type="text" name="matricula" id="entradas">
         		<p class="p">Ingresa tu CURP*</p>
         			<input type="text" name="curp" id="entradas">
         		<p class="p">Ingresa tu contraseña*</p>
         			<input type="text" name="pass" id="entradas">
         		<p class="p">repite tu contraseña*</p>
         			<input type="text" name="pass2" id="entradas">
         			<p class="p" align="right">*Campos obligatorios</p>
         		<button class="button">Cancelar</button>
         		<button class="button2">Registrar</button>
          </div>
        </div>
@stop
