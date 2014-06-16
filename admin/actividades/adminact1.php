
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta http-equiv="Refresh" content="3;url=bbb.php">
<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>
</head>

	<body>
<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
<p align="Center"><font color="#F5F6CE">GESTION DEL ADMINISTRADOR</font> </p>
		<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

			<tr><td>	
				
				<?php

					include_once "../../conexion.php";

					$proyecto=$_POST ['pro'];
					$codigo=$_POST ['codact'];
					$nombre=$_POST ['nombreact'];
					$descripcion=$_POST ['observaA'];
					$vigencia=$_POST['radioVg'];


						// SACAR CODIGO PROYECTO ESPECIFICO PARA EL INSERT EN ACTIVIDADES (CodProyecto)

						$codp="SELECT CodProyecto FROM Tab_Proyectos WHERE NomProyecto = '$proyecto';";
						$codp2=mysql_query ($codp,$conexion);
							if ($codp2!=0)
								{
									while ($solucion=mysql_fetch_array($codp2))
										{
											$codigo2=$solucion[0];
											//echo "*codigo del proyecto seleccionado -- $solucion[0]*</br></br>";
										}
								}


						// ARRAY CODIGOS ACTIVIDAD PARA COMPARAR POSTERIORMENTE CON EL NUEVO CODIGO //
					$arrayact="SELECT CodActividad FROM Tab_Actividades;";
					$arrayact2=mysql_query ($arrayact,$conexion);
						if ($arrayact2!=0)

							{
								while ($solucion=mysql_fetch_array($arrayact2))
									{
										$codact[]=$solucion[0];
									}

								$numerodefilas=mysql_num_rows($arrayact2);
								//echo "El numero de filas de la consulta es: $numerodefilas <br><br>";

								FOR ($pos=0;$pos<$numerodefilas;++$pos) 

									{
										if ($codigo==$codact[$pos]) 
											{
												echo "El Codigo de la Actividad: $codact[$pos] no es valido<br><br>";
												echo "Pruebe de nuevo</br>";
											}
									}
							}



						// INSERCION DE DATOS PARA TABLA ACTIVIDAD

					$consulta="INSERT INTO Tab_Actividades VALUES ('$codigo2','$codigo','$nombre','$descripcion','$vigencia');";	
					$actividad=mysql_query ($consulta,$conexion);

					if ($actividad==0)
						{

							echo "<p>ERROR EN LA INSERCION DE UNA ACTIVIDAD PARA EL PROYECTO $proyecto <img align='right' src='mal.png'></img></p></br> </br>";
							echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	

						}	
					
					else
	
						{

							echo "<p>ACTIVIDAD AGREGADA CON CODIGO <font color=green><b>$codigo <img align='right' src='bien.png'></img></p></br> </br></b></font>
							 PARA EL PROYECTO <font color=green><b> $proyecto ($codigo2)</b> </font></p> ";

							 echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	

						}
						
				?>


	</td></tr></table>
	<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
	</body>
</html>