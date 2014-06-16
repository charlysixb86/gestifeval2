<?php
include_once "../../conexion.php";
$depart=$_POST['depart1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="table.css" type="text/css"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo.jpg) no-repeat center center fixed;}

  			</style>
</head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>

<div class='CSSTableGenerator' >
<table>


<tr><td colspan="4">

<h3 align='center'><font color='#FBF2EF'> Listado de Trabajadores por Departamento</font></h3>
</td></tr>
<?php
$codi=0;
$consulta="select Codigo from Tab_Departamentos where Nombre = '$depart';";
					$resultado1=mysql_query($consulta,$conexion);
					if($resultado1!=0)
					{
				
						while($solucion1=mysql_fetch_array($resultado1)) 
						{
							$codi=$solucion1[0];
							
														
						}
						
					}

echo "<h3 align='center'><font color='#FBF2EF'> Departamento : $depart</font></h3>";

echo "
                
                    <tr>
                        <td>
                            <b>Trabajador </b>
                        </td>
                        <td >
                            <b>Nombre Trabajador</b> 
                        </td>
						<td >
                            <b>Apellidos Trabajador</b> 
                        </td>
						<td >
                            <b>Departamento</b> 
                        </td>
						
                    </tr> ";



$consulta="select * from Tab_Trabajadores where Departamento = '$codi';";
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
							<td>$solucion[6] </td>
							</tr>";
														
						}
						
					}
 ?>




<tr><td colspan="4">
  <div class='botenvio'>
<input type="button" value="Volver" onclick="window.open('deptprincipal.php','_self',false)" / >
	</div>
</td></tr>

</table></div>
<p style="padding-bottom: 20px;" align="center" colspan="4"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
</body>
</html>