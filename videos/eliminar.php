<?php 
	require '../include/video.php'; 
	
	$video = new Videos(); 
	
	if( $video->delete( $_GET['id'] ) == true ){
		
		echo '<script type="text/javascript">
			  	alert( "Se elimino correctamente el video" );
				window.location="index.php";
			  </script>';
		
	}else{
		
		echo '<script type="text/javascript">
			  	alert( "No se puede eliminar correctamente el video. Intentelo mas tarde" );
				window.location="editar.php?id='.$_GET['id'].'";
			  </script>';
		
	}
	

?>  