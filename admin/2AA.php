<?php
	//Control de sesiones del usuario
	include_once "../conexion.php";
session_start();
	if(!isset($_SESSION['usuarioactual']))
	{
		 header('location: 1.php');
	}
	if($_SESSION['Nivel']!="1")
	{
		 header('location: ../index.php');
	}	
$usuario=$_SESSION["usuarioactual"];

	$fecha1=$_POST['data1u'];
	$fecha2=$_POST['data2u'];
?>	
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<link rel="stylesheet" href="table.css" type="text/css"/>
		<title>Administrador</title>
		<meta charset="utf-8" />
		<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../imagenes/fondo.jpg) no-repeat center center fixed;}

  		</style>
	</head>
<body>
	<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
	<p align="Center"><font color="#F5F6CE">Gestion Usuario-Administrador</font> </p>

<div class='CSSTableGenerator' ><table>

	<tr>
		<td colspan="5" align="center">
			<H2> USUARIO-ADMINISTRADOR </H2>
<?php

//en la siguiente consulta a la base de datos seleccionamos el codigo trabajador del 
//usuario actual para en la siguiente consulta utilizarlo para conseguir el sumatorio de horas

$codtra=0;
$consulta1="SELECT CodTrabajador FROM Tab_Trabajadores WHERE NomUsuario='$usuario';";
					$resultado1=mysql_query($consulta1,$conexion);
					if($resultado1!=0)
					{
						while($solucion1=mysql_fetch_array($resultado1)) 
						{
							 
							$codtra=$solucion1[0];
							//echo "Codigo Trabajador: ".$codtra;
														
						}
					}

$consulta="SELECT SUM(HorasEmpleadasact) 
			FROM Tab_Datos
			WHERE (CodTrabajador='$codtra') and (FechaActividad Between '$fecha1' and '$fecha2');";
			
					$resultado2=mysql_query($consulta,$conexion);
					if($resultado2!=0)
					{
						while($solucion2=mysql_fetch_array($resultado2)) 
						{
							echo "<p align='right'>TOTAL DE HORAS: $solucion2[0]</p>";
							
														
						}
					}	

 ?>

</tr>
<tr>
<td colspan="5" align="right">
<p> Listado de Horas Trabajadas en cada Actividad por Proyecto </p> 
</td>
</tr>




<?php

//Cabecera de la tabla que se implementa con el CSS del enlace que tenemos al principio del archivo

echo "
                
                    <tr>
                        <td>
                            <b>Nombre de Proyecto </b>
                        </td>
                        <td >
                            <b>Nombre de Actividad</b> 
                        </td>
                        <td>
                            <b>Fecha de Actividad </b>
                        </td>
                         <td>
                            <b>Numero de Horas </b>
                        </td>
                       
                         <td>
                            <b>Observaciones </b>
                        </td>
                         
                    </tr> ";
					


$consulta="SELECT NomProyecto, NomActividad, d.FechaActividad, d.HorasEmpleadasAct, d.ObActividad 
			FROM (Tab_Datos d JOIN Tab_Actividades a ON d.CodActividad=a.CodActividad)JOIN Tab_Proyectos p 
			ON a.CodProyecto = p.CodProyecto
			WHERE (CodTrabajador='$codtra') and (FechaActividad BETWEEN '$fecha1' and '$fecha2')
			ORDER BY d.FechaActividad DESC;";
					$resultado=mysql_query($consulta,$conexion);
					if($resultado!=0)
					{
						while($solucion=mysql_fetch_array($resultado)) 
						{
							echo "
							<tr>
							<td>$solucion[0] </td> 
							<td>$solucion[1] </td>
							<td>$solucion[2] </td>	
							<td>$solucion[3] </td>
							<td>$solucion[4] </td>	
							</tr>";
							
														
						}
					}
 ?>

<tr><td colspan="5">
	<div class='botenvio'>
		<input type="button" value="Volver" onclick="window.open('1.php','_self',false)" / >
	</div>
</td></tr>

</table>
</DIV>

<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../imagenes/logo2.png" alt="" height="105" width="300"> </p>

	
<?php	
// desconexion de la base de datos
	$desonexion=mysql_close($conexion);			
																							
					
?>
</body>
</html>	
	

