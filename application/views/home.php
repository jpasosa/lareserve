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

	<link rel="stylesheet" media="screen" href="<?php echo base_url() . TEMPLATE_ASSETS; ?>css/screen.css">
	<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>lib/jquery.js"></script>
	<script src="<?php echo base_url() . TEMPLATE_ASSETS; ?>dist/jquery.validate.js"></script>

</head>

<body>


<div id="wrapper">
  <!-- Start Header -->
  <div id="header">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h1> <a href="<?php echo base_url('home'); ?>"> <img style="width:100%; height:100%" src="<?php echo base_url() . TEMPLATE_ASSETS; ?>images/logo-spa.png" alt="Convert" /> </a> </h1>

        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- End Header -->
  <!-- Start Content -->

  <?php if($this->session->flashdata('success') != ''):?>
  <div class="row">
    <div class="span6"> <span class="green textcenter">
      <p style="text-align:center;color: green;font-weight: bold;">Tu mensaje fue enviado!</p>
      </span> </div>
  </div>
  <?php endif;?>
  <div class="container">
    <div class="row">
      <div style="margin-bottom:30px;">
        <h1 style="text-align:center;">Regalá un Gift Certificate</h1>
        <p style="text-align:center; color:#555;"> Elegí el regalo, completá los datos y recibirás un mail con un Gift Certificate personalizado para reenviarlo a quien quieras. <br /> Luego, el agasajado podrá utilizar este mismo importe para realizar el tratamiento o cambiarlo por cualquier otra propuesta que desee. </p>
        <hr style="color:#999;" />
      </div>
    </div>
    <div class="row">
      <div class="span6">
        <div class="inner">
          <div class="form-box">
            <div class="bottom">
              <div id="error"> <span>
                <p>Something went wrong. Please refresh and try again.</p>
                </span> </div>
              <form method="post"  id="commentForm2"  action=""  enctype="multipart/form-data">
                <input type="hidden" name="IdVenta" value="<?php if (isset($gift['IdVenta'])) {echo $gift['IdVenta'];}else{echo '0';} ?>" />
                <div class="form-row">
                  <?php if (isset($gift['cantidad']) && $gift['cantidad'] != -1): ?>
                  <h4 style="font-weight:400; color:#9f384a;">Faltan completar <?php echo $gift['cantidad']; ?> de <?php echo $this->session->userdata('cantidad_total'); ?> vouchers.</h4>
                  <?php else: ?>
                  <h4> ¿Cuántos regalos querés hacer? </h4>
                  <select required id="cantidad" name="cantidad" title="Seleccione la cantidad" <?php if (isset($gift['IdVenta'])): echo 'disabled'; endif; ?> >
                    <option value=""> Seleccionar cantidad</option>
                    <option value="1" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "1") echo 'selected="selected"'; ?> > 1</option>
                    <option value="2" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "2") echo 'selected="selected"'; ?> > 2</option>
                    <option value="3" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "3") echo 'selected="selected"'; ?> > 3</option>
                    <option value="4" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "4") echo 'selected="selected"'; ?> > 4</option>
                    <option value="5" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "5") echo 'selected="selected"'; ?> > 5</option>
                    <option value="6" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "6") echo 'selected="selected"'; ?> > 6</option>
                    <option value="7" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "7") echo 'selected="selected"'; ?> > 7</option>
                    <option value="8" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "8") echo 'selected="selected"'; ?> > 8</option>
                    <option value="9" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "9") echo 'selected="selected"'; ?> > 9</option>
                    <option value="10" <?php if (isset($gift['cantidad']) && $gift['cantidad'] == "10") echo 'selected="selected"'; ?> > 10</option>
                  </select>
                  <?php endif ?>
                </div>
                <input id="cantidad_input" type="hidden" name="cantidad" value="<?php if (isset($gift['cantidad'])) echo $gift['cantidad']; ?>" />

			  <hr  class="hr"/>
                  <div class="form-row">
                  <h4 style="margin-top:15px;"> Seleccioná el tratamiento que vas a regalar</h4>
                  <select name="IdServicio" id="servicio" required disabled title="Debes seleccionar un tratamiento">
                    <option value="" > Valores de referencia</option>
                    <?php foreach ($servicios AS $serv): ?>
                    <option value="<?php echo $serv['IdServicio']; ?>" data-nombre-servicio="<?php echo $serv['Nombre']; ?>"> <?php echo $serv['Nombre']; ?> ( $<?php echo $serv['Valor']; ?> ) </option>
                    <?php endforeach; ?>
                  </select>
                </div>

				<hr  class="hr"/>
                  <h4 style="margin-top:15px;"> Completá los datos del voucher </h4>
				<div class="form-row">
                  <input type="text" name="NombreComprador" id="nombre" disabled size="30" value="<?php if (isset($gift['NombreComprador'])): echo $gift['NombreComprador'];endif; ?>" title="Por favor ingresá tu nombre" required class="text login_input"  placeholder="¿Cómo te llamás?">
                </div>
                <div class="form-row">
                  <input type="text" name="ApellidoComprador" id="apellido" disabled size="30" value="<?php if (isset($gift['ApellidoComprador'])): echo $gift['ApellidoComprador'];endif; ?>" title="Por favor ingresa tu apellido" required class="text login_input"  placeholder="¿Y tu apellido?">
                </div>
                <div class="form-row">
                  <input type="email" name="EmailComprador" id="email" title="Ingresa tu e-mail" disabled size="30" value="<?php if (isset($gift['EmailComprador'])): echo $gift['EmailComprador'];endif; ?>" required class="text login_input"  placeholder="Escribí acá tu mail para luego reenviar al agasajado">
                </div>
                <div class="form-row">
                  <input type="text" name="TelefonoComprador" id="telefono" disabled size="30" value="<?php if (isset($gift['TelefonoComprador'])): echo $gift['TelefonoComprador'];endif; ?>" class="text login_input" title="Ingresa tu teléfono"  required placeholder="Y acá indicanos tu teléfono">
				</div>
                <div class="form-row">
                  <input type="text" name="NombreAgasajado" id="nombre_para" disabled size="30" value="<?php if (isset($gift['NombreAgasajado'])): echo $gift['NombreAgasajado'];endif; ?>" title="Ingresa el nombre del agasajado" required class="text login_input"  placeholder="¿Cómo se llama quien recibe el regalo?">
                </div>
                <div class="form-row">
                  <input type="text" name="ApellidoAgasajado" id="apellido_para" disabled size="30" value="<?php if (isset($gift['ApellidoAgasajado'])): echo $gift['ApellidoAgasajado'];endif; ?>" class="text login_input" required title="Ingresa el apellido del agasajado"  placeholder="¿Su apellido?">
                </div>
                <div class="form-row">
                  <textarea name="MensajePersonalizado" id="mensaje"  required  disabled title="Ingresa el mensaje personalizado" maxlength="150" placeholder="Escribí acá un mensaje personalizado (Por ej: Feliz Día de la Madre!)"><?php if (isset($gift['MensajePersonalizado'])): echo $gift['MensajePersonalizado'];endif; ?>
</textarea>
                </div>
                <?php if (isset($gift['cantidad']) && $gift['cantidad'] == 1 && !isset($preferenceResult)): ?>
                <!-- YA ES EL ULTIMO VOUCHER Y VA A COMPRAR -->
                <div class="form-row">
                  <input type="submit" name="comprar" value="Confirmar" class="btn">
                </div>
                <?php elseif ( !isset($preferenceResult)): ?>
                <!-- SIGUE AVANZANDO EN LOS VOUCHERS -->
                <div class="form-row">
                  <input id="continuar"  style="display: none;" type="submit" name="continuar" value="Guardar y continuar" disabled class="btn">
                </div>
                <div class="form-row">
                  <input id="comprar" style="display: none;" type="submit" name="comprar" value="Confirmar" disabled class="btn">
                </div>
                <?php else: ?>
                <div class="form-row"> <a href="<?php echo $preferenceResult["response"]["init_point"]; ?>" id="button_pay" name="MP-Checkout" style="border: solid 1px #59060b;
color: #fff;
text-decoration:none;
font-family: 'Open Sans', sans-serif;
font-size:16px;
background: #791212;
background: -moz-linear-gradient(top, #791212 1%, #db8585 99%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#791212), color-stop(99%,#db8585));
background: -webkit-linear-gradient(top, #791212 1%,#db8585 99%);
background: -o-linear-gradient(top, #791212 1%,#db8585 99%);
background: -ms-linear-gradient(top, #791212 1%,#db8585 99%);
background: linear-gradient(to bottom, #791212 1%,#db8585 99%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#791212', endColorstr='#db8585',GradientType=0 );
}"  class="L-Rn">Pagar</a>
                  <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
                </div>




                <?php endif; ?>
              </form>
            </div>
          </div>
          <div class="shadow"></div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!-- FIN GIFT DATOS -->

    <!-- COMIENZO GIFT DISEÑO -->
    <div id="mobile" style="margin-right:0px;" class="span6">
      <div class="inner">
        <div class="form-box" >
          <div class="bottom">
			<h4 style="text-align:center; padding-bottom:0px; margin-bottom:0px">Vista previa del Gift Certificate que recibirás por mail</h4>
            <table style="background-image:url(<?php echo base_url() . TEMPLATE_ASSETS; ?>images/gift.png); background-position:center; background-repeat:no-repeat; height:340px;"  width="100%" border="0">
              <tr>
                <td style="padding-left:65px;padding-right:70px; padding-top:65px;"><p id="gift_nombre_para" style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#777;">&nbsp;</p></td>
              </tr>
              <tr>
                <td style="padding-left:65px;padding-right:65px;"><p id="gift_mensaje" style="font-size:13px; font-family:Arial, Helvetica, sans-serif; color:#777; line-height:15px;">&nbsp; </p></td>
              </tr>
              <tr>
                <td style="padding-left:65px;padding-right:70px;"><p id="gift_nombre" style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#777; text-align:right;">&nbsp;</p></td>
              </tr>
              <tr>
                <td style="padding-left:65px;padding-right:70px;"><p id="gift_servicio_old" style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#777; text-align:center;"> Gift Certificate válido por: <span id="gift_servicio"> </span> </p></td>
              </tr>
              <tr>
                <td style="padding-left:65px;padding-right:70px;"><p style="font-size:10px; font-family:Arial, Helvetica, sans-serif; color:#666; text-align:center;"> Válido hasta el <?php echo $fecha_venc; ?> </p></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
            <p style="font-size:13px; font-style:italic;"> *Los apellidos no aparecerán pero los guardaremos en nuestra base de datos</p>
          </div>
        </div>
        <div class="shadow"></div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="span6">
      <div style="margin-top:-13px;" class="inner">
        <div class="form-box">
          <div class="bottom">
            <p> <strong>Aclaraciones:</strong> <br />
              - Una vez completados todos los datos, recibirás los Gift Certificates correspondientes en tu correo.<br />
              - Chequeá que no haya llegado al Correo No Deseado (Spam). <br />
			  - Validez del voucher: 90 días a partir de la fecha de compra.  <br />
			  - El agasajado solamente deberá comunicarse con recepción con el código que figura en el voucher para coordinar su visita al spa.</p>
          </div>
        </div>
        <div class="shadow"></div>
        <div class="clearfix"></div>
      </div>
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
</body>
</html>
<script type="text/javascript">
	$(document).ready(function()
	{

		$("#commentForm2").validate({
			messages: {
				NombreComprador: {
					required: 'Ingrese el nombre del comprador!'
				}
			}
		});

		var nombre = $('#nombre').val();
		if ( nombre != '') {
			$('#gift_nombre').text(nombre);
		}
		$("#nombre").keyup(function() {
			var nombre = $('#nombre').val();
			$('#gift_nombre').text(nombre);
		});

		$("#mensaje").keyup(function() {
			var mensaje = $('#mensaje').val();
			$('#gift_mensaje').text(mensaje);
		});

		$("#nombre_para").keyup(function() {
			var nombre_para = $('#nombre_para').val() + ',';
			$('#gift_nombre_para').text(nombre_para);
		});

		$('#servicio').on('change', function() {
			var servicio =  $(this).find(':selected').data('nombre-servicio');
			$('#gift_servicio').text(servicio);
		});

		<?php if (!isset($gift['IdVenta'])): ?>
			$('#cantidad').on('change', function() {
				var cantidad =  $(this).find(':selected').val();
				$('#cantidad_input').val(cantidad);
				if ($(this).val() == '') {
					$('#continuar').prop('disabled', true);
					// $('#continuar').css({"opacity":"0.4", "filter":"alpha(opacity=40)"});
					$('#continuar').css({"display":"none"});
					$('#comprar').prop('disabled', true);
					// $('#comprar').css({"opacity":"0.4", "filter":"alpha(opacity=40)"});
					$('#comprar').css({"display":"none"});
					$('#servicio').prop('disabled', true);
					$('#nombre').prop('disabled', true);
					$('#apellido').prop('disabled', true);
					$('#email').prop('disabled', true);
					$('#telefono').prop('disabled', true);
					$('#nombre_para').prop('disabled', true);
					$('#apellido_para').prop('disabled', true);
					$('#mensaje').prop('disabled', true);
				} else if ( $(this).val() == 1 ) {
					$('#continuar').prop('disabled', true);
					// $('#continuar').css({"opacity":"0.4", "filter":"alpha(opacity=40)"});
					$('#continuar').css({"display":"none"});
					$('#comprar').prop('disabled', false);
					$('#comprar').removeAttr('style');
					$('#servicio').prop('disabled', false);
					$('#nombre').prop('disabled', false);
					$('#apellido').prop('disabled', false);
					$('#email').prop('disabled', false);
					$('#telefono').prop('disabled', false);
					$('#nombre_para').prop('disabled', false);
					$('#apellido_para').prop('disabled', false);
					$('#mensaje').prop('disabled', false);
				} else {
					$('#continuar').prop('disabled', false);
					$('#continuar').removeAttr('style');
					$('#comprar').prop('disabled', true);
					// $('#comprar').css({"opacity":"0.4", "filter":"alpha(opacity=40)"});
					$('#comprar').css({"display":"none"});
					$('#nombre').prop('disabled', false);
					$('#apellido').prop('disabled', false);
					$('#servicio').prop('disabled', false);
					$('#email').prop('disabled', false);
					$('#telefono').prop('disabled', false);
					$('#nombre_para').prop('disabled', false);
					$('#apellido_para').prop('disabled', false);
					$('#mensaje').prop('disabled', false);
				}
			});
		<?php else: ?>
			$('#continuar').prop('disabled', false);
			$('#continuar').removeAttr('style');
			$('#comprar').prop('disabled', true);
			// $('#comprar').css({"opacity":"0.4", "filter":"alpha(opacity=40)"});
			$('#comprar').css({"display":"none"});
			$('#servicio').prop('disabled', false);
			$('#nombre').prop('disabled', false);
			$('#apellido').prop('disabled', false);
			$('#email').prop('disabled', false);
			$('#telefono').prop('disabled', false);
			$('#nombre_para').prop('disabled', false);
			$('#apellido_para').prop('disabled', false);
			$('#mensaje').prop('disabled', false);
		<?php endif; ?>

            document.getElementById('button_pay').click();
	});


</script>




