<?php 
	session_start();
	//print_r($_SESSION['tablaComprasTemp']);
 ?>

 <h4>Realizar salida</h4>
 <h4><strong><div id="nombreclienteVenta"></div></strong></h4>
 <table class="table table-bordered table-hover table-condensed" style="text-align: center;">
 	<caption>
 		<span class="btn btn-success" onclick="crearVenta()"> Generar reporte
 			<span class="glyphicon glyphicon-shopping-cart"></span>
 		</span>
 	</caption>
 	<tr>
	 	<td>Nro.</td>
 		<td>Nombre</td>
 		<td>Descripcion</td>
		<td>Cantidad</td>
		<td>Quitar</td>
		
 	</tr>
 	<?php 
	$j=1;
 	$cliente=""; //en esta se guarda el nombre del cliente
 		if(isset($_SESSION['tablaComprasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tablaComprasTemp'] as $key) 
			{
 				$d=explode("||", @$key);
 	 ?>

 	<tr>
	 	<td><?php echo $j; ?></td>
 		<td><?php echo $d[1]; ?></td>
 		<td><?php echo $d[2];?></td>
 		<td><?php echo $d[5]; ?></td>
 		<td>
 			<span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>

 	</tr>
 <?php 
 		$j++;
 	}
 	endif; 
 ?>
 </table>


 <script type="text/javascript">
 	$(document).ready(function(){
 		nombre="<?php echo @$cliente ?>";
 		$('#nombreclienteVenta').text("Nombre: " + nombre);
 	});
 </script>