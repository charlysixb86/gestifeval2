<?php

	include_once "../../conexion.php";
	$pro=$_POST['act'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta http-equiv="Refresh" content="3;url=http://172.31.134.49/gestifeval/admin/actividades/bbb.php">
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style></head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>
<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

<tr><td align="left">

<?php
$consulta_mysql="UPDATE Tab_Actividades SET Vigencia='NO' WHERE Vigencia='SI' and NomActividad = '$pro';";
$resultado_mysql=mysql_query($consulta_mysql,$conexion);
  
  If($resultado_mysql==0)
	Echo "NO hay registros para dar de baja";
  else
	echo "Registro dado de baja correctamente";


 ?>

</td></tr>

<tr><td align="right">

<input type="button" value="VOLVER" onclick="window.open('/gestifeval/admin/actividades/bbb.php','_self',false)" / >

</td></tr></table>

<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	

</body></html> 