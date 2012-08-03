<?php 
// Settings
class Settings{
	
 /**
  | @var name
  | @access -> private
  | @default: Settings
  **/	
  private $name = 'Settings';

 /**
  | @var server
  | @access -> private
  | @default: localhost
  **/	
  private $server = 'localhost';

 /**
  | @var user
  | @access -> private
  | @default: root
  **/	
  private $user = 'root';

 /**
  | @var password
  | @access -> private
  | @default: 
  **/	
  private $password = '';

 /**
  | @var database
  | @access -> private
  | @default: 
  **/	
  private $database = 'app-imgvid';

 /**
  | @var con
  | @access -> private
  | @default: null
  **/	
  private $con = null;	
   
// Construct Setting null conection
  public function __construct(){
  		
  	  $this->con = null;	
  	    	    		
  }	

 /**
  | @function con
  | @access -> public
  | @return $con
  **/		
  public function con(){
  	  	
		$this->con = mysql_connect( $this->server, $this->user, $this->password ); 		
		mysql_select_db( $this->database, $this->con );	 		
 		
		if( !$this->con ){ echo '<h1>Error: Nose puede conectar a la base de datos</h1>'; exit; }
		
 		if( $this -> con ){
 			return $this -> con;
 		}
				 
	 
  	
  }	
  
  public static function base_url(){
		
// Setting your url here http://www.domain.com/	
	return 'http://www.domain.com/';
			 
  }
  
}
?>