<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Gift - La Réserve</title>
	<link rel="shortcut icon" href="<?php echo base_url() . TEMPLATE_ASSETS; ?>images/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<link href="<?php echo base_url() . TEMPLATE_ASSETS; ?>css/style.css" rel="stylesheet"/>
	<link href="<?php echo base_url() . TEMPLATE_ASSETS; ?>css/colors/style-color-01.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url() . TEMPLATE_ASSETS; ?>css/contact.css">
	<link rel="stylesheet" href="<?php echo base_url() . TEMPLATE_ASSETS; ?>css/simple-line-icons.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>


</head>
<body>




<div id="wrapper">

	<!-- Start Header -->

	<div id="header">

		<div class="container">
			<div class="row">
				<div class="span12">

					<h1><a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url() . TEMPLATE_ASSETS; ?>images/logo-spa.png" alt="Convert" /></a></h1>
					<h2 class="menulink"><a href="<?php echo base_url(''); ?>">Menu</a></h2>

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

		<div class="container">

          <div class="row">
 	<div style="margin-bottom:30px;">
   <h1 style="text-align:center;">Muchas gracias <?php echo $this->session->userdata('nombre_comprador'); ?> <?php echo $this->session->userdata('apellido_comprador'); ?>!</h1>
   <p style="text-align:center; color:#555;"><span style="font-weight:600">Recibiste los Gift Certificates por mail para reenviar a tu agasajado.</span> <br />
- No olvides revisar tu Correo No Deseado. Si no recibiste el voucher, enviá un mail a  <a class="link_sociales" href="mailto:recepcion@lareserve.com.uy">recepcion@lareserve.com.uy, </a> y te lo enviaremos en instantes.<br />
- El agasajado solamente deberá comunicarse con recepción con el código que figura en el voucher para coordinar su visita al spa. <br />
- Recordá que el Gift Certificate tiene una validez de 90 días.
   </p>
   <hr style="color:#999;" />
   </div>
          </div>


            <div class="row">


            <h2 style="text-align:center;">Recomendá a tus amigos lo fácil que es regalar en La Réserve!</h2>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
	    <div style="text-align: center; min-height: 320px; /* position: absolute; */ padding-top: 40px; margin: 0; padding-left: 33%;" class="addthis_native_toolbox"></div>


             </div>

            <!-- FOOTER -->
    <div class="row">
      <div class="footer">
        <HR />
        <ul>
          <li><strong>Teléfono:</strong> (+598) 4522.6280 int. 3109</li>
          <li><strong>Email:</strong> <a class="link_sociales" href="mailto:recepcion@lareserve.com.uy"> recepcion@lareserve.com.uy</a></li>
          <li><strong>Dirección:</strong> Juan Manuel Blanes 104</li>
          <li> <a class="link_sociales" href="https://twitter.com/spalareserve" target="_blank"> <img src="<?php echo base_url() . TEMPLATE_ASSETS; ?>images/twitter.png" width="20" height="20"> @spalareserve </a> </li>
          <li> <a class="link_sociales" href="https://www.facebook.com/spalareserve" target="_blank"> <img src="<?php echo base_url() . TEMPLATE_ASSETS; ?>images/facebook.png" width="20" height="20"> /spalareserve </a> </li>
        </ul>
      </div>
    </div>
    <!-- FOOTER -->



		</div>




	<!-- End content -->

	<div class="clearfix"></div>

</div>


<!--[if lte IE 7]><script src="js/icons-lte-ie7.js"></script><![endif]-->
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/respond.min.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/scripts.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/jquery.form.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>js/contact.js"></script>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50e5a99710278f46" async="async"></script>
</body>
</html>
