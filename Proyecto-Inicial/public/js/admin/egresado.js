$(document).ready( function(){//Comprueba que el documento se cargo correctamente

	//Eliminar tip
	$('.btn-showDelete').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var egresado = row.data('egresado');
		var preparacion = row.data('preparacion');

		var nombre_completo = egresado.ap_paterno+' '+egresado.ap_materno+ ' '+egresado.nombres;

		document.getElementById('eg_matricula').innerHTML = '<input type="hidden" name="matricula" value="'+egresado.matricula+'"/>';
		document.getElementById('eg_nombreComp').innerHTML = '<p class="texto-descripcion">'+ nombre_completo +'</p>';
		document.getElementById('eg_curp').innerHTML = '<p class="texto-descripcion">'+ egresado.curp +'</p>';
		if(egresado.genero=='Masculino')
			document.getElementById('eg_genero').innerHTML = '<p class="texto-descripcion">Masculino</p>';
		else
			document.getElementById('eg_genero').innerHTML = '<p class="texto-descripcion">Femenino</p>';
		document.getElementById('eg_fechaNac').innerHTML = '<p class="texto-descripcion">'+ egresado.fecha_nacimiento +'</p>';
		if(egresado.nacionalidad=='Mexicana')
			document.getElementById('eg_nacionalidad').innerHTML = '<p class="texto-descripcion">Mexicana</p>';
		else
			document.getElementById('eg_nacionalidad').innerHTML = '<p class="texto-descripcion">Otra</p>';
		document.getElementById('eg_telefono').innerHTML = '<p class="texto-descripcion">'+egresado.telefono+'</p>';
		document.getElementById('eg_lugarOrig').innerHTML = '<p class="texto-descripcion">'+egresado.lugar_origen+'</p>';
		document.getElementById('egPr_carrera').innerHTML = '<p class="texto-descripcion">'+Carrera(preparacion.carrera)+'</p>';
		document.getElementById('egPr_generacion').innerHTML = '<p class="texto-descripcion">'+preparacion.generacion+'</p>';
		document.getElementById('egPr_fechaI').innerHTML = '<p class="texto-descripcion">'+preparacion.fecha_inicio+'</p>';
		document.getElementById('egPr_fechaF').innerHTML = '<p class="texto-descripcion">'+preparacion.fecha_fin+'</p>';
	});

	//Ver tip
	$('.btn-show').click(function(){//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var egresado = row.data('egresado');
		var preparacion = row.data('preparacion');

		var nombre_completo = egresado.ap_paterno+' '+egresado.ap_materno+ ' '+egresado.nombres;

		document.getElementById('egv_nombreComp').innerHTML = '<p class="texto-descripcion">'+ nombre_completo +'</p>';
		document.getElementById('egv_curp').innerHTML = '<p class="texto-descripcion">'+ egresado.curp +'</p>';
		
		if(egresado.genero=='Masculino')
			document.getElementById('egv_genero').innerHTML = '<p class="texto-descripcion">Masculino</p>';
		else
			document.getElementById('egv_genero').innerHTML = '<p class="texto-descripcion">Femenino</p>';
		
		document.getElementById('egv_fechaNac').innerHTML = '<p class="texto-descripcion">'+ egresado.fecha_nacimiento +'</p>';
		
		if(egresado.nacionalidad=='Mexicana')
			document.getElementById('egv_nacionalidad').innerHTML = '<p class="texto-descripcion">Mexicana</p>';
		else
			document.getElementById('egv_nacionalidad').innerHTML = '<p class="texto-descripcion">Otra</p>';
		
		if( egresado.telefono )
			document.getElementById('egv_telefono').innerHTML = '<p class="texto-descripcion">'+egresado.telefono+'</p>';
		else
			document.getElementById('egv_telefono').innerHTML = '<p class="texto-descripcion">'+"Teléfono no registrado"+'</p>';

		document.getElementById('egv_lugarOrig').innerHTML = '<p class="texto-descripcion">'+egresado.lugar_origen+'</p>';
		document.getElementById('egPrv_carrera').innerHTML = '<p class="texto-descripcion">'+Carrera(preparacion.carrera)+'</p>';
		document.getElementById('egPrv_generacion').innerHTML = '<p class="texto-descripcion">'+preparacion.generacion+'</p>';
		document.getElementById('egPrv_fechaI').innerHTML = '<p class="texto-descripcion">'+preparacion.fecha_inicio+'</p>';
		document.getElementById('egPrv_fechaF').innerHTML = '<p class="texto-descripcion">'+preparacion.fecha_fin+'</p>';
	});

});


function Carrera( n )
{
	switch (n)
	{
		case 0: return "Ingeniero en Diseño";
		case 1: return "Ingeniero en Computación";
		case 2: return "Ingeniero en Alimentos";
		case 3: return "Ingeniero en Electrónica";
		case 4: return "Ingeniero en Mecatrónica";
		case 5: return "Ingeniero  Industrial";
		case 6: return "Ingeniero en Física Aplicada";
		case 7: return "Licenciado en Ciencias Empresariales";
		case 8: return "Licenciado en Matemáticas Aplicadas";
		case 9: return "Licenciado en Estudios Mexicanos";
		case 10: return "Ingeniero en Mecánica Automotriz";
		default: ;
	}
}