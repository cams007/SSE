$(document).ready(function() {

	$('.btn-evento').click(function()
	{
		var row = $(this).parents('li');
		var evento = row.data('evento');

		document.getElementById('e_titulo').innerHTML = '<p class="texto-descripcion">'+evento.nombre+'</p>';
		document.getElementById('e_descripcion').innerHTML = '<p class="texto-descripcion">'+evento.descripcion+'</p>';
		document.getElementById('e_fecha').innerHTML = '<p class="texto-descripcion">'+ evento.fecha +'</p>';
		document.getElementById('e_lugar').innerHTML = '<p class="texto-descripcion">'+ evento.lugar +'</p>';
		document.getElementById('e_imagen').innerHTML = '<img src="'+evento.imagen_url+'" class="iconos" width="20%">';
	});
});