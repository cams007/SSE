$(document).ready( function(){//Comprueba que el documento se cargo correctamente

	//Eliminar tip
	$('.btn-showDelete').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var tip = row.data('tip');

		//var imagen_url="\""+'url('+tip.imagen_url+')'+"\"";<input type="text" name="titulo" required/>
		document.getElementById('t_id').innerHTML = '<input type="hidden" name="id" value="'+tip.id+'"/>';
		document.getElementById('t_titulo').innerHTML = '<p class="texto-descripcion">'+ tip.titulo +'</p>';
		document.getElementById('t_descripcion').innerHTML = '<p class="texto-descripcion">'+ tip.descripcion +'</p>';
		document.getElementById('t_imgen').innerHTML = '<img src=/'+tip.imagen_url+'>';

	});

	//Ver informacion
	$('.btn-show').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var tip = row.data('tip');

		document.getElementById('tv_titulo').innerHTML = '<p class="texto-descripcion">'+ tip.titulo +'</p>';
		document.getElementById('tv_descripcion').innerHTML = '<p class="texto-descripcion">'+ tip.descripcion +'</p>';
		document.getElementById('tv_imgen').innerHTML = '<img src=/'+tip.imagen_url+'>';

	});


	//Ver imagen en crear tip
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