$(document).ready(function() {
   
	$('.btn-empresa').click(function(){
		var row = $(this).parents('li');
		var company = row.data('empresa');
		var contact = row.data('contacto');

		var dir = company.calle + ' #' + company.numero + ', ' + company.colonia + ', ' + company.ciudad + ', ' + company.estado + ', CP: ' + company.codigo_postal;
		var nombre = document.getElementById('e_nombre');
		var direccion = document.getElementById('e_direccion');
		var telefono = document.getElementById('e_telefono');
		var correo = document.getElementById('e_correo');
		var contacto = document.getElementById('e_contacto');
		var puesto = document.getElementById('e_puesto');

		nombre.innerHTML = '<p class="texto-descripcion">'+ company.nombre +'</p>';
		direccion.innerHTML = '<p class="texto-descripcion">'+ dir +'</p>';
		telefono.innerHTML = '<p class="texto-descripcion">'+ company.telefono +'</p>';
		correo.innerHTML = '<p class="texto-descripcion">'+ company.correo +'</p>';
		contacto.innerHTML = '<p class="texto-descripcion">'+ contact.nombre +'</p>';
		puesto.innerHTML = '<p class="texto-descripcion">'+ contact.puesto +'</p>';
	});

});