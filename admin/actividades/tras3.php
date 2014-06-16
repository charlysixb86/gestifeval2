<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta http-equiv="Refresh" content="3;url=bbb.php">
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo.jpg) no-repeat center center fixed;}

  			</style></head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>
<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">
<tr><td>
<?php

	include_once "../../conexion.php";
	
	SESSION_START ();
 
	if (isset($_SESSION['noma'])){
		
		$nombreact=$_SESSION['noma'];
	}else{
		echo 'No existe nombre en $_SESSION';
	}		
	
	
	
	
	$nombre2=$_POST ['noma2'];
	$observacion2=$_POST ['observaA2'];
	$radio=$_POST ['radioVg'];
	
	$consulta_borrar="UPDATE Tab_Actividades
						SET NomActividad = '$nombre2' , Observaciones = '$observacion2', Vigencia='$radio' 
						WHERE NomActividad = '$nombreact';";
	
	$borrar=mysql_query ($consulta_borrar,$conexion);
	
	if ($borrar==0)

		{

				echo "<p> No hay datos que mostrar <img align='right' src='mal.png'></img></p></br> </br>";
				echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	
		}
	
	
	
	else

		{
			echo "<p>ACTIVIDAD MODIFICADO CON CODIGO <font color=green><b>$codigo <img align='right' src='bien.png'></img></p></br> </br></b></font>
				PARA EL PROYECTO <font color=green><b> $proyecto ($codigo2)</b> </font></p> ";

			echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";		

		}
?>

</td></tr></table>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
</body>
</html>