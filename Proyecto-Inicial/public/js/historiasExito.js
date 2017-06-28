$(document).ready(function() {

	$('.seguirLeyendo').click(function(){
		var row = $(this).parents('li');
		var historia = row.data('historia');

		document.getElementById('h_titulo').innerHTML = historia.titulo;
		document.getElementById("h_imagen").src = historia.imagen_url;
		document.getElementById('h_descripcion').innerHTML = '<p>'+historia.descripcion+'" </p>';
	});

});