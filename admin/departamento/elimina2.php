<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta http-equiv="Refresh" content="3;url=deptprincipal.php">
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo.jpg) no-repeat center center fixed;}

  			</style>
</head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>



<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

<tr><td colspan="2" align="center">
<H2> Administrador </H2>
</td></tr>
<tr><td colspan="2" align="right">
<p> Eliminar Departamento </p>
</td></tr>

<tr><td align="left">


<?php

include_once "../../conexion.php";
$Deptnom=$_POST ['Deptnom'];

$borrar="DELETE
FROM Tab_Departamentos
WHERE Nombre = '$Deptnom';";

$ejecutar=mysql_query ($borrar,$conexion);

	if ($ejecutar==0)

		{
			echo "<p>ERROR AL ELIMINAR EL DEPARTAMENTO $Deptnom <img align='right' src='bien.png'></img></p></br>";
			echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";
		}

	


	else
		{
			echo "<p>El Departamento <b>$Deptnom</b> se ah eliminado correctamente <img align='right' src='bien.png'></img></p></br>";	
			echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";			
		}



?>


</td></tr>


</form></table>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
</body>
</html>