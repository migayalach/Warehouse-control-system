<?php 
	class articulos
	{	
		public function insertaArticulos($datos)
		{
			$c=new conectar();
			$conexion=$c->conexion();
			$s=0;
			$sql="INSERT INTO `producto`(`nombre_producto`, `tamaño`,`stock`)
   				  values ('$datos[0]',
					 	  '$datos[1]',
						  '$s'
						  )";
			return mysqli_query($conexion,$sql);
		}

		public function actualizarArticulo($datos)
		{
			$c=new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE producto set nombre_producto='$datos[1]',
									  tamaño='$datos[2]'
									where id_producto='$datos[0]'";
			return mysqli_query($conexion,$sql);	
		}

		public function eliminaArticulo($id_producto)
		{
			$c=new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from producto where id_producto='$id_producto'";
			return mysqli_query($conexion,$sql);	
		}

		public function obtenDatosArticulo($idarticulo)
		{
			$c=new conectar();
			$conexion=$c->conexion();
			$sql="SELECT id_producto,
						 nombre_producto,
			 			 tamaño
				  FROM producto where id_producto='$idarticulo'";
				 $result=mysqli_query($conexion,$sql);
				 $ver=mysqli_fetch_row($result);
				 $datos=array(
					  		  "id_producto"=>$ver[0],
							  "nombre_producto"=>$ver[1], 
							  "tamaño"=>$ver[2]);
				return $datos;
				//mysqli_querry($conexion,$sql);
		}
	}	
?>