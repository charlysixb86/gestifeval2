
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
<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#CEE3F6">
<tr><td>
<?php

	include "../../conexion.php";
	
	SESSION_START ();
		
	if (isset($_SESSION['Codigo'])){
		
		$Codigo=$_SESSION['Codigo'];
	}else{
		echo 'No existe nombre en $_SESSION';
	}		
	
	
	$nombre2=$_POST['nombrepro2BB'];
	$descripcion2=$_POST ['desproB2'];
	$radio2=$_POST ['activoB2'];
	$global=$_POST ['globa2'];
	$fecha1=$_POST ['data'];
	$fecha2=$_POST ['data2'];
	$departamento=$_POST ['depa'];
	
	$consulta_borrar="UPDATE Tab_Proyectos
						SET NomProyecto = '$nombre2' , DesProyecto = '$descripcion2' ,
							Vigencia = '$radio2' , Fecha1='$fecha1' , Fecha2='$fecha2' , Global = '$global' , Departamento = $departamento
						WHERE CodProyecto = '$Codigo';";
	
	$borrar=mysql_query ($consulta_borrar,$conexion);
	
	if ($borrar==0)

			{
				echo "<p> No hay datos que mostrar <img align='right' src='mal.png'></img></p></br> </br>";
				echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";	

			}
	
	
else
			{

				echo "<p>Datos del proyecto actualizados correctamente <img align='right' src='bien.png'></img></p></br> </br>";
				echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";		
	
			}
?>


<tr><td align="right">



</td></tr>


</td></tr></table>
<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>
<?php

$desconexion=mysql_close($conexion);

?>
</body>
</html>