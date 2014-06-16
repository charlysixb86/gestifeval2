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
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  				#cabezera 	{text-align:center; margin-left:280px;margin-right:auto;
  							 margin-top: 40px ; color:#F5F6CE;}

  				#cabezera h1{margin-top: 50px;}	

  				#logo {height:121px; width:405px; margin-left:20px;
						margin-right: 0px; margin-bottom: 10px;}

  		</style>
	</head>
<body>
	

<?php

	$usuario=$_SESSION["usuarioactual"];
	$nomape="select NomTrabajador,ApeTrabajador from Tab_Trabajadores where NomUsuario = '$usuario'";
	$resu=mysql_query ($nomape,$conexion);
	if ($resu !=0)
		{
			while ($solucion=mysql_fetch_array($resu))
			{
				echo "<p align='right'><font size='2' color=white>Bienvenid@: &nbsp <b>$solucion[0] $solucion[1]</b></font></p>"; 
			}
		}?>		


		<div id="cabezera">
			<table>
				<tr>
					<td><h1>GESTIFEVAL (v.09 Beta)</h1></td>
					<td><img id="logo" src="../../imagenes/logo2.png"/></td>
				</tr>
			</table>		
			
		</div>




<div class='CSSTableGenerator' ><table>

<tr>
<td colspan="5" align="center">
<H2> USUARIO </H2>
<?php
$codtra=0;
$consulta1="SELECT CodTrabajador FROM Tab_Trabajadores WHERE NomUsuario='$usuario';";
					$resultado1=mysql_query($consulta1,$conexion);
					if($resultado1!=0)
					{
						while($solucion1=mysql_fetch_array($resultado1)) 
						{
							 
							$codtra=$solucion1[0];
							//echo "Codigo Trabjador: ".$codtra;
														
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
<input type="button" value="Volver" onclick="window.open('../2.php','_self',false)" / >
	</div>
</td></tr>

</table>
</DIV>
</body>
</html>	
	
	
<?php	

	$desonexion=mysql_close($conexion);			
																							
					
?>