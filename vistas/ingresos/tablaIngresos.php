	<?php 
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT c.id_cantidad, p.nombre_producto, p.tamaño, c.stockNuevo, c.fecha_entrada
			FROM cantidad c, producto p
			WHERE p.id_producto=c.id_producto";
			$result=mysqli_query($conexion,$sql);
	 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Lista de ingresos :D</label></caption>
	<tr>
		<td>Producto</td>
		<td>Descripción</td>
		<td>Stock entrada</td>
		<td>Fecha entrada</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php
	while ($ver=mysqli_fetch_row($result)):
	 ?>

	<tr>
		<td><?php echo $ver[1] ?></td>
		<td><?php echo $ver[2] ?></td>
		<td><?php echo $ver[3] ?></td>
		<td><?php echo $ver[4] ?></td>
		<td>
			<span  data-toggle="modal" data-target="#actualizaIngreso" class="btn btn-warning btn-xs" onclick="agregaDatoIngresos('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminaIngreso('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>

<?php endwhile; ?>
</table>
