<?php require '../include/imagenes.php'; $image = new Imagenes(); ?> <?php $slidershow = $image->slideshow(); ?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Menú, Vídeo e imágenes</title>
  <meta name="description" content="">
  

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <link rel="stylesheet" href="../css/style.css">
  
  <link rel="stylesheet" href="../js/coin-slider/coin-slider-styles.css" type="text/css" media="screen"/>
  
  <!-- Menu  -->
    <link href="../js/menu/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />

    <link href="../js/menu/css/dropdown/themes/adobe.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
   
   <!-- End Menu  --> 

   <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via build script -->
  <script src="../js/plugins.js"></script>
  <script src="../js/script.js"></script>
      <script src="../js/coin-slider/coin-slider.min.js"></script>
  <script type="text/javascript">
	  
		
	 <?php if( !empty( $slidershow ) ): ?>
      
	  var images = new Array( 
	  
	  		<?php for( $i=0; $i<count($slidershow); $i++ ): ?>
	
					<?php if( $i == 0 ) echo "\"" . $slidershow[$i]['name'] ."\"" ?>
					<?php if( $i > 0 ) echo  ", \"" . $slidershow[$i]['name'] ."\"" ?>
	
			<?php endfor; ?>
	  )
	  
	 
	 
	 <?php endif; ?>	
	 
	 var slider = '';
	 
	 $.each( images, function( key, value ){
	 	 
		 slider += '<a href="javascript: void(0)" target="_blank">';
         slider += '<img src="files/'+value+'" alt="'+value+'" >';
         slider += '</a>';			
				
	 }); 
	 
	 $(document).ready(function() {
		
		$( '#images' ).html( slider );
		
		$('#coin-slider').coinslider({ 
			
			width: 700, // width of slider panel
			height: 300, // height of slider panel
			spw: 7, // squares per width
			sph: 5, // squares per height
			delay: 3000, // delay between images in ms
			sDelay: 30, // delay beetwen squares in ms
			opacity: 0.7, // opacity of title and navigation
			titleSpeed: 500, // speed of title appereance in ms
			effect: 'random', // random, swirl, rain, straight
			navigation: false, // prev next and buttons
			links : true, // show images as links
			hoverPause: true // pause on hover

		
		});
	
	});
	
	 
  </script>	
    

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except this Modernizr build.
       Modernizr enables HTML5 elements & feature detects for optimal performance.
       Create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="../js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header>
	 	
              
        
        
  </header>
  	 
     <nav>	
     
       
    <ul id="nav" class="dropdown dropdown-horizontal">

				<li><a href="<?php echo Settings::base_url(); ?>">Home</a></li>

				<li><a href="javascript:void(0)" class="dir">Imágenes</a>

					<ul>

						
						<li><a href="<?php echo Settings::base_url(); ?>imagenes/">Ver Todas</a></li>

						<li><a href="<?php echo Settings::base_url(); ?>imagenes/crear.php">Subir Nueva</a></li>
                        
                        <li><a href="<?php echo Settings::base_url(); ?>imagenes/editar.php">Editar Imagenes</a></li>
						
					</ul>

				</li>

				<li><a href="javascript:void(0)" class="dir">Vídeos</a>

					<ul>

						<li><a href="<?php echo Settings::base_url(); ?>videos/">Ver Todas</a></li>

						<li><a href="<?php echo Settings::base_url(); ?>videos/crear.php">Subir Nueva</a></li>
                        
                        <li><a href="<?php echo Settings::base_url(); ?>videos/editar.php">Editar Vídeos</a></li>

						
					</ul>

				</li>

				

			</ul>

    
          
      </nav>
    
    <br /><br /> 
    
    <section id="mainContent">
		
		<article>
			
         <div id='coin-slider'>
           
      	            
           
           			
                    <div id="images"></div>
                    
                    
                
            
        </div>
        
    

  <!-- end scripts -->    
        
            
        </article>              
       
      
      </section>         
                 
  <footer>

  </footer>


 
  

  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>