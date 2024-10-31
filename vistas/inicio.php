<?php 
	session_start();
	//echo($_SESSION['nivel']);
	if(isset($_SESSION['usuario']))
	{		
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
	<?php 
		//echo(":D");
	?>
</body>
</html>
<?php 
	}
	else
		header("location:../index.php");
 ?>