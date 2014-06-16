<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Refresh" content="3;url=2.php">
	<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../imagenes/fondo.jpg) no-repeat center center fixed;}

  		</style>

</head>
<body>

	<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
	<p align="Center"><font color="#F5F6CE">GESTION DEL EMPLEADO</font></p>
														</br></br>

<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">
<tr><td>

</td></tr>
<tr><td>

<?php 
	
	include_once "../conexion.php";
	session_start();
	if(!isset($_SESSION['usuarioactual']))
	{
		 header('location: 2.php');
	}
	if($_SESSION['Nivel']!="2")
	{
		 header('location: index.php');
	}
	
$usuario=$_SESSION["usuarioactual"];
$nhoras=$_POST['nhoras'];
$fecha=$_POST['data']; 

$observ=$_POST ['observ'];



$consulta1="SELECT CodTrabajador FROM Tab_Trabajadores WHERE NomUsuario = '$usuario';";
$trabajador=mysql_query ($consulta1,$conexion);
	if ($trabajador!=0)
	{
		while ($solucion2=mysql_fetch_array($trabajador))
		{
			//echo $solucion2[0];
			$trabajador1=$solucion2[0];
			
		}
	
	}

$act=$_REQUEST ['act'];

$consulta2="SELECT DISTINCT CodProyecto FROM Tab_Actividades WHERE NomActividad = '$act';";
$proyecto=mysql_query ($consulta2,$conexion);

	if ($proyecto!=0)
{
	while ($solucion=mysql_fetch_array($proyecto))
	{
		//echo $solucion[0];
		$proyecto1=$solucion[0];
		
	}
}	

$consulta3="SELECT DISTINCT CodActividad FROM Tab_Actividades WHERE NomActividad = '$act';";
$actividad=mysql_query ($consulta3,$conexion);

	if ($actividad!=0)
{
	while ($solucion3=mysql_fetch_array($actividad))
	{
		//echo $solucion3[0];
		$actividad1=$solucion3[0];
		
	}
}	

$consulta4="SELECT CosteHora
			FROM Tab_Coste
			WHERE Cod_Trabajador = '$trabajador1';";
$calculado=mysql_query ($consulta4,$conexion);

	if ($calculado!=0)
{
	while ($solucion4=mysql_fetch_array($calculado))
	{
		//echo $solucion4[0];
		$costehora=$solucion4[0];
	}
}	

$calculado1=$costehora*$nhoras;
//echo $calculado1;


	
$insercion="INSERT INTO Tab_Datos VALUES (`IdH`,'$trabajador1','$proyecto1','$actividad1',NULL,'$fecha
',$nhoras,'$observ',$calculado1,'R');";
$realizar_insercion=mysql_query ($insercion,$conexion);
		if ($realizar_insercion==0)

		{

			echo "<p>ERROR AL INSERTAR UNA FILA en la tabla Datos  <img align='right' src='proyectos/mal.png'></img></p></br>";
			echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";			
		}

	

	else

		{
			echo "<p>UNA FILA INSERTADA CON EXITO EN LA TABLA DATOS PARA EL USUARIO: $usuario    <img align='right' src='proyectos/bien.png'></img></p></br>";
			echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";			
		}
	  

 ?>
 
 
</table>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>	
</body>
</html>