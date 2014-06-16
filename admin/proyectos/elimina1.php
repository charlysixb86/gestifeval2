

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>
</head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>

<form action="eliminap.php" method="POST">
<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

<tr>
<td colspan="2" align="center">
<H2> Administrador </H2>
</td>
</tr>
<tr>
<td colspan="2" align="right">
<p> Dar de baja un Proyecto </p>
</td>
</tr>

<tr>

<td align="left">

Listado de proyectos relacionados: </br> 

<?php

include_once "../../conexion.php";

$consulta_mysql='select * from Tab_Proyectos where Vigencia="SI";';
$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
  
echo "<select name='pro1'>";

	while($fila=mysql_fetch_array($resultado_consulta_mysql)){
echo "<option value='".$fila['NomProyecto']."'>".$fila['CodProyecto']."&nbsp"."&nbsp".'--'."&nbsp"."&nbsp".$fila['NomProyecto']."</option>";
}
echo "</select>";


?>




</td>
</tr>

<tr>
<td align="right">
<input type="submit" value="Dar de baja un Proyecto"/>
<input type="button" value="VOLVER" onclick="window.open('aaa.php','_self',false)" / >
</td></tr>
</form></table>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
</body>
</html>