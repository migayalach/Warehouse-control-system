<?php 
	//echo $_GET['idventa'];
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$objv= new ventas();
	$c=new conectar();
	$conexion= $c->conexion();	
	$idventa=$_GET['idventa'];

	$sql="SELECT v.id_venta, 
				 v.fechaCompra, 
				 c.id_cliente, 
				 c.nombre,  
				 p.tamaño
		  from venta v, cliente c, producto p  
		  WHERE p.id_producto=v.id_producto and c.id_cliente= v.id_cliente and v.id_venta='$idventa'
		  Order by v.id_venta DESC";

	$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$fecha=$ver[1];
		$idcliente=$ver[2];
 ?>	

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Reporte de salida</title>
 	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
 </head>
 <body>
 		<img src="" width="150" height="150">
 		<br>
		<h3>Recibo de salida</h3>
 		<table class="table">
 			<tr>
 				<td>Fecha de salida: <?php echo $fecha; ?></td>
 			</tr>
 			<tr>
 				<td>Cliente: <?php echo $objv->nombreCliente($idcliente); ?></td>
 			</tr>
 		</table>
		<table border="1" class="table">
 			<tr align="center">
				<td>Nro.</td>
				<td>Nombre producto</td>
 				<td>Descripción</td>
 				<td>Cantidad</td>
 			</tr>

 			<?php 
 			$sql="SELECT v.id_venta, 
						 p.nombre_producto, 
						 p.tamaño, 
						 v.cantidad 
					from venta v, producto p
					where p.id_producto=v.id_producto and v.id_venta='$idventa'";
			$result=mysqli_query($conexion,$sql);
			$con=1;
			
			while($mostrar=mysqli_fetch_row($result)):
 			?>
 			<tr align="center">
				<td><?php echo $con; ?></td>
 				<td><?php echo $mostrar[1]; ?></td>
 				<td><?php echo $mostrar[2]; ?></td>
 				<td><?php echo $mostrar[3]; ?></td>
 			</tr>
 			<?php 
 				 $con++;
 			endwhile;
 			 ?>
 		</table>
</body>
</html>