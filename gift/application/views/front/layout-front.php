<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Gift - Spa belgrano</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/front/images/favicon.ico')?>" type="image/x-icon">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />  
	<link href="<?php echo base_url('assets/front/css/style.css')?>" rel="stylesheet"/> 
	<link href="<?php echo base_url('assets/front/css/colors/style-color-01.css') ?>" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/contact.css')?>">	
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/simple-line-icons.css')?>">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>


<?php if(isset($css_files)):?>
	<?php foreach($css_files as $css):?>
	<link type="text/css" rel="stylesheet" href="<?php echo $css;?>" />
	<?php endforeach;?>

	<?php foreach($js_files as $js):?>
	<script src="<?php echo $js;?>"></script>
	<?php endforeach;?>

	<?php else:?>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
	<?php endif;?>    

</head> 
<body>

<div id="wrapper">

	<!-- Start Header -->

	<div id="header">
	
		<div class="container">
			<div class="row">
				<div class="span12">
				
					<h1><a href="home-minimal.html#"><img src="<?php echo base_url('assets/front/images/logo-spa.png')?>" alt="Convert" /></a></h1>
					<h2 class="menulink"><a href="home-minimal.html#">Menu</a></h2>
					
					<!-- Start Menu -->
					<div id="menu">
						
                        
                        
                        
					</div> 
					<!-- End Menu -->
					
				</div>
				<div class="clearfix"></div>
			</div>
			
		</div>
	
	</div>

	<!-- End Header -->

	<!-- Start Content -->
	   
	   <?php if(isset($contenido)):?>
	        
	   <?php $this->load->view($contenido) ?>
	       
	   <?php endif; ?>		
			
    
	<!-- End content -->	
	
	<div class="clearfix"></div> 
	
</div>


<!--[if lte IE 7]><script src="<?php echo base_url('assets/front/js/icons-lte-ie7.js')?>"></script><![endif]-->
<script src="<?php echo base_url('assets/front/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/front/js/respond.min.js')?>"></script>
<script src="<?php echo base_url('assets/front/js/scripts.js')?>"></script>  
<script src="<?php echo base_url('assets/front/js/jquery.form.js')?>"></script>
<script src="<?php echo base_url('assets/front/js/jquery.validate.min.js')?>"></script>
<script src="<?php echo base_url('assets/front/js/contact.js')?>"></script>
        		
</body>
</html>
