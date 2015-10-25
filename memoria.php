<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
a:link {
	color: #000000;
}
a:visited {
	color: #000000;
}
-->
</style>
</head>
<body>
<p>
  <?php  
if(!isset($_SESSION["tablero1"]))
{
	//construye el tablero 
	for($i=0;$i<72;$i++)
		for($j=0;$j<72;$j++)
			$mat[$i][$j]=0;
			
	$_SESSION["tablero2"]=$mat;
	
	for($i=0;$i<72;$i++)
	{
		for($j=0;$j<2;$j++)
		{
			do
			{
				$fila=rand(0,11);
				$columna=rand(0,11);
			}while($mat[$fila][$columna]!=0);			
			$mat[$fila][$columna]=($i%8)+1;			
		}	
	}
	
	$_SESSION["tablero1"]=$mat;
	$_SESSION["turno"]=0;
}
else
{
	if($_SESSION["turno"]==0)
	{
		$_SESSION["tablero2"][$_GET["fila"]][$_GET["columna"]]=$_SESSION["tablero1"][$_GET["fila"]][$_GET["columna"]];
		$_SESSION["turno"]=1;
		$_SESSION["fila"]=$_GET["fila"];
		$_SESSION["columna"]=$_GET["columna"];		
	}
	else if($_SESSION["turno"]==1)
	{
		$_SESSION["tablero2"][$_GET["fila"]][$_GET["columna"]]=$_SESSION["tablero1"][$_GET["fila"]][$_GET["columna"]];
		$_SESSION["fila1"]=$_GET["fila"];
		$_SESSION["columna1"]=$_GET["columna"];
		$_SESSION["turno"]=2;
	}
	else
	{
		if($_SESSION["tablero1"][$_SESSION["fila"]][$_SESSION["columna"]]==$_SESSION["tablero1"][$_SESSION["fila1"]][$_SESSION["columna1"]])
		{
		//hace el par			
			$_SESSION["tablero2"][$_SESSION["fila"]][$_SESSION["columna"]]=9;			
			$_SESSION["tablero2"][$_SESSION["fila1"]][$_SESSION["columna1"]]=9;
		}
		else
		{			
			$_SESSION["tablero2"][$_SESSION["fila"]][$_SESSION["columna"]]=0;			
			$_SESSION["tablero2"][$_SESSION["fila1"]][$_SESSION["columna1"]]=0;
		}
		$_SESSION["turno"]=0;
	}
}
?>
</p>
<form id="form1" name="form1" method="post" action="">
  <div align="center" class="style1">
    <h2>Bienvenido a Memoria <?php echo $_SESSION["nombre"]; ?></h2>
  </div> 
  
  <table border="5" align="center" cellpadding="3" cellspacing="3" bordercolor="#00CC33">
    <?php
$mat=$_SESSION["tablero2"];
for($i=0;$i<12;$i++)
{
?>
    <tr>
      <?php
  for($j=0;$j<12;$j++)
  {
   if($mat[$i][$j]!=0)
   {
  ?>
      <td><img width="30" heigth="30" src="Imagenes/<?php echo $mat[$i][$j]; ?>.bmp"/></td>
      <?php
	}
	else
	{
	?>
      <td><a href="memoria.php?fila=<?php echo $i; ?>&columna=<?php echo $j; ?>"><img width="30" heigth="30" src="Imagenes/<?php echo $mat[$i][$j]; ?>.bmp"/></a></td>
      <?php
	}
  }
  ?>
    </tr>
    <?php  
}
?>
  </table>
  <p>
    <center></center>
  </p>
</form>
</body>
</html>
