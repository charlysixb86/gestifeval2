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
  					background: url(../../imagenes/fondo.jpg) no-repeat center center fixed;}

  			</style>
</head>
<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>

<div class='CSSTableGenerator' >
<table>

<tr><td colspan="2" align="center">
<H2> Administrador </H2>
</td></tr>

<tr><td colspan="2"  align="left">

<h3 align='center'><font> Listado de Departamentos <form action="excel.php" method="POST"><input type="submit" value="Exportar a EXCEL"></form>
</font></h3></td></tr>
<?php
echo "
                
                    <tr>
                        <td>
                            <b>Codigo Departamento </b>
                        </td>
                        <td >
                            <b>Nombre Departamento</b> 
                        </td>                         
                    </tr> ";






$consulta="select * from Tab_Departamentos;";
					$resultado=mysql_query($consulta,$conexion);
					if($resultado!=0)
					{
				
						while($solucion=mysql_fetch_array($resultado)) 
						{
							echo "
							<tr>
							<td>$solucion[0] </td> 
							<td>$solucion[1] </td>
							</tr>";
														
						}
						
					}
 ?>




<tr><td colspan="2">
  <div class='botenvio'>
<input type="button" value="Volver" onclick="window.open('deptprincipal.php','_self',false)" / >
	</div>
</td></tr>

</table></div>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	</body>
</html>