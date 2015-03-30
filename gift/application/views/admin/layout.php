<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <title>Administrador</title>

	

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">



    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/fonts.css')?>">

  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		

	<!-- PAGE LEVEL PLUGINS STYLES -->	

	<link href="<?php echo base_url('assets/css/plugins/daterangepicker/daterangepicker-bs3.css')?>"rel="stylesheet">

	<link href="<?php echo base_url('assets/css/plugins/morris/morris.css')?>" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/bootstrap-datepicker/datepicker.css')?>">

	<!-- REQUIRE FOR SPEECH COMMANDS -->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/plugins/gritter/jquery.gritter.css')?>" />



    <!-- Tc core CSS -->

	<link id="qstyle" rel="stylesheet" href="<?php echo base_url('assets/css/themes/style.css')?>">	

	<!--[if lte IE 8]>

		<link rel="stylesheet" href="<?php echo base_url('assets/css/ie-fix.css')?>"/>

	<![endif]-->

	

	

    <!-- Add custom CSS here -->

	<link rel="stylesheet" href="<?php echo base_url('assets/css/only-for-demos.css')?>">



	<!-- End custom CSS here -->

	

    <!--[if lt IE 9]>

    <script src="<?php echo base_url('assets/js/html5shiv.js')?>"></script>

    <script src="<?php echo base_url('assets/js/respond.min.js')?>"></script>

    <![endif]-->

	

	<!--[if lte IE 8]>

	<script src="<?php echo base_url('assets/js/plugins/easypiechart/easypiechart.ie-fix.js')?>"> </script>

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



  <body>

	<div id="wrapper">

		<div id="main-container">		 		

			<!-- BEGIN TOP NAVIGATION -->

				<nav class="navbar-top" role="navigation">

					<!-- BEGIN BRAND HEADING -->

					<div class="navbar-header">

						<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".top-collapse">

							<i class="fa fa-bars"></i>

						</button>

						<div class="navbar-brand">

							<a href="<?php echo base_url("admin/vouchers");?>">

								<img src="<?php echo base_url('assets/images/logo.png')?>" alt="logo" class="img-responsive">

							</a>

						</div>

					</div>

					<!-- END BRAND HEADING -->

					<div class="nav-top">

						<!-- BEGIN RIGHT SIDE DROPDOWN BUTTONS -->

							<ul class="nav navbar-right">

								

								<li class="dropdown">
								  <ul class="dropdown-menu dropdown-scroll dropdown-messages">

												

									  <li id="messageScroll">

													<ul class="list-unstyled">

														

														<li>

															<a href="index.html#">

																<div class="row">

																	<div class="col-xs-2">

																		<img class="img-circle" src="<?php echo base_url ('assets/images/user-profile-2.jpg')?>" alt="">

																	</div>

																	<div class="col-xs-10">

																		<p>

																			<strong>Roddy Austin</strong>: Thanks for the info, if you need anything...

																		</p>

																		<p class="small">

																			<i class="fa fa-clock-o"></i> 3:39 PM

																		</p>

																	</div>

																</div>

															</a>

														</li>

													</ul>

												</li>

												<li class="dropdown-footer">

													<a href="index.html#">

														Read All Messages

													</a>

												</li>

											</ul>

								</li>

								<li class="dropdown">
								  <ul class="dropdown-menu dropdown-scroll dropdown-alerts">

									  <li class="dropdown-header">

												<i class="fa fa-bell"></i> 3 New Alerts

											</li>

											<li id="alertScroll">

												<ul class="list-unstyled">

													<li>

														<a href="index.html#">

															<div class="alert-icon bg-info pull-left">

																<i class="fa fa-download"></i>

															</div>

																Downloads <span class="badge badge-info pull-right">16</span>

														</a>

													</li>

													<li>

														<a href="index.html#">

															<div class="alert-icon bg-success pull-left">

																<i class="fa fa-cloud-upload"></i>

															</div>

																Server #8 Rebooted <span class="small pull-right"><strong><em>12 hours ago</em></strong></span>

														</a>

													</li>

													<li>

														<a href="index.html#">

															<div class="alert-icon bg-danger pull-left">

																<i class="fa fa-bolt"></i>

															</div>

																Server #8 Crashed <span class="small pull-right"><strong><em>12 hours ago</em></strong></span>

														</a>

													</li>

												</ul>

											</li>

											<li class="dropdown-footer">

												<a href="index.html#">

													View All Alerts

												</a>

											</li>

										</ul>

								</li>

								<li class="dropdown">
								  <ul class="dropdown-menu dropdown-scroll dropdown-tasks">

									  <li class="dropdown-header">

												<i class="fa fa-tasks"></i> 10 Pending Tasks

											</li>

											<li id="taskScroll">

												<ul class="list-unstyled">

													<li>

														<a href="index.html#">

															<p>

																Purchase Order #439 <span class="pull-right"><strong>52%</strong></span>

															</p>

															<div class="progress progress-striped">

																	<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100" style="width: 52%;"></div>

															</div>

														</a>

													</li>

													<li>

														<a href="index.html#">

															<p>

																March Content Update <span class="pull-right"><strong>14%</strong></span>

															</p>

															<div class="progress">

																<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100" style="width: 14%;"></div>

															</div>

														</a>

													</li>

													<li>

														<a href="index.html#">

															<p>

																Client #42 Data Scrubbing <span class="pull-right"><strong>68%</strong></span>

															</p>

															<div class="progress progress-striped">

																<div class="progress-bar" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>

															</div>

														</a>

													</li>

													<li>

														<a href="index.html#">

															<p>

																PHP Upgrade Server #6 <span class="pull-right"><strong>85%</strong></span>

															</p>

															<div class="progress">

																<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>

															</div>

														</a>

													</li>

													<li>

														<a href="index.html#">

															<p>

																Malware Scan <span class="pull-right"><strong>66%</strong></span>

															</p>

															<div class="progress progress-striped active">

																<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%;"></div>

															</div>

														</a>

													</li>

												</ul>

											</li>

											<li class="dropdown-footer">

												<a href="index.html#">

													View All Tasks

												</a>

											</li>

										</ul>

								</li>

								<!--Speech Icon-->

								<li class="dropdown"></li>

								<!--Speech Icon-->

								<li class="dropdown user-box">

									<a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">

										<img class="img-circle" src="<?php echo base_url ('assets/images/user.jpg')?>" alt=""> <span class="user-info"><?php if($this->session->userdata('Email')) echo $this->session->userdata('Email'); ?></span> <b class="caret"></b>

									</a>

										<ul class="dropdown-menu dropdown-user">

											<!-- <li>

												<a href="<?php echo base_url("admin/perfil");?>">

													<i class="fa fa-user"></i> Mi Perfil

												</a>

											</li> -->

																

											<li>

												<a href="<?php echo base_url("admin/logout");?>">

													<i class="fa fa-sign-out"></i> Salir

												</a>

											</li>

										</ul>

								</li>

								<!--Search Box-->

								<li class="dropdown nav-search-icon">
								  <ul class="dropdown-menu dropdown-search">

									  <li>

											<div class="search-box">

												<form class="" role="search">

													<input type="text" class="form-control" placeholder="Search" />

												</form>

											</div>

										</li>

									</ul>

								</li>

								<!--Search Box-->

							</ul>

						<!-- END RIGHT SIDE DROPDOWN BUTTONS -->

					</div><!-- /.nav-top -->

				</nav><!-- /.navbar-top -->

				<!-- END TOP NAVIGATION -->



				

				<!-- BEGIN SIDE NAVIGATION -->				

				<nav class="navbar-side" role="navigation">							

					<div class="navbar-collapse sidebar-collapse collapse">

									
						<ul id="side" class="nav navbar-nav side-nav">

							<!-- BEGIN SIDE NAV MENU -->							

							<!-- Navigation category -->

							<li>

								<h4>MENÚ</h4> 								

							</li>

							<!-- END Navigation category -->

							

						<!--	<li>

								<a class="active" href="<?php echo base_url("admin/dashboard");?>">

									<i class="fa fa-home"></i>INICIO</a>

							</li> -->

							<!-- BEGIN COMPONENTS DROPDOWN -->

							<li>

								<a  href="<?php echo base_url("admin/usuarios");?>">

									<i class="fa fa-users"></i> USUARIOS </span>

								</a>

									</li>
									
							<li>

								<a  href="<?php echo base_url("admin/servicios");?>">

									<i class="fa fa-align-justify "></i> SERVICIOS </span>

								</a>

									</li>

							<!--<li>

								<a href="<?php echo base_url("admin/ventas");?>">

									<i class="fa fa-usd"></i> VENTAS 

								</a>

							</li> -->
							
							<li>

								<a href="<?php echo base_url("admin/vouchers");?>">

									<i class="fa fa-ticket"></i> VOUCHERS 

								</a>

							</li>


<!-- <li>

								<a href="<?php echo base_url("admin/logout");?>">

									<i class="fa fa-sign-out"></i> SALIR 

								</a>

			</li> -->


						</ul><!-- /.side-nav -->

					</div><!-- /.navbar-collapse -->

				</nav><!-- /.navbar-side -->

			<!-- END SIDE NAVIGATION -->

			<!-- BEGIN MAIN PAGE CONTENT -->

				<div id="page-wrapper">

					<!-- BEGIN PAGE HEADING ROW -->

						<div class="row">

							<div class="col-lg-12">

							<div class="page-header title">

								<!-- PAGE TITLE ROW -->

									<h1>La Réserve <span class="sub-title"> <?php echo $titulo; ?></span></h1>									
									

								</div>

						

							</div><!-- /.col-lg-12 -->

						</div><!-- /.row -->

					<!-- END PAGE HEADING ROW -->					

						<div class="row">

							<div class="col-lg-12">

							

								<!-- START YOUR CONTENT HERE -->

									<?php if(isset($contenido)):?>
        
        							<?php $this->load->view($contenido) ?>
        
        							<?php endif; ?>		
	
								<!-- END YOUR CONTENT HERE -->

					

							</div>

						</div>

						

				<!-- BEGIN FOOTER CONTENT -->		

						<div class="footer">

							<div class="footer-inner">

								<!-- basics/footer -->

								<div class="footer-content">

									&copy; 2015 <a href="index.html">La Réserve</a>, Gift System.

								</div>

								<!-- /basics/footer -->

							</div>

						</div>

						<button type="button" id="back-to-top" class="btn btn-primary btn-sm back-to-top">

							<i class="fa fa-angle-double-up icon-only bigger-110"></i>

						</button>

					<!-- END FOOTER CONTENT -->

						

				</div><!-- /#page-wrapper -->	  

			<!-- END MAIN PAGE CONTENT -->

		</div>  

	</div>
	 

    <!-- core JavaScript -->

    

    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js') ?>"></script>

	

	<!-- PAGE LEVEL PLUGINS JS -->

	<script src="<?php echo base_url('assets/js/plugins/jqueryui/jquery-ui-1.10.4.custom.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/jqueryui/jquery.ui.touch-punch.min.js') ?>"></script>	

    <script src="<?php echo base_url('assets/js/plugins/daterangepicker/moment.js') ?>"></script>

    <script src="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker.js') ?>"></script>	

	<script src="<?php echo base_url('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/easypiechart/jquery.easypiechart.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/easypiechart/excanvas.compiled.js') ?>"></script>	

	<script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>

	<script src="<?php echo base_url ('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>



    <!-- Themes Core Scripts -->	

	<script src="<?php echo base_url('assets/js/main.js') ?>"></script>

	

	<!-- REQUIRE FOR SPEECH COMMANDS -->

	<script src="<?php echo base_url('assets/js/speech-commands.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/gritter/jquery.gritter.min.js') ?>"></script>		

	

	<!-- initial page level scripts for examples -->

	<script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.init.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/home-page.init.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/jquery-sparkline/jquery.sparkline.init.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/easypiechart/jquery.easypiechart.init.js')?>"</script>

	<script type="text/javascript">

	
		$('#minicalendar').datepicker();

	</script>

  </body>

</html></html>