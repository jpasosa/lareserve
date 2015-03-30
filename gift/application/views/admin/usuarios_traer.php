
<div id="container">
	
<form method="post" action="">
	
	<label> Usuario:</label> 
	<input type="text" name="email" value="<?php echo $usuario->Email ?>" placeholder="Ingresar nombre" />
	
	<br />
	
	<label> Password:</label> 
	<input type="text" name="password" value="<?php echo $usuario->Password ?>" placeholder="Ingresar valor"  />
	
	<br />
	<input type="hidden" name="post" value="1">
	<input type="submit" value="Guardar" />

</form>


<!-- VALIDAR FORMULARIO-->
<script>
	
	$(document).ready(function(){
     $('#form1').html5form(); // solo requiere una linea de código 
});
	
</script>
<!-- FIN VALIDAR FORMULARIO-->


   <?php echo $this->benchmark->memory_usage();?>

