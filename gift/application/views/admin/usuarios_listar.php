<div id="container">
	
<h1> Listado de servicios</h1>

<table width="50%" border="0">
 <tr>
   <th>ID</th>
   <th>Email</th>
   <th>Password</th>
   <th>Acciones</th>
 </tr>
	
 <?php foreach($usuarios as $usuario): ?>

 <tr>
	<td> <?php echo $usuario->IdUsuario ?></td>
	<td> <?php echo $usuario->Email ?></td>
	<td> <?php echo $usuario->Password ?></td>
	<td> <a href="<?php echo base_url('admin/usuarios_editar/' . $usuario->IdUsuario )  ?>">Editar</a> -  <a onClick="return confirm('Seguro que deseas borrar Tratamiento?')" href="<?php echo base_url('admin/borrar_usuario/' . $usuario->IdUsuario )  ?>"> Borrar </a></td>
</tr>

 <?php endforeach; ?>

</table>

   <?php echo $this->benchmark->memory_usage();?>

