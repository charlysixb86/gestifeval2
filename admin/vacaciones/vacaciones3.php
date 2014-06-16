<?php
include_once "../../conexion.php";
	
		
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="table.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>
</head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>



<div class='CSSTableGenerator' ><table>

<tr>
	<td colspan="9" align="center">
	<H2> Administrador </H2>
	</td>
</tr>

<tr>
	<td colspan="9">
	<p> Gestion de Periodos Vacacionales  -- Consulta Dias No Laborables: </p>
	<form action="excel.php" method="POST"><input type="submit" value="Exportar a EXCEL"></form>
	</td>
</tr>


<?php
$data1=$_POST['data1'];
$data2=$_POST['data2'];

echo "
		<tr>
			<td>
				<b>Codigo</b>
			</td>
		
			<td>
				<b>Descripcion</b>
			</td>
		
			<td>
				<b>Fecha</b>
			</td>
		</tr> ";


$consulta="select * from Tab_Vacaciones where Fecha between '$data1' AND '$data2';";
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
							</tr>";
										
						}
					}
 ?>


<tr><td colspan="9">
<input type="button" style="margin-left:37cm" value="Volver" onclick="window.open('ddd.php','_self',false)" / >
</td></tr>
</table></div>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>

<?php

$desconexion=mysql_close($conexion);

?>

</body>
</html>