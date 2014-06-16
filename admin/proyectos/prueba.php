
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta http-equiv="Refresh" content="3;url=aaa.php">
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>

</head>

	<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>
		<table align="center" width="550" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">
		
		<tr><td>
<?php

include_once "../../conexion.php";

$codigo=$_POST ['codpro'];
$nombre=$_POST ['nombrepro'];
$descripcion=$_POST ['despro'];
$activo=$_POST ['activo'];
$fecha1=$_POST ['data'];
$fecha2=$_POST ['data2'];
$global=$_POST ['global'];
$departamento=$_POST ['dep'];



		// ARRAY CON TODOS LOS CODIGOS DE PROYECTOS PARA COMPARAR POSTERIORMENTE CON EL NUEVO CODIGO INSERTADO //

		$comparativa="SELECT CodProyecto FROM Tab_Proyectos;";
		$comparativa2=mysql_query ($comparativa,$conexion);
			if ($comparativa2!=0)
			{
				while ($solucion=mysql_fetch_array($comparativa2))
					{
						$codproye[]=$solucion[0];
					}

						$numerodefilas=mysql_num_rows($comparativa2);
						//echo "El numero de filas de la consulta es: $numerodefilas <br><br>";


				FOR ($pos=0;$pos<$numerodefilas;++$pos)
							
					{
														
						if ($codigo==$codproye[$pos])
								{
									echo "El Codigo del Proyecto : <font color=white><b> $codproye[$pos] </b></font> no es valido<br>";
									echo "Pruebe de nuevo</br>";
								}									
					}
			}
			

		// INSERCION DE UN NUEVO PROYECTO

		$proyecto="INSERT INTO Tab_Proyectos VALUES ('$codigo','$nombre','$descripcion','$activo','$fecha1','$fecha2','$global',$departamento);";
		$consulta=mysql_query ($proyecto,$conexion);

			if ($consulta==0)

			{
				echo "<p>ERROR EN LA INSERCION DE UN PROYECTO <img align='right' src='mal.png'></img></p></br> </br>";
				echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	


			}
			
			else
			
			{
				echo "<p>Inserción del Proyecto Realizada<img align='right' src='bien.png'></img></p></br> </br>";
				echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	
			}
						
?>

	

	</table>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
	</body>
</html>

