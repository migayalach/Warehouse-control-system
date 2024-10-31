<?php 
	//print_r($_POST);
	session_start();
	
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ingresos.php";
	$obj= new ingresos();
	$datos=array( $_POST['idProducto'],
				  $_POST['stockNuevo'],
				  $_POST['fechaEntrada']
				);

	//echo 
	$obj->agregaIngresos($datos);
	echo $obj->actualizaIngresos($datos);
 ?>