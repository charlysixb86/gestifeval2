<?php
	
	include_once "../../conexion.php";
	
	session_start();
	if(!isset($_SESSION['usuarioactual']))
	{
		 header('location: ../2.php');
	}
	if($_SESSION['Nivel']!="2")
	{
		 header('location: ../../index.php');
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
  					background: url(../../imagenes/fondo.jpg) no-repeat center center fixed;}

  		</style>
	</head>
<body>
	<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
	<p align="Center"><font color="#F5F6CE">GESTION DEL USUARIO</font> </p>

<div class='CSSTableGenerator' ><table>

<tr>
<td colspan="5" align="center">
<H2> USUARIO </H2>

</tr>
<tr>
<td colspan="5" align="right">
<p> Listado de Horas y Coste por Proyecto y Actividad </p>
</td>
</tr>




<?php

echo "
                    <tr>
                        <td>
                             <b>Nombre de Proyecto </b>
                            
                        </td>
                        <td >
                        	<b>Nombre de Actividad </b>
                            
                        </td>
                        <td>
                             <b>Horas</b>
                            
                        </td>
                        <td >
                        	<b>Coste</b>
                            
                        </td>
                         
                    </tr> ";
					


$consulta1="SELECT NomProyecto, NomActividad, 
SUM(HorasEmpleadasAct)AS Horas, SUM(Coste) AS Dinero
FROM ((Tab_Proyectos P JOIN Tab_Actividades A 
ON P.CodProyecto = A.CodProyecto) JOIN Tab_Datos D
ON A.CodActividad = D.CodActividad) JOIN Tab_Trabajadores T
ON D.CodTrabajador = T.CodTrabajador
WHERE NomUsuario LIKE '$usuario'
AND FechaActividad BETWEEN '$fecha1' and '$fecha2'
GROUP BY NomProyecto, NomActividad;";
					$resultado=mysql_query($consulta1,$conexion);
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
							
							</tr>";
							
														
						}
					}
					
					
					
 ?>

<tr><td colspan="5">
  <div class='botenvio'>
<input type="button" value="Volver" onclick="window.open('../2.php','_self',false)" / >
	</div>
</td></tr>

</table>
</DIV>

<p  align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>

</body>
</html>	
	
	
<?php	

	$desonexion=mysql_close($conexion);			
																							
					
?>