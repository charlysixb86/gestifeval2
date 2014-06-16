<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta http-equiv="Refresh" content="3;url=ddd.php">
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>
</head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>		
<table align="center" width="760" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">
		
<?php
	include "../../conexion.php";
	
	$datavacas=$_POST ['datavacas'];
	$desc=$_POST ['despv'];
	
	$insercion="INSERT INTO Tab_Vacaciones VALUES (`Codigo`,'$desc','$datavacas');";
	$sql=mysql_query ($insercion,$conexion);
		
		if ($sql==0)

				{
					echo "<tr><td><p>ERROR DE INSERCIÓN	<img align='right' src='mal.png'></img></p></tr></td>";
					echo "<tr><td><font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></tr></td></br>";
				}
			
		else
				{
					echo "<tr><td><p>UNA FILA INSERTADA CON EXITO	<img align='right' src='bien.png'></img></p></tr></td>";
					echo "<tr><td><font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></tr></td></br>";		
				}

			
?>

		</table>
		<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
		</body></html>
	