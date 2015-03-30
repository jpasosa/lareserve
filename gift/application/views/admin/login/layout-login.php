<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

     <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/fonts.css')?>">

  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	
	<!-- PAGE LEVEL PLUGINS STYLES -->
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/plugins/gritter/jquery.gritter.css')?>" />	

    <!-- Tc core CSS -->
	<link id="qstyle" rel="stylesheet" href="<?php echo base_url('assets/css/themes/style.css')?>">	
	<!--[if lte IE 8]>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ie-fix.css')?>" />
	<![endif]-->
	
	
    <!-- Add custom CSS here -->

	<!-- End custom CSS here -->
	
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets/js/html5shiv.js')?>"></script>
    <script src="<?php echo base_url('assets/js/respond.min.js')?>"></script>
    <![endif]-->



	
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

  <body class="login">
	<div id="wrapper">
		
			<!-- BEGIN MAIN PAGE CONTENT -->
			
			<?php if(isset($contenido)):?>
        
        	<?php $this->load->view($contenido) ?>
        
        	<?php endif; ?>		
	
			
			
			<!-- END LOGIN BOX -->
				
				
				
				
		
			<!-- END MAIN PAGE CONTENT --> 
	</div> 
	 
    <!-- core JavaScript -->
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>
	
	<!-- PAGE LEVEL PLUGINS JS -->
	
    <!-- Themes Core Scripts -->	
	<script src="<?php echo base_url('assets/js/main.js')?>"></script>

	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<script src="<?php echo base_url('assets/js/speech-commands.js')?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/gritter/jquery.gritter.min.js')?>"></script>	
	
	<!-- initial page level scripts for examples -->	
	<script type="text/javascript">
		function show_box(id) {
			jQuery('.login-box.visible').removeClass('visible');
			jQuery('#'+id).addClass('visible');
		}
	</script>
  </body>
</html>