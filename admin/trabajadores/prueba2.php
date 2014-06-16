<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta http-equiv="Refresh" content="3;url=ccc.php">
	<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>
</head>

<body>

	<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
	</br></br>

<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

	<tr><td>

<?php

	include_once "../../conexion.php";

	$codigo=$_POST ['codtra'];
	$nombre=$_POST ['nombretra'];
	$apellidos=$_POST ['apellidostra'];
	$observacion=$_POST ['observaT'];
	$pass=$_POST ['usucontra'];
	$nivel=$_POST ['usuacceso'];
	$departamento=$_POST ['dep'];
	$costehora=$_POST['coste'];
	$vigencia=$_POST['vigencia'];
	$usuario=$_POST['nombreusu'];




	// ARRAY CODIGOS TRABAJADOR PARA COMPARAR POSTERIORMENTE CON EL NUEVO CODIGO //

	$comparativa="SELECT CodTrabajador FROM Tab_Trabajadores;";
	$comparativa2=mysql_query ($comparativa,$conexion);
		if ($comparativa2!=0)
			{
				while ($solucion=mysql_fetch_array($comparativa2))
					{
						$codtraba[]=$solucion[0];
					}

						$numerodefilas=mysql_num_rows($comparativa2);
						//echo "El numero de filas de la consulta es: $numerodefilas <br><br>";


				FOR ($pos=0;$pos<$numerodefilas;++$pos)
							
					{
														
						if ($codigo==$codtraba[$pos])
								{
									echo "El Codigo de Trabajador: $codtraba[$pos] no es valido<br><br>";
									echo "Pruebe de nuevo</br>";
								}									
					}
			}
			


	//CONSULTAR COD_DEPARTAMENTO

	$depar="SELECT Codigo FROM Tab_Departamentos WHERE Nombre =  '$departamento';";
	$consultas=mysql_query ($depar,$conexion);
		if ($consultas!=0)
		{
			while($solucion=mysql_fetch_array($consultas))
				{
					$codep=$solucion[0];
				}
		}

	// INSERSION DEL TRABAJADOR	

	$proyecto="INSERT INTO Tab_Trabajadores VALUES ('$codigo','$nombre','$apellidos','$observacion','$pass','$nivel',$codep,'$vigencia','$usuario');";
	$consulta=mysql_query ($proyecto,$conexion);

		if ($consulta==0)

					{
						echo "<p>ERROR DE INSERCION PARA EL TRABAJADOR NUEVO Y COSTEHORA <img align='right' src='mal.png'></img></p></br>";
						echo "CONSULTE LOS DATOS NUEVAMENTE</br></br>";	
						echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	
					}
		else
			{
				$coste="INSERT INTO Tab_Coste VALUES ('$codigo',$costehora);";
				$coste2=mysql_query ($coste,$conexion);
					if ($coste2!=0)
						{
							echo "<p>UNA FILA INSERTADA EN LA TABLA TRABAJADORES Y ACTUALIZADO COSTE/HORA PARA DICHO REGISTRO<img align='right' src='bien.png'> </img> </p></br>";
							echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	
						}
					
					if ($coste2==0)	

					{
						echo "<p>ERROR DE INSERCION PARA EL TRABAJADOR NUEVO Y COSTEHORA <img align='right' src='mal.png'></img></p></br>";
						echo "CONSULTE LOS DATOS NUEVAMENTE</br>";	
						echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	
					}
							
			}

?>

</td></tr></table>

<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>

<?php

$desconexion=mysql_close($conexion);

?>

</body>
</html>