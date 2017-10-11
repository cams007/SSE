$(document).ready( function(){//Comprueba que el documento se cargo correctamente

	//Eliminar evento con ventana emergente
	$('.btn-showDelete').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var event = row.data('evento');

		//var imagen_url="\""+'url('+tip.imagen_url+')'+"\"";<input type="text" name="titulo" required/>
		document.getElementById('e_id').innerHTML = '<input type="hidden" name="id" value="'+event.id+'"/>';
		document.getElementById('e_nombre').innerHTML = '<p class="texto-descripcion">'+ event.nombre +'</p>';
		document.getElementById('e_descripcion').innerHTML = '<p class="texto-descripcion">'+ event.descripcion +'</p>';
		document.getElementById('e_lugar').innerHTML = '<p class="texto-descripcion">'+ event.lugar +'</p>';
		document.getElementById('e_fecha').innerHTML = '<p class="texto-descripcion">'+ event.fecha +'</p>';
		document.getElementById('e_categoria').innerHTML = '<p class="texto-descripcion">'+ event.categoria +'</p>';
		document.getElementById('e_imgen').innerHTML = '<img src=/'+event.imagen_url+'>';

	});

	//Ver evento con ventana emergente
	$('.btn-show').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var event = row.data('evento');

		document.getElementById('ev_nombre').innerHTML = '<p class="texto-descripcion">'+ event.nombre +'</p>';
		document.getElementById('ev_descripcion').innerHTML = '<p class="texto-descripcion">'+ event.descripcion +'</p>';
		document.getElementById('ev_lugar').innerHTML = '<p class="texto-descripcion">'+ event.lugar +'</p>';
		document.getElementById('ev_fecha').innerHTML = '<p class="texto-descripcion">'+ event.fecha +'</p>';
		document.getElementById('ev_categoria').innerHTML = '<p class="texto-descripcion">'+ event.categoria +'</p>';
		document.getElementById('ev_imgen').innerHTML = '<img src=/'+event.imagen_url+'>';

	});

	//Ver imagen en crear evento
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