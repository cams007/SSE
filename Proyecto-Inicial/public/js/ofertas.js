$(document).ready(function() {
   
	$('.btn-empresa').click(function(){
		var row = $(this).parents('tr');
		var empresa = row.data('empresa');
		var contact = row.data('contacto');

		var dir = empresa.calle + ' #' + empresa.numero + ', ' + empresa.colonia + ', ' + empresa.ciudad + ', ' + empresa.estado + '; ' + empresa.codigo_postal;
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

		var puesto = document.getElementById('oferta_puesto');
		var name_empresa = document.getElementById('oferta_empresa');
		var salario = document.getElementById('oferta_salario');
		
		puesto.innerHTML = oferta.titulo_empleo;
		name_empresa.innerHTML = empresa.nombre;
		salario.innerHTML = '$' + oferta.salario;

		
	});

});