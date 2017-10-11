$(document).ready( function(){//Comprueba que el documento se cargo correctamente

	//Eliminar tip
	$('.btn-showDelete').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var empresa = row.data('empresa');

		//var imagen_url="\""+'url('+tip.imagen_url+')'+"\"";<input type="text" name="titulo" required/>
		document.getElementById('e_id').innerHTML = '<input type="hidden" name="id" value="'+empresa.id+'"/>';
		document.getElementById('e_nombre').innerHTML = '<p class="texto-descripcion">'+ empresa.nombre +'</p>';
		document.getElementById('e_descripcion').innerHTML = '<p class="texto-descripcion">'+ empresa.descripcion +'</p>';
		document.getElementById('e_rfc').innerHTML = '<p class="texto-descripcion">'+ empresa.rfc +'</p>';
		document.getElementById('e_sector').innerHTML = '<p class="texto-descripcion">'+ empresa.sector +'</p>';
		document.getElementById('e_giro').innerHTML = '<p class="texto-descripcion">'+ empresa.giro +'</p>';
		document.getElementById('e_tel').innerHTML = '<p class="texto-descripcion">'+ empresa.telefono +'</p>';
		document.getElementById('e_correo').innerHTML = '<p class="texto-descripcion">'+ empresa.correo +'</p>';
		document.getElementById('e_calle').innerHTML = '<p class="texto-descripcion">'+ empresa.calle +'</p>';
		document.getElementById('e_numero').innerHTML = '<p class="texto-descripcion">'+ empresa.numero +'</p>';
		document.getElementById('e_colonia').innerHTML = '<p class="texto-descripcion">'+ empresa.colonia +'</p>';
		document.getElementById('e_ciudad').innerHTML = '<p class="texto-descripcion">'+ empresa.ciudad +'</p>';
		document.getElementById('e_estado').innerHTML = '<p class="texto-descripcion">'+ empresa.estado +'</p>';
		document.getElementById('e_codigoP').innerHTML = '<p class="texto-descripcion">'+ empresa.codigo_postal +'</p>';
		document.getElementById('e_paginaWeb').innerHTML = '<p class="texto-descripcion">'+ empresa.pagina_web +'</p>';
		document.getElementById('e_imgen').innerHTML = '<img src=/'+empresa.imagen_url+'>';

	});

	//Ver tip
	$('.btn-show').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var empresa = row.data('empresa');

		//var imagen_url="\""+'url('+tip.imagen_url+')'+"\"";<input type="text" name="titulo" required/>
		document.getElementById('ev_id').innerHTML = '<input type="hidden" name="id" value="'+empresa.id+'"/>';
		document.getElementById('ev_nombre').innerHTML = '<p class="texto-descripcion">'+ empresa.nombre +'</p>';
		document.getElementById('ev_descripcion').innerHTML = '<p class="texto-descripcion">'+ empresa.descripcion +'</p>';
		document.getElementById('ev_rfc').innerHTML = '<p class="texto-descripcion">'+ empresa.rfc +'</p>';
		document.getElementById('ev_sector').innerHTML = '<p class="texto-descripcion">'+ empresa.sector +'</p>';
		document.getElementById('ev_giro').innerHTML = '<p class="texto-descripcion">'+ empresa.giro +'</p>';
		document.getElementById('ev_tel').innerHTML = '<p class="texto-descripcion">'+ empresa.telefono +'</p>';
		document.getElementById('ev_correo').innerHTML = '<p class="texto-descripcion">'+ empresa.correo +'</p>';
		document.getElementById('ev_calle').innerHTML = '<p class="texto-descripcion">'+ empresa.calle +'</p>';
		document.getElementById('ev_numero').innerHTML = '<p class="texto-descripcion">'+ empresa.numero +'</p>';
		document.getElementById('ev_colonia').innerHTML = '<p class="texto-descripcion">'+ empresa.colonia +'</p>';
		document.getElementById('ev_ciudad').innerHTML = '<p class="texto-descripcion">'+ empresa.ciudad +'</p>';
		document.getElementById('ev_estado').innerHTML = '<p class="texto-descripcion">'+ empresa.estado +'</p>';
		document.getElementById('ev_codigoP').innerHTML = '<p class="texto-descripcion">'+ empresa.codigo_postal +'</p>';
		document.getElementById('ev_paginaWeb').innerHTML = '<p class="texto-descripcion">'+ empresa.pagina_web +'</p>';
		document.getElementById('ev_imgen').innerHTML = '<img src=/'+empresa.imagen_url+'>';

	});

	//Ver imagen en crear empresa
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