$(document).ready(function() {
   
	// var row = $(this).parents('tr');
	// var empresa = row.data('empresa');
	// if (empresa == null){
	// 	window.location = APP_URL;
	// }

	$('.btn-empresa').click(function(){
		var row = $(this).parents('div');
		var empresa = row.data('empresa');

		var nombre = document.getElementById('empresa_id');

		nombre.innerHTML = '<p class="texto-descripcion">'+ empresa.id +'</p>';
	});

});