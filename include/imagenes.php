<?php
// Include Files
require 'settings.php';
require 'resize.php';

// Class Imagenes
class Imagenes{
	
// Atributes

// Save return data 
  private $data = array();

// Directory  
  private $directory = '../imagenes/files/';

// Imagen Public access
  public $image = null;
  
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
		
		$this->image = null;
  	
  }

// Create Imagen 
  public function create(){

// Valid Image format  	
	if( $_FILES['foto']['type'] != 'image/png' and  $_FILES['foto']['type'] != 'image/jpeg' ) return false;

// Upload file
	$name = strtolower( $_FILES['foto']['name'] );
	
	move_uploaded_file( $_FILES['foto']['tmp_name'], $this->directory . $name );
	
// Setting width and heigth
    $this->tumbails( $this->directory . $name );
					
	$sql  = 'INSERT INTO `fotos`( `id`,  `name`, `nameTumb` )';
	$sql .= 'VALUES( null,  \''.strip_tags( $name ).'\', \''.strip_tags( $name ).'\' );';
	
	$res = mysql_query( $sql, $this->conection->con() );
	
	if( !empty( $res ) )
		return true;
	else
		return false;
	
			
  }
  
// show old image   
  public function show( $id = 0 ){
  	
// Valid id
   if( empty( $id ) ) return false;
   
   if( !is_numeric( $id ) ) return false;
	
// Return Old Image
     $sql  = 'SELECT `name`';
	 $sql .= 'FROM `fotos`';
	 $sql .= 'WHERE `id`=\''.strip_tags( $id ).'\';';
	 
	 $res = mysql_query( $sql, $this->conection->con() );
	 
	 if( $reg = mysql_fetch_assoc( $res ) )	 				
			$this->data[] = $reg;
	 else 
	 		return false;
	 
	 $this->image = $this->directory . $this->data[0]['name'];

	 	
  } 
  
// Update Imagen 
  public function edit( $id = 0 ){
	  
// Valid id
   if( empty( $id ) ) return false;
   
   if( !is_numeric( $id ) ) return false;
   
// Return Old Image
     $sql  = 'SELECT `name`';
	 $sql .= 'FROM `fotos`';
	 $sql .= 'WHERE `id`=\''.strip_tags( $id ).'\';';
	 
	 $res = mysql_query( $sql, $this->conection->con() );
	 
	 if( $reg = mysql_fetch_assoc( $res ) )	 				
			$this->data[] = $reg;
	 else 
	 		return false;	
	
	$this->image = $this->directory . $this->data[0]['name'];
	
	if( is_file( $this->image ) )
			unlink( $this->image );
	
	 	
	
// Valid Image format  	
   if( $_FILES['foto']['type'] != 'image/png' and  $_FILES['foto']['type'] != 'image/jpeg' ) return false;

// Upload file
	$name = strtolower( $_FILES['foto']['name'] );
	
	move_uploaded_file( $_FILES['foto']['tmp_name'], $this->directory . $name );
	
// Setting width and heigth
    $this->tumbails( $this->directory . $name );
					
	$sql  = 'UPDATE `fotos` SET  `name`=\''.strip_tags( $name ).'\'';
	$sql .= 'WHERE `id`=\''.strip_tags( $id ).'\';';
		 
	$res = mysql_query( $sql, $this->conection->con() );
	
	if( !empty( $res ) )
		return true;
	else
		return false;
	
			
  }

// Delete Imagen 
  public function delete( $id = 0 ){
	  
// Valid id
   if( empty( $id ) ) return false;
   
   if( !is_numeric( $id ) ) return false;
   
// Return Old Image
     $sql  = 'SELECT `name`';
	 $sql .= 'FROM `fotos`';
	 $sql .= 'WHERE `id`=\''.strip_tags( $id ).'\';';
	 
	 $res = mysql_query( $sql, $this->conection->con() );
	 
	 if( $reg = mysql_fetch_assoc( $res ) )	 				
			$this->data[] = $reg;
	 else 
	 		return false;	
	
	$this->image = $this->directory . $this->data[0]['name'];
	
	if( is_file( $this->image ) )
			unlink( $this->image );
	

					
	$sql  = 'DELETE FROM `fotos`';
	$sql .= 'WHERE `id`=\''.strip_tags( $id ).'\';';
		 
	$res = mysql_query( $sql, $this->conection->con() );
	
	if( !empty( $res ) )
		return true;
	else
		return false;
	
			
  }
  
// Slideshow
  public function slideshow(){
  
	 
	 $sql  = 'SELECT `id`, `name`';
	 $sql .= 'FROM `fotos`';
	
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

/*
 | Create Tumbail Image  	
 | $image = image to edit
 | $width = setting 700 for default nivo slide
 | $heigth = setting 300 for default nivo slide
 */ 
  public function tumbails( $image, $width = 700, $heigth = 300 ){
  	 
	 if( empty( $image ) ) return false;
	 
	 if( !is_file( $image ) ) return false;
	 
	 $resizeObj = new resize( $image  );
     $resizeObj -> resizeImage( $width, $heigth, 0);
     $resizeObj -> saveImage( $image, 100 );
	 
	 $this->image = $image;
	 	 	 
	 return false;
	 		 
  }
  
}
?>