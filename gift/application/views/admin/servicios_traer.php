
<div id="container">
	
<form id="form1" method="post" action="">
	
	<label> Tratamiento:</label> 
	<input type="text" name="nombre"
	 value="<?php echo $servicio->Nombre ?>" placeholder="Ingresar nombre" required  />
	
	<br />
	
	<label> Valor:</label> 
	<input type="text" name="valor" value="<?php echo $servicio->Valor ?>" placeholder="Ingresar valor" required   />
	
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
