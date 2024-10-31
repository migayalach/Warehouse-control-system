<?php 

	class ingresos{

		public function agregaIngresos($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sr=0;
			$sql="INSERT into `cantidad`(`id_producto`,
									     `stockNuevo`,
									     `fecha_entrada`)
						values ('$datos[0]',
								'$datos[1]',
								'$datos[2]')";

			return mysqli_query($conexion,$sql);
		}

		public function actualizaIngresos($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE producto
				  set stock=stock+'$datos[1]'
				  where id_producto='$datos[0]'";
			echo mysqli_query($conexion,$sql);

		}

		public function actualizaIngresosResta($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="SELECT *
				  FROM cantidad
				  WHERE id_cantidad='$datos'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			$dato=array($ver[0]=>"id_cantidad",
						$ver[1]=>"id_producto", 
						$ver[2]=>"stockNuevo");
			$sql="UPDATE producto
			 	  set stock=stock-'$ver[2]'
				  where id_producto='$ver[1]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminaIngresos($idcategoria){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from cantidad 
					where id_cantidad='$idcategoria'";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idarticulo)
		{
			$c=new conectar();
			$conexion=$c->conexion();
			$sql="SELECT *
				  FROM cantidad
				  WHERE id_cantidad='$idarticulo'";
				 $result=mysqli_query($conexion,$sql);
				 $ver=mysqli_fetch_row($result);
				 $datos=array("id_cantidad"=>$ver[0],
							  "id_producto"=>$ver[1], 
							  "stockNuevo"=>$ver[2],
							  "fecha_entrada"=>$ver[3]);
				return $datos;
				//mysqli_querry($conexion,$sql);
		}

		public function actualizaDatosIngresos($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE cantidad
				  set id_producto='$datos[1]',
				  	  stockNuevo='$datos[2]',
				  	  fecha_entrada='$datos[3]'
				  where id_cantidad ='$datos[0]'";
			echo mysqli_query($conexion,$sql);

		}

	}
 ?>