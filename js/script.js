/* Author:Ulises Rodriguez

*/
 	
// Menu

/*
Author: Adrian Mato
Author URI: http://web.ontuts.com
*/



// Imagen Object
var Imagen = {

// Crear Imagen
  crear	:	function(){
  	 
	 if( $( '#foto' ).val() == 0 ){
	 	
		alert( 'El campo de imagen esta vacio: seleccione una imagen de su ordenador' );
		return false;
		
	 }
	 
	$( '#imagen' ).submit();
	
  }
 

}

// Video Object
var Video = {

// Crear Imagen
  crear	:	function(){
  	 
	 if( $( '#videos' ).val() == 0 ){
	 	
		alert( 'El campo de video esta vacio: seleccione un video de su ordenador' );
		return false;
		
	 }
	 
	$( '#form' ).submit();
	
  }
 

}