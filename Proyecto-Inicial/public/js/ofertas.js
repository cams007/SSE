$(document).ready(function() {
   
	// var row = $(this).parents('tr');
	// var empresa = row.data('empresa');
	// if (empresa == null){
	// 	window.location = APP_URL;
	// }

	$('.btn-empresa').click(function(){
		var row = $(this).parents('tr');
		var empresa = row.data('empresa');
		var contact = row.data('contacto');

		var dir = empresa.calle + ' #' + empresa.numero + ', ' + empresa.colonia + ', ' + empresa.ciudad + ', ' + empresa.estado + ', CP: ' + empresa.codigo_postal;
		var nombre = document.getElementById('e_nombre');
		var direccion = document.getElementById('e_direccion');
		var telefono = document.getElementById('e_telefono');
		var correo = document.getElementById('e_correo');
		var contacto = document.getElementById('e_contacto');
		var puesto = document.getElementById('e_puesto');

		nombre.innerHTML = '<p class="texto-descripcion">'+ empresa.nombre +'</p>';
		direccion.innerHTML = '<p class="texto-descripcion">'+ dir +'</p>';
		telefono.innerHTML = '<p class="texto-descripcion">'+ empresa.telefono +'</p>';
		correo.innerHTML = '<p class="texto-descripcion">'+ empresa.correo +'</p>';
		contacto.innerHTML = '<p class="texto-descripcion">'+ contact.nombre +'</p>';
		puesto.innerHTML = '<p class="texto-descripcion">'+ contact.puesto +'</p>';
	});

	$('.more_detail').click(function(){
		var row = $(this).parents('tr');
		var empresa = row.data('empresa');
		var oferta = row.data('oferta');

		document.getElementById('nombre_oferta').innerHTML = '<input type="hidden" name="oferta" value="'+oferta.titulo_empleo+'"/>';
		document.getElementById('correo_oferta').innerHTML = '<input type="hidden" name="correo" value="'+empresa.correo+'"/>';
		document.getElementById('e_id').innerHTML = '<input type="hidden" name="e_id" value="'+oferta.id+'"/>';

		var puesto = document.getElementById('oferta_puesto');
		var name_empresa = document.getElementById('oferta_empresa');
		var salario = document.getElementById('oferta_salario');
		var descripcion = document.getElementById('oferta_descripcion');
		var vacante = document.getElementById('oferta_vacante');
		var carrera = document.getElementById('oferta_carrera');
		var experiencia = document.getElementById('oferta_experiencia');
		var ubicacion = document.getElementById('oferta_ubicacion');

		puesto.innerHTML = oferta.titulo_empleo;
		name_empresa.innerHTML = empresa.nombre;
		descripcion.innerHTML = oferta.descripcion;
		carrera.innerHTML =  elijeCarrera( oferta.carrera) + " o áreas afines.";
		experiencia.innerHTML = elijeExperiencia (oferta.experiencia);
		salario.innerHTML = "Con un salario base de " + '$' + oferta.salario;
		ubicacion.innerHTML = "Ubicación: " + oferta.ubicacion;
	});

});

function elijeExperiencia ( n )
{
	switch ( n )
	{
		case 0: return "Sin Experiencia.";
		case 1: return "Con " + n + " año de experiencia.";
		default: return "Con " + n + " años de experiencia."
	}
}

function elijeCarrera( n )
{
	switch (n)
	{
		case 0: return "Ingeniero en Diseño";
		case 1: return "Ingeniero en Computación";
		case 2: return "Ingeniero en Alimentos";
		case 3: return "Ingeniero en Electrónica";
		case 4: return "Ingeniero en Mecatrónica";
		case 5: return "Ingeniero  Industrial";
		case 6: return "Ingeniero en Física Aplicada";
		case 7: return "Licenciado en Ciencias Empresariales";
		case 8: return "Licenciado en Matemáticas Aplicadas";
		case 9: return "Licenciado en Estudios Mexicanos";
		case 10: return "Ingeniero en Mecánica Automotriz";
		default: ;
	}
}