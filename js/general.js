// JavaScript Document
/**
 | Object General Functions
 | Developer by Ulises Rodriguez http://www.ulisesrodriguez.com	
 |
 |	Usage
 |	
 |	var general = new General();
 |	
 |	if( general. method( value ) == true ) do something; 
 **/

// Object General

var General = {

// Setting base url	example: http://www.domain.com/
	base         	:  'http://localhost/buildapps/jorge/',

// General Validations

/*
 |	Valid a Integer Number
 |	number - Number to validate 	
 */
	validInteger	: 	function( number ){
		
		// Regular Expresion
		if ( !/^([0-9])*$/.test( number ) ){
	 		
			return false;
 
		}else{
		
			return true;
		
		}
	
	},

/*
 |	Valid a Float Number	
 |  number - Number to validate
 */
	validFloat	:	function( number ){
		 
		 // Regular Expresion
		 if ( !/^([0-9])*[.]?[0-9]*$/.test( number ) ){
  		
				return false;
				
		  }else{
			
				return true;
			
		  }
	
	},

/* 
 |	Number Format
 |	number - Number to format 
 */
	numberFormat	:	function( number ){
		
		var pos;
		val=number.split(",").join(""); // remove existing commas if present.
		var dot=val.indexOf("."); // locate decmal
		
		if(dot<0) dot=val.length; // use end if no decimal
		
		var r="";
		
		for(pos=dot-3;pos>=1;pos-=3) // put commas in
			
			r="."+val.substr(pos,3)+r;
			r=val.substring(0,pos+3)+r; // put start of string on
			dot=val.indexOf("."); // check for decimal
		
		if(dot>0)r+=val.substring(dot);// put fraction part on
		
		return r;
		
	
	},	

/*
 |	Valid a Email format
 |	email - Email to validate
 */ 
 	validEmail	:	function( email ){
		
		// Regular Expresion
		if ( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test( email ) ){
		
			return true; 
		
		} else {
			
			return false;
		
		}
	
	},

/* 
 | Valid URL
 | url - Url to validate
 */
	validUrl	:	function( url ){
		
		// Regular Expresion				
		if ( /^(http|ftp)(s)?:\/\/\w+(\.\w+)*(-\w+)?\.([a-z]{2,3}|info|mobi|aero|asia|name)(:\d{2,5})?(\/)?((\/).+)?$/.test( url ) ){
		
			return true;	
		
		}else{
		
			return false;
		
		}
			
	
	},

/*
 |	Valid empty value
 |	value - Validate if the value is empty 
 */
	empty	:	function( value ){
		
		if( value.length == 0 ){
			
			return false;
		
		}else{
			
			return true;
			
		}		
	
	
	},

// General Functions	

/* 
 |	Delete Record
 |	url - Url to locate if user want delete that record
 */
    delete	:	function( url ){
		
		if( confirm( "You want delete this record?" ) ){
			
			window.location = this.base+url;
		
		}
		
	}
	

}