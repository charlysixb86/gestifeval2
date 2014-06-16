
<?php

	include_once "../../conexion.php";
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="ajax.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style></head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>

<form action="elimina22.php" method="POST">
<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">


<tr><td colspan="2" align="center">
<H2> Administrador </H2>
</td></tr>

<tr><td colspan="2" align="right">
<p> Dar de baja una Actividad </p>
</td></tr>

<!-- PARA SELECCIONAR ACTIVIDAD POR PROYECTO-->
<tr><td align="left">
Seleccionar Proyecto: </br> 
<?php
$consulta_mysql="select * from Tab_Proyectos where Vigencia = 'SI';";
$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
  
echo "<select id='pro1'  onchange='load(this.value)'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
    echo "<option value='".$fila['NomProyecto']."'>".$fila['NomProyecto']."</option>";
}
echo "</select></br>";

?>
</td></tr>
					
<tr><td align="left" colspan="2" >
			
Seleccionar Actividad: </br> 


<select name="act" id="act">
<div id="act">
</div></select>
</td></tr>

<tr><td align="right">
<input type="submit" name="elimina22" value="Dar de baja una Actividad" size="50"/>
<input type="button" value="VOLVER" onclick="window.open('/gestifeval/admin/actividades/bbb.php','_self',false)" / >

</td></tr>

</table></form>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
</body></html> 