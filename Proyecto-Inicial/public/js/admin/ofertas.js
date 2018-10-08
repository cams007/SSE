$(document).ready( function()
{
	//Comprueba que el documento se cargo correctamente
	//Eliminar oferta
	$('.btn-showDelete').click(function()
	{
		//accedemos a la clase del index. btn-delet
		var row = $( this ).parents( 'tr' );
		var oferta = row.data( 'oferta' );
		var empresa = row.data( 'empresa' );

		document.getElementById( 'oferta_id' ).innerHTML = '<input type="hidden" name="oferta_id" value="'+oferta.id +'"/>';
            document.getElementById( 'getOfertaD' ).innerHTML = '<p class="texto-descripcion">' + oferta.titulo_empleo +'</p>';
            document.getElementById( 'getEmpresaD' ).innerHTML = '<p class="texto-descripcion">'+ empresa.nombre +'</p>';
            document.getElementById( 'getDescripcionD' ).innerHTML = '<p class="texto-descripcion">'+ oferta.descripcion +'</p>';
            document.getElementById( 'getUbicacionD' ).innerHTML = '<p class="texto-descripcion">'+ oferta.ubicacion +'</p>';
            document.getElementById( 'getSalarioD' ).innerHTML = '<p class="texto-descripcion">'+ '$' + oferta.salario + ' MXN' + '</p>';
            document.getElementById( 'getExperienciaD' ).innerHTML = '<p class="texto-descripcion">'+ oferta.experiencia + ' año(s) de experiencia' +'</p>';
		document.getElementById( 'getStatusD' ).innerHTML = '<p class="texto-descripcion">'+ oferta.status +'</p>';
		document.getElementById( 'getCarreraD' ).innerHTML = '<p class="texto-descripcion">'+ Carrera(oferta.carrera) +'</p>';
	});

	// Ver Oferta
      $('.btn-show').click(function()
      {
            var row = $( this ).parents( 'tr' );
		var oferta = row.data( 'oferta' );
		var empresa = row.data( 'empresa' );

            document.getElementById( 'getOferta' ).innerHTML = '<p class="texto-descripcion">'+ oferta.titulo_empleo +'</p>';
            document.getElementById( 'getEmpresa' ).innerHTML = '<p class="texto-descripcion">'+ empresa.nombre +'</p>';
            document.getElementById( 'getDescripcion' ).innerHTML = '<p class="texto-descripcion">'+ oferta.descripcion +'</p>';
            document.getElementById( 'getUbicacion' ).innerHTML = '<p class="texto-descripcion">'+ oferta.ubicacion +'</p>';
            document.getElementById( 'getSalario' ).innerHTML = '<p class="texto-descripcion">'+ '$' + oferta.salario + ' MXN' + '</p>';
            document.getElementById( 'getExperiencia' ).innerHTML = '<p class="texto-descripcion">'+ oferta.experiencia + ' año(s) de experiencia' +'</p>';
		document.getElementById( 'getStatus' ).innerHTML = '<p class="texto-descripcion">'+ oferta.status +'</p>';
		document.getElementById( 'getCarrera' ).innerHTML = '<p class="texto-descripcion">'+ Carrera(oferta.carrera) +'</p>';
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