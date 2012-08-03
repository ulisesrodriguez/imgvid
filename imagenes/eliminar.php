<?php 
	require '../include/imagenes.php'; 
	
	$image = new Imagenes(); 
	
	if( $image->delete( $_GET['id'] ) == true ){
		
		echo '<script type="text/javascript">
			  	alert( "Se elimino correctamente la imagen" );
				window.location="index.php";
			  </script>';
		
	}else{
		
		echo '<script type="text/javascript">
			  	alert( "No se puede eliminar correctamente la imagen. Intentelo mas tarde" );
				window.location="editar.php?id='.$_GET['id'].'";
			  </script>';
		
	}
	

?>  