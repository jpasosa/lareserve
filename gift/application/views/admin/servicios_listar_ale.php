
<div id="container">
	
<h1> Listado de servicios</h1>

<table width="100%" border="0">
  <tr>
    <td>ID</td>
    <td>Nombre</td>
    <td>Valor</td>
    <td>Acciones</td>
  </tr>
  <?php foreach($servicios as $servicio): ?>
   <tr>
	 <td> <?php echo $servicio->IdServicio ?> </td>
	 <td> <?php echo $servicio->Nombre ?> </td>
	 <td> <?php echo $servicio->Valor ?> </td>
	 <td> Editar | Borrar </td>
   </tr>
  <?php endforeach; ?>


</table>

