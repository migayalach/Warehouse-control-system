<?php 
    //echo $_GET['desde'];
    //echo $_GET['hasta'];
	//echo $_GET['c1'];
?>

<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$objv= new ventas();
	$c=new conectar();
	$conexion= $c->conexion();

    $idpro=$_GET['c1'];
    $f1=$_GET['desde'];
    $f2=$_GET['hasta'];

    $sql="SELECT v.id_venta, 
				 v.fechaCompra, 
				 c.nombre, 
				 c.apellido, 
				 c.carnet, 
				 p.nombre_producto, 
				 p.tamaño, 
				 v.cantidad	
		FROM venta v, producto p, cliente c
		WHERE p.id_producto = v.id_producto and c.id_cliente = v.id_cliente and p.id_producto='$idpro' and v.fechaCompra BETWEEN '$f1' and '$f2'
		ORDER BY v.fechaCompra DESC";
        $result=mysqli_query($conexion,$sql);
        $con=1;
?>	

<!DOCTYPE html>
 <html>
 <head>
 	<title>Reporte de salida</title>
 	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
 </head>
 <body>
 		<!--<img src="../../img/ventas.png" width="150" height="150">-->
 		<br>
		<h3>Recibo de salida</h3>
		<?php 
		$d=$_GET['desde'];
		$h=$_GET['hasta'];
		echo($d." - ".$h);
		?>
		<br>
		<br>
		<table border="1" class="table">
 			<tr align="center">
				<td>Nro.</td>
				<td>Fecha de salida</td>
                <td>Producto</td>
 				<td>Tamaño</td>
 				<td>Cantidad</td>
 			</tr>
 			<?php 
			while($mostrar=mysqli_fetch_row($result)):
 			?>
 			<tr align="center">
                <td><?php echo ($con); ?></td>
 				<td><?php echo $mostrar[1]; ?></td>
 				<td><?php echo $mostrar[5]; ?></td>
 				<td><?php echo $mostrar[6]; ?></td>
 				<td><?php echo $mostrar[7]; ?></td>
 			</tr>
 			<?php 
 				 $con++;
 			endwhile;
 			 ?>
 		</table>
</body>
</html>