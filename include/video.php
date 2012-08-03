<?php
// Include Files
require 'settings.php';

// Class Videos
class Videos{
	
// Atributes

// Save return data 
  private $data = array();

// Directory  
  private $directory = '../videos/files/';

// Video Public access
  public $video = null;
  
// Conection
  private $conection = null;
  
// Methods  
  
// Construct Clena Vars 
  public function __construct(){ 
  	
// Clean data		
		unset( $this->data ); 
		
		$this->data = array(); 
		
// Valid Directory 		
		if( !is_dir( $this->directory ) ){ echo '<h1>Does don\'t exist that directory: '.$this->directory.'</h1>'; exit; }
		
		$this->conection = new Settings();	
		
		$this->video = null;
  	
  }

// Create Video 
  public function create(){

// Valid video format and setting codecs  	
	if ( $_FILES['video']['type'] != "video/avi" 
      and $_FILES['video']['type'] != "video/mp4" 
	  and $_FILES['video']['type'] != "video/webm" 
	  and $_FILES['video']['type'] != "video/x-ms-wmv" 
      and $_FILES['video']['type'] != "video/x-msvideo" 
      and $_FILES['video']['type'] != "video/mpeg"
      and $_FILES['video']['type'] != "video/quicktime" 
      and $_FILES['video']['type'] != "video/x-msvideo"
      and $_FILES['video']['type'] != "video/x-flv"
      and $_FILES['video']['type'] != "application/octet-stream"
      and $_FILES['video']['type'] != "application/x-shockwave-flash" )return false;
	  
	 
	
	
// Upload file
	$file = explode( '.', $_FILES['video']['name'] );
	$name = strtolower( $file[0] );
	$name = str_replace( '/', '-', $name );
	$name = str_replace( ' ', '-', $name );	
		
	move_uploaded_file( $_FILES['video']['tmp_name'], $this->directory . $name.'.'.$file[1] );
	
	$sql  = 'INSERT INTO `videos`( `id`, `name` )';
	$sql .= 'VALUES( null, \''.strip_tags( $name.'.'.$file[1] ).'\');';
	
	$res = mysql_query( $sql, $this->conection->con() );
	
	$this->video = strip_tags( $name.'.'.$file[1] );
	
	if( !empty( $res ) )
		return true;
	else
		return false;
	
			
  }

// Update Video 
  public function show( $id = 0 ){
	  
// Valid id
   if( empty( $id ) ) return false;
   
   if( !is_numeric( $id ) ) return false;
   
// Return Old Video
     $sql  = 'SELECT `name`';
	 $sql .= 'FROM `videos`';
	 $sql .= 'WHERE `id`=\''.strip_tags( $id ).'\' LIMIT 1;';
	 
	 $res = mysql_query( $sql, $this->conection->con() );
	 	 	 
	 if( $reg = mysql_fetch_assoc( $res ) ){ 				
			$this->data[] = $reg;
			$this->video = $this->directory . $this->data[0]['name'];
	 }else 
	 		return false;	
  }
  
  
// Update Video 
  public function edit( $id = 0 ){
	  
// Valid id
   if( empty( $id ) ) return false;
   
   if( !is_numeric( $id ) ) return false;
   
// Return Old Video
     $sql  = 'SELECT `name`';
	 $sql .= 'FROM `videos`';
	 $sql .= 'WHERE `id`=\''.strip_tags( $id ).'\' LIMIT 1;';
	 
	 $res = mysql_query( $sql, $this->conection->con() );
	 
	 if( $reg = mysql_fetch_assoc( $res ) )	 				
			$this->data[] = $reg;
	 else 
	 		return false;	
	
	$this->video = $this->directory . $this->data[0]['name'];
	
	if( is_file( $this->video ) )
			unlink( $this->video );
	
	 	
	
// Valid video format and setting codecs  	
	if ( $_FILES['video']['type'] != "video/avi" 
      and $_FILES['video']['type'] != "video/mp4" 
	  and $_FILES['video']['type'] != "video/webm" 
	  and $_FILES['video']['type'] != "video/x-ms-wmv" 
      and $_FILES['video']['type'] != "video/x-msvideo" 
      and $_FILES['video']['type'] != "video/mpeg"
      and $_FILES['video']['type'] != "video/quicktime" 
      and $_FILES['video']['type'] != "video/x-msvideo"
      and $_FILES['video']['type'] != "video/x-flv"
      and $_FILES['video']['type'] != "application/octet-stream"
      and $_FILES['video']['type'] != "application/x-shockwave-flash" )return false;
	
	
// Upload file
	$file = explode( '.', $_FILES['video']['name'] );
	$name = strtolower( $file[0] );
	$name = str_replace( '/', '-', $name );
	$name = str_replace( ' ', '-', $name );	
		
	move_uploaded_file( $_FILES['video']['tmp_name'], $this->directory . $name.'.'.$file[1] );

					
	$sql  = 'UPDATE `videos` SET  `name`=\''.strip_tags( $name.'.'.$file[1] ).'\'';
	$sql .= 'WHERE `id`=\''.strip_tags( $id ).'\';';
		 
	$res = mysql_query( $sql, $this->conection->con() );
	
	$this->video = null;
	
	$this->video = strip_tags( 'files/' . $name.'.'.$file[1] );
	
	if( !empty( $res ) )
		return true;
	else
		return false;
	
			
  }

// Delete Video 
  public function delete( $id = 0 ){
	  
// Valid id
   if( empty( $id ) ) return false;
   
   if( !is_numeric( $id ) ) return false;
   
// Return Old Image
     $sql  = 'SELECT `name`';
	 $sql .= 'FROM `videos`';
	 $sql .= 'WHERE `id`=\''.strip_tags( $id ).'\';';
	 
	 $res = mysql_query( $sql, $this->conection->con() );
	 
	 if( $reg = mysql_fetch_assoc( $res ) )	 				
			$this->data[] = $reg;
	 else 
	 		return false;	
	
	$this->video = null;
	
	$this->video = $this->directory . $this->data[0]['name'];
	
	if( is_file( $this->video ) )
			unlink( $this->video );
	

					
	$sql  = 'DELETE FROM `videos`';
	$sql .= 'WHERE `id`=\''.strip_tags( $id ).'\';';
		 
	$res = mysql_query( $sql, $this->conection->con() );
	
	if( !empty( $res ) )
		return true;
	else
		return false;
	
			
  }
  
// Videos
  public function all(){
  
	 
	 $sql  = 'SELECT `id`, `name`';
	 $sql .= 'FROM `videos`';
		 
	 $res = mysql_query( $sql, $this->conection->con() );
	 
	 if( !empty( $res ) ){
	 	
		while( $reg = mysql_fetch_assoc( $res ) ){
			
			$this->data[] = $reg;
			
		}
		
		return $this->data;
		
	 }else{
	 	return false;
	 }
	
  }	 
  
}
?>