/**
 * Esta funcion se encarga de desacargar el
 * grafico hacieno uso de la libreria:
 * 	dom-to-image y Filesaver
 */
function descargar()
{
	// Obtiene el elemento donde se visualiza el chart
	var node = document.getElementById('chart');
	
	// Convierte en imagen png y lo guarda en el directorio local en la carpeta de descargas.
	domtoimage.toBlob( node )
    		.then(function (blob) {
        	window.saveAs(blob, 'grafica.png');
    	});
}