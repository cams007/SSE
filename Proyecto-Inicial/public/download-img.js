function descarga()
{
	console.log( "Esto es una prueba" );
}

function downloadImg()
{
	var node = document.getElementById( 'chart' );
    
	console.log( "Descarga la imagen??" );

	domtoimage.toJpeg(document.getElementById( node ), { quality: 0.95 })
	.then(function (dataUrl) {
		var link = document.createElement('a');
		link.download = 'my-image-name.jpeg';
		link.href = dataUrl;
		link.click();
		});
}
