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
	
	SESSION_START ();
 
	if (isset($_SESSION['nombre'])){
		
		$nombre=$_SESSION['nombre'];
	}else{
		echo 'No existe nombre en $_SESSION';
	}		
	
	
	
	
	
	$nivel2=$_POST['nivel2'];
	$nombre2=$_POST ['nombre2'];
	$apellidos2=$_POST ['apellidos2'];
	$observacion2=$_POST ['observa2'];
	$contra2=$_POST ['passwd'];
	$departamento=$_POST ['depar'];
	$vigencia=$_POST ['vigencia'];
	$coste=$_POST ['coste'];
	$usuario=$_POST ['usuario'];
	
	



	$consulta_cod="select CodTrabajador from Tab_Trabajadores where NomTrabajador LIKE '$nombre';";
	$resultado_cod=mysql_query($consulta_cod,$conexion);
	
	if($resultado_cod!=0)
					{
						while($solucion=mysql_fetch_array($resultado_cod)) 
						{
							
							$codigo=$solucion[0];	
											
						}

					}
						


							$actualizar="UPDATE Tab_Trabajadores
							SET NomTrabajador = '$nombre2' , ApeTrabajador = '$apellidos2' ,
							 Obtrabajador = '$observacion2', contrasena= '$contra2' , Nivel = '$nivel2' ,
							 Departamento = $departamento , Vigencia = '$vigencia' , NomUsuario = '$usuario' 
							WHERE NomTrabajador = '$nombre';";
	
							$resultado=mysql_query ($actualizar,$conexion);
	
								if ($resultado!=0)
									{
										$actualizar2="UPDATE Tab_Coste
														SET CosteHora = $coste
														WHERE Cod_Trabajador = '$codigo';";

										$resultado2=mysql_query ($actualizar2,$conexion);

										echo "<p> Datos actualizados correctamente  <img align='right' src='bien.png'></img> </p></br>";
										echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	
									}

					else				
							{
									echo "<p>ERROR DE ACTUALIZACION <img align='right' src='mal.png'></img></p></br> </br>";
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