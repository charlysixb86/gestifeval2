<?php
	
	include_once "../../conexion.php";
	
 ?>

<html>
<head>
<title>Administrador</title>
<meta charset="utf-8" />
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>
</head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
</br></br></br>


<form action="usuelige2.php" method="POST">
<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

<tr><td colspan="2" align="center">
<H1> Administrador </H1>
</td></tr>

<tr><td colspan="2" align="right">
<p> Consulta de datos de empleados </p>
</td></tr>

<tr><td align="left">

Elige Usuario: </br> 

<?php
$consulta_mysql='select * from Tab_Trabajadores order by ApeTrabajador';
$resultadoA_mysql=mysql_query($consulta_mysql,$conexion);
  
echo "<select name='usu1'>";
while($fila=mysql_fetch_array($resultadoA_mysql)){
    echo "<option value='".$fila['ApeTrabajador'].
	"'>".$fila['ApeTrabajador'].'--'.$fila['NomTrabajador']."</option>";
}
echo "</select>";

 ?>
</td></tr>

<td align="center">

<input type="submit" name="consulta2B" value="Consultar Registro de Trabajadores" style="width:300px; height:25px"/>
</td>
</tr>

<tr>

<td align="right">

<input type="button" value="Volver" onclick="window.open('ccc.php','_self',false)" / >

</td>
</tr>


</table>
</form>

<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>

<?php

$desconexion=mysql_close($conexion);

?>



</body>
</html>