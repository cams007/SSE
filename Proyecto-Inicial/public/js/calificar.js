$( document ).ready( function()
{
	$('.btn-empresa').click(function()
	{
		var row = $(this).parents('div');
		var empresa = row.data('empresa');

		var nombre = document.getElementById( 'empresa_id' );

		nombre.innerHTML = '<p class="texto-descripcion">'+ empresa.id +'</p>';
	});

});