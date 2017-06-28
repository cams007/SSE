$(document).ready(function() {

	$('.btn-evento').click(function(){
		var row = $(this).parents('li');
		var evento = row.data('evento');

		document.getElementById('e_titulo').innerHTML = evento.nombre;
		document.getElementById("e_imagen").src = evento.imagen_url;
		document.getElementById('e_descripcion').innerHTML = '<p>'+evento.descripcion+'" </p>';
		document.getElementById('e_fecha').innerHTML = '<p class="texto-descripcion">'+ evento.fecha +'</p>';
		document.getElementById('e_lugar').innerHTML = '<p class="texto-descripcion">'+ evento.lugar +'</p>';
	});

});