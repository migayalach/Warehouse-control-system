<?php 
	//print_r($_POST);
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ingresos.php";

	$datos=array( $_POST['idproveedorU'],
				  $_POST['idProductoU'],
				  $_POST['stockNuevoU'], 
				  $_POST['fechaEntradaU']);

	$obj= new ingresos();

	echo $obj->actualizaDatosIngresos($datos);

 ?>