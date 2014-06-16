<?php
	 
	include_once "../../conexion.php";
	$A=$_POST['act'];
	
 ?>


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


<form action="tras3.php" method="POST">
<table align="center" width="1000" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

<tr><td colspan="3" align="center" colspan="3">
<H2> Administrador </H2>
</td></tr>

<tr><td colspan="3" align="right" colspan="3">
<p> Modificacion de Actividades </p>
</td></tr>

<tr><td>
<?php 
  
 SESSION_START ();
 
$_SESSION['noma']=$A; 



$consulta_cod="select CodProyecto from Tab_Actividades where NomActividad LIKE '$A';";
$resultado_cod=mysql_query($consulta_cod,$conexion);
	
	if($resultado_cod!=0)
					{
						while($solucion=mysql_fetch_array($resultado_cod)) 
						{
							
							$Codpro=$solucion[0];
						}
					};  


 
$consulta_a="select CodActividad from Tab_Actividades where NomActividad LIKE '$A';";
$resultado_a=mysql_query($consulta_a,$conexion);
	
	if($resultado_a!=0)
					{
						while($solucion=mysql_fetch_array($resultado_a)) 
						{
							
							$CodAct=$solucion[0];							
						}
					};  

 
 
$consulta_obs="select Observaciones from Tab_Actividades where NomActividad LIKE '$A';";
$resultado_obs=mysql_query($consulta_obs,$conexion);
	
	if($resultado_obs!=0)
					{
						while($solucion=mysql_fetch_array($resultado_obs)) 
						{
							
							$observacionesA=$solucion[0];							
						}
					};  
					
$consulta_v="select Vigencia from Tab_Actividades where NomActividad LIKE '$A';";
$resultado_v=mysql_query($consulta_v,$conexion);
	
	if($resultado_v!=0)
					{
						while($solucion=mysql_fetch_array($resultado_v)) 
						{
							
							$vigencia=$solucion[0];							
						}
					};					

echo "<table align='center' width='900'  border='1' bgcolor='#0000FF7'>
		<tr>
		<td width='50'><font color='#EFFBF8'>Codigo Proyecto</font></td>
		<td width='100'><font color='#EFFBF8'>Nombre Actividad</font></td>
		<td width='50'><font color='#EFFBF8'>Codigo Actividad</font></td>
		<td width='150'><font color='#EFFBF8'>Observaciones</font></td>
		<td width='50'><font color='#EFFBF8'>Vigencia</font></td>
		</tr>
	  </table>";						
					
	echo "<br><table align='center' width='900'>
							<tr>
							<td width='50'>$Codpro </td> 
							<td width='100'>$A </td>
							<td width='50'>$CodAct </td>	
							<td width='150'>$observacionesA </td>
							<td width='50'>$vigencia </td>
							</tr>
							</table>";				
										
					
					
					
					
					

 ?></td></tr>
 
 
 
 
 
 
 
 
 
 <tr><td colspan="3">
<h2 align="center" style="padding: 20px 5px 5px 5px;"><font color="black"><b>Modificar cualquiera de los siguientes campos: </b></font></h2>
</td></tr>


<tr><td align="left">

Modificar Nombre de Actividad: </br> 

 <input type="text" name="noma2" value="<?php echo $A;?>" />
</td></tr>

<tr><td align="left" colspan="3">

 Modificacion de Observacion: <input type="text" name="observaA2" value="<?php echo $observacionesA;?>"size="160"/>
</td></tr>

<tr><td align="left" colspan="3">
		Vigencia de la Actividad: </br> 
		<input type="radio" name="radioVg" value="SI" <?php If($vigencia=='SI') echo "Checked=True"?> />Activo<br/>
		<input type="radio" name="radioVg" value="NO" <?php If($vigencia=='NO') echo "Checked=True"?> />Desactivo
	</td></tr>



<tr><td align="right" colspan="3">
<input type="submit" name="Anadir" value="Modificar Actividad" size="50"/>
<input type="button" value="VOLVER" onclick="window.open('bbb.php','_self',false)" / >

</td></tr>



</table></form>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
</body>
</html> 