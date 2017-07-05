$(document).ready(function() {

	$('.seguirLeyendo').click(function(){
		var row = $(this).parents('li');
		var tip = row.data('tip');

		document.getElementById('h_titulo').innerHTML = tip.titulo;
		document.getElementById("h_imagen").src = tip.imagen_url;
		document.getElementById('h_descripcion').innerHTML = '<p>'+tip.descripcion+'" </p>';
	});

});