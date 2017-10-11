$(document).ready( function(){//Comprueba que el documento se cargo correctamente

	//Eliminar historia
	$('.btn-showDelete').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var historia = row.data('historia');

		document.getElementById('h_id').innerHTML = '<input type="hidden" name="id" value="'+historia.id+'"/>';
		document.getElementById('h_titulo').innerHTML = '<p class="texto-descripcion">'+ historia.titulo +'</p>';
		document.getElementById('h_descripcion').innerHTML = '<p class="texto-descripcion">'+ historia.descripcion +'</p>';
		document.getElementById('h_imgen').innerHTML = '<img src=/'+historia.imagen_url+'>';

	});

	//ver historia
	$('.btn-show').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var historia = row.data('historia');

		document.getElementById('hv_titulo').innerHTML = '<p class="texto-descripcion">'+ historia.titulo +'</p>';
		document.getElementById('hv_descripcion').innerHTML = '<p class="texto-descripcion">'+ historia.descripcion +'</p>';
		document.getElementById('hv_imgen').innerHTML = '<img src=/'+historia.imagen_url+'>';

	});

	//Ver imagen en crear historia
	$('#file-input').change(function(e){
		addImage(e);
	});

	function addImage(e){
		var file = e.target.files[0],
		imageType = /image.*/;

		if (!file.type.match(imageType))
			return;

		var reader = new FileReader();
		reader.onload = fileOnload;
		reader.readAsDataURL(file);
	}

	function fileOnload(e){
     	var result=e.target.result;
     	$('#imgSalida').attr("src",result);
     }

});