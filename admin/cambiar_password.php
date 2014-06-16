<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta http-equiv="Refresh" content="3;url=1.php">
			<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>
	</head>

<body>
	<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
	<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>
	<table align="center" width="500" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">
	<tr><td>

<?php
	error_reporting (5); 
	include_once "../conexion.php";
	session_start();


	if(!isset($_SESSION['usuarioactual']))
	{
		 header('location: 1.php');
	}
	if($_SESSION['Nivel']!="1")
	{
		 header('location: 1.php');
	}

	$usuario=$_SESSION["usuarioactual"];

	$usuario=$_SESSION["usuarioactual"];
	$password=$_POST ['contra'];

	$consulta_contra = " SELECT contrasena FROM Tab_Trabajadores WHERE NomUsuario = '$usuario';";
	$resultado = mysql_query ($consulta_contra,$conexion);
		if ($resultado!=0)
				while($solucion=mysql_fetch_array($resultado)) 
					if ($solucion!=0)
							{

								$clave_vieja=$solucion[0];
								
							}



	$actualizar_contra="UPDATE Tab_Trabajadores SET contrasena = '$password' WHERE contrasena = '$clave_vieja' AND NomUsuario = '$usuario' ;";
	$actualizar_contra2=mysql_query ($actualizar_contra,$conexion);
		if ($actualizar_contra2!=0)
				echo "ACTUALIZACION DE CONTRASEÑA ACEPTADA";
		else	
				echo "FALLO AL ACTUALIZAR LA CONTRASEÑA";

$desconexion=mysql_close ($conexion);

 ?>

<tr><td align="right">

<input type="button" value="Volver" onclick="window.open('1.php','_self',false)" / >


</td></tr>

</td></tr></table>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../imagenes/logo2.png" alt="" height="105" width="300"> </p>
</body></html>