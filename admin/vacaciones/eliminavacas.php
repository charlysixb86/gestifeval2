<?php
	
	include "../../conexion.php";
	
	
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administrador</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<style type="text/css">@import url(../css/calendar-blue2.css);</style>
		<script type="text/javascript" src="../js/calendar.js"></script>
		<script type="text/javascript" src="../js/lang/calendar-es.js"></script>
		<script type="text/javascript" src="../js/calendar-setup.js"></script>
		<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>
</head>



<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>


<form action="eliminavacasA4.php" method="POST">
<table align="center" width="1000" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

<tr>
<td colspan="2" align="center">
<H2> ADMINISTRADOR </H2>
</td></tr>

<tr><td colspan="2" align="right">
<p> Eliminar Dia Festivo </p>
</td></tr>


<tr><td align="left">
Seleccione Fecha para eliminar:
<input type="date" id="dataeli" name="dataeli" />
<button id="trigger">...</button>	

<script type="text/javascript">
Calendar.setup(
{
inputField : "dataeli", // ID of the input field
ifFormat : "%Y-%m-%d", // the date format
button : "trigger" // ID of the button
}
);
</script>


</td></tr>

<tr><td align="right">
<input type="submit" name="Enviar" value="Enviar" size="50"/>
<input type="button" value="VOLVER" onclick="window.open('ddd.php','_self',false)" / >

</td></tr>
</table></form>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
</body>
</html> 