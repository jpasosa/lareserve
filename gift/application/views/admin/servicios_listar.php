
<div id="container">
	
<h1> Listado de servicios</h1>

<table width="50%" border="0">
 <tr>
   <th>ID</th>
   <th>Nombre</th>
   <th>Valor</th>
   <th>Acciones</th>
 </tr>
	
 <?php foreach($servicios as $servicio): ?>

 <tr>
	<td> <?php echo $servicio->IdServicio ?></td>
	<td> <?php echo $servicio->Nombre ?></td>
	<td> <?php echo $servicio->Valor ?></td>
	<td> <a href="<?php echo base_url('admin/servicios_editar/' . $servicio->IdServicio )  ?>">Editar</a> - <a onClick="return confirm('Seguro que deseas borrar Tratamiento?')" href="<?php echo base_url('admin/borrar_servicio/' . $servicio->IdServicio )  ?>" > Borrar </a></td>
</tr>

 <?php endforeach; ?>

</table>

   <?php echo $this->benchmark->memory_usage();?>

