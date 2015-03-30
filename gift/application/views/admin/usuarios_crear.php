
<div id="container">
	
<h1> Crear Usuario</h1>

<?php echo validation_errors(); ?>

<form action="<?php echo base_url('admin/usuarios_crear')  ?>" method="post">

<input name="email" type="text" value="" placeholder="Ingresu tu e-mail" />
<input name="password" type="password" value="password"/>
<input type="hidden" name="post" value="1" ?> 
<input type="submit" name="ingresar" id="ingresar" value="ingresar" />

</form>

   <?php echo $this->benchmark->memory_usage();?>

