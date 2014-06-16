
<?php
include_once "../../conexion.php";
$usu=$_POST['ususel'];
SESSION_START ();
 
$_SESSION['nombre']=$usu; 
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


<form action="tras2.php" method="POST">
<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

<tr><td colspan="3" align="center">
	<H2> Administrador </H2>
</td></tr>

<tr><td colspan="3" align="right">
	<p> Modificacion de Usuarios </p>
</td></tr>


<tr><td align="left"colspan="3" >


<?php 
 
$consulta_cod="select CodTrabajador from Tab_Trabajadores where NomTrabajador LIKE '$usu';";
$resultado_cod=mysql_query($consulta_cod,$conexion);
	
	if($resultado_cod!=0)
					{
						while($solucion=mysql_fetch_array($resultado_cod)) 
						{
							
							$codtra=$solucion[0];							
						}
					};  


 
 
$consulta_cod="select contrasena from Tab_Trabajadores where NomTrabajador LIKE '$usu';";
$resultado_cod=mysql_query($consulta_cod,$conexion);
	
	if($resultado_cod!=0)
					{
						while($solucion=mysql_fetch_array($resultado_cod)) 
						{
							
							$contraena=$solucion[0];							
						}
					};  


 
 
$consulta_cod="select Nivel from Tab_Trabajadores where NomTrabajador LIKE '$usu';";
$resultado_cod=mysql_query($consulta_cod,$conexion);
	
	if($resultado_cod!=0)
					{
						while($solucion=mysql_fetch_array($resultado_cod)) 
						{
							
							$nivel=$solucion[0];							
						}
					};  



 
$consulta_cod="select NomTrabajador from Tab_Trabajadores where NomTrabajador LIKE '$usu';";
$resultado_cod=mysql_query($consulta_cod,$conexion);
	
	if($resultado_cod!=0)
					{
						while($solucion=mysql_fetch_array($resultado_cod)) 
						{
							
							$Nomtra=$solucion[0];
						}
					};  



 
$consulta_cod="select ApeTrabajador from Tab_Trabajadores where NomTrabajador LIKE '$usu';";
$resultado_cod=mysql_query($consulta_cod,$conexion);
	
	if($resultado_cod!=0)
					{
						while($solucion=mysql_fetch_array($resultado_cod)) 
						{
							
							$ape=$solucion[0];
														
						}
					};  


 

	$consulta_nomdep="SELECT Nombre FROM Tab_Departamentos WHERE Codigo IN (SELECT Departamento FROM Tab_Trabajadores WHERE NomTrabajador LIKE '$usu');";
	$resultado_nomdep=mysql_query ($consulta_nomdep,$conexion);
		if ($resultado_nomdep!=0)
			{
				while ($solucion2=mysql_fetch_array($resultado_nomdep))
				{
					$depart=$solucion2[0];
					
				}
			}


 
 
$consulta_cod="select ObTrabajador from Tab_Trabajadores where NomTrabajador LIKE '$usu';";
$resultado_cod=mysql_query($consulta_cod,$conexion);
	
	if($resultado_cod!=0)
					{
						while($solucion=mysql_fetch_array($resultado_cod)) 
						{
							
							$obser=$solucion[0];							
						}
					};  

$consulta_vig="select Vigencia from Tab_Trabajadores where NomTrabajador LIKE '$usu';";
$resultado_vig=mysql_query($consulta_vig,$conexion);
	
	if($resultado_vig!=0)
					{
						while($solucion=mysql_fetch_array($resultado_vig)) 
						{
							
							$vigencia=$solucion[0];							
						}
					}; 


$consulta_usu="select NomUsuario from Tab_Trabajadores where NomTrabajador LIKE '$usu';";
$resultado_usu=mysql_query($consulta_usu,$conexion);
	
	if($resultado_usu!=0)
					{
						while($solucion=mysql_fetch_array($resultado_usu)) 
						{
							
							$usuario=$solucion[0];							
						}
					}; 




echo "<table align='center' width='900'  border='1' bgcolor='#0000FF7'>
		<tr>
		<td width='100'><font color='#EFFBF8'>Codigo Trabajador</font></td>
		<td width='100'><font color='#EFFBF8'>Nombre Trabajador</font></td>
		<td width='100'><font color='#EFFBF8'>Apellidos Trabajador</font></td>
		<td width='100'><font color='#EFFBF8'>Departamento</font></td>
		<td width='100'><font color='#EFFBF8'>Nivel acceso</font></td>
		<td width='100'><font color='#EFFBF8'>Contraseña</font></td>
		<td width='100'><font color='#EFFBF8'>Observaciones</font></td>
		<td width='100'><font color='#EFFBF8'>Vigencia</font></td>
		<td width='100'><font color='#EFFBF8'>Usuario</font></td>
		</tr>
	  </table>";						
					
	echo "<br><table align='center' width='900'>
							<tr>
							<td width='100'>$codtra</td> 
							<td width='100'>$Nomtra </td>
							<td width='100'>$ape </td>	
							<td width='100'>$depart</td>
							<td width='100'>$nivel </td>
							<td width='100'>$contraena </td>
							<td width='100'>$obser </td>
							<td width='100'>$vigencia </td>
							<td width='100'>$usuario </td>									
							</tr>
							</table>";				
	
					
 ?>  
</td></tr>



<tr><td colspan="3" align="center">
	<H2> Modificacion de datos del usuario: </H2>
</td></tr>



<tr><td align="left">
Modificar Nombre trabajador: </br> 
<input type="text" name="nombre2"  size="20" value="<?php echo $Nomtra;?> " required/>
</td>

<td align="left">
Modificar Apellidos trabajador: </br> 
<input type="text" name="apellidos2"  size="40" value="<?php echo $ape;?>" required/>
</td>

<td align="left">
Modificar Usuario: </br> 
<input type="text" name="usuario"  size="20" value="<?php echo $usuario;?>" required/>
</td></tr>

<td align="left">
Modificar Nivel de acceso (1/2): </br> 
<input type="text" name="nivel2"  size="2" value="<?php echo $nivel;?>" required/>
</td>

<td align="left">
Modificar Contraseña: </br> 
<input type="text" name="passwd"  size="17" value="<?php echo $contraena;?>" required/>
</td>


<td align="left">
Cambiar Departamento: </br> 
<?php

include_once "../../conexion.php";

$consulta_mysql='select * from Tab_Departamentos;';
$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
  
echo "<select name='depar'>";

	while($fila=mysql_fetch_array($resultado_consulta_mysql)){
echo "<option value='".$fila['Codigo']."'>".$fila['Codigo']."&nbsp"."&nbsp".'--'."&nbsp"."&nbsp".$fila['Nombre']."</option>";
}
echo "</select>";


?>
</td></tr>


<tr><td align="left" colspan="3">
Modificar Observaciones: </br> <input name="observa2"  size="140" value="<?php echo $obser;?>" />  
</td></tr>

<tr><td align="left">
Modificar Vigencia: </br> <input name="vigencia"  size="2" value="<?php echo $vigencia;?>" />  
</td>

<td align="left">
Modificar CosteHora: </br> <input name="coste"  size="3" value="<?php 



$consulta_coste="select CosteHora from Tab_Coste where Cod_Trabajador LIKE '$codtra';";
$resultado_coste=mysql_query($consulta_coste,$conexion);
	
	if($resultado_coste!=0)
					{
						while($solucion=mysql_fetch_array($resultado_coste)) 
						{
							
							$coste=$solucion[0];	
							echo "$coste";						
						}
					};  	



?>" />  
</td></tr>



<tr><td align="right" colspan="3" >
<input type="submit" name="Anadir2" value="Modificar Usuario" size="50"/>
<input type="button" value="Volver" onclick="window.open('ccc.php','_self',false)" / >


</td></tr>

</table></form>

	<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>

<?php

$desconexion=mysql_close($conexion);

?>

</body>
</html> 