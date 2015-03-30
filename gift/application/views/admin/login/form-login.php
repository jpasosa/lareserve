
	
		<div class="login-container">
				<h2>
					<a href="<?php echo base_url("admin/dashboard");?>"><img src="<?php echo base_url('assets/images/logo.png')?>" alt="logo" class="img-responsive"></a><!-- can use your logo-->
				</h2>
				<!-- BEGIN LOGIN BOX -->
				<div id="login-box" class="login-box visible">					
					<p class="bigger-110">
						<i class="fa fa-key"></i> Ingresa tu datos de acceso
					</p>
					
					<div class="hr hr-8 hr-double dotted"></div>
					
					<form method="post" action="<?php echo base_url('admin/login')  ?>">
						<div class="form-group">
							<div class="input-icon right">
								<span class="fa fa-key text-gray"></span>
								<input type="text" name="email" class="form-control" placeholder="E-mail">
							</div>
						</div>
						<div class="form-group">
							<div class="input-icon right">
								<span class="fa fa-lock text-gray"></span>
								<input type="password" name="password" class="form-control" placeholder="Contraseña">
							</div>
						</div>
						<div class="tcb">
							<input type="hidden" name="post" value="1" ?> 
							<input type="submit" name="ingresar" id="ingresar" value="Ingresar" />
							<?php 
						if (isset($error))
						{
							
							echo $error;
							
						}
						
						?>
							<div class="clearfix"></div>
						</div>				
						
						
					</form>
				</div>