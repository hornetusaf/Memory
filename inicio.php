<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
if(isset($_POST["boton"]))
{
	if($_POST["nombre"]!="Insertar Nombre" && $_POST["nombre"]!="Nombre Requerido")
	{
		$_SESSION["nombre"]=$_POST["nombre"];
		header("location:memoria.php");	
	}	
}
?>

<form action="" method="post" name="form1">
<center>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><strong>Bienvenidos al juego Memoria</strong></p>
  <p>
    <input type="text" name="nombre" id="textfield" value="<?php
		if(isset($_POST["nombre"]) && ($_POST["nombre"]=="Insertar Nombre" || $_POST["nombre"]=="Nombre Requerido"))
			echo "Nombre Requerido";
		else
			echo "Insertar Nombre";				
	?>"/>
    <input type="submit" name="boton" id="button" value="Aceptar" />
  </p>
</center>
</form>

</body>
</html>