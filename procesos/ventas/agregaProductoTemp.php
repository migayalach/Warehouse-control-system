<?php 
	session_start();
	require_once "../../clases/Conexion.php";

	$c= new conectar();
	$conexion=$c->conexion();

	$idcliente=$_POST['clienteVenta'];
	$idproducto=$_POST['productoVenta'];
	$descripcion=$_POST['descripcionV'];
	$cantidad=$_POST['cantidadV'];
	$cv=$_POST['cantidadVenta'];
	
	$sql="SELECT nombre,apellido 
			from cliente 
			where id_cliente='$idcliente'";
	$result=mysqli_query($conexion,$sql);
	//c=cliente
	$c=mysqli_fetch_row($result);
	//n=nombre de cliente
	$ncliente=$c[1]." ".$c[0];

	$sql="SELECT nombre_producto
			from producto
			where id_producto='$idproducto'";
	$result=mysqli_query($conexion,$sql);

	$nombreproducto=mysqli_fetch_row($result)[0];

	$articulo=$idproducto."||".
			  $nombreproducto."||".
			  $descripcion."||".
			  $ncliente."||".
			  $idcliente."||".
			  $cv."||";

	$_SESSION['tablaComprasTemp'][]=$articulo;

 ?>