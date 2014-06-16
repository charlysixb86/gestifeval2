<?php
	error_reporting (5); 
	include_once "../conexion.php";
	session_start();


	if(!isset($_SESSION['usuarioactual']))
	{
		 header('location: 1.php');
	}
	if($_SESSION['Nivel']!="1")
	{
		 header('location: 1.php');
	}

	$usuario=$_SESSION["usuarioactual"];
	
 ?>

<html>
	<head>
		<title>Autentificacion PHP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>

	</head>

		<body>

			<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>


		<form action="cambiar_password.php" method="POST">
		<table align="center" width="455" height="250" cellspacing="2" cellpadding="2" border="0" bgcolor="#84AAE7">

			

<tr>
	<td colspan="4" align="center" height="47px" bgcolor="#F7F8E0"><p><font color="#808080">Cambio de Contraseña Actual</font></p></td>
</tr>

<tr>
	<td colspan="4" align="center" height="47px" style="padding-top: 20px" ><p><font size="2px">*Por favor, introduce tu nueva contraseña*</font></p></td>
</tr>

<tr>
	<td colspan="2" style="padding: 15px 32px 15px 70px;" align="center" width="10px" height="">Nueva Contraseña:

	<input type="Text" name="contra" size="17" maxlength="50"></td>

</tr>	

	



<tr>
	<td style="padding: 20px 35px 25px 0x;" colspan="1" align="center">
		<input type="submit" value="Cambiar">
		<input type="reset" value="Cancelar">
		<input type="button" value="Volver" onclick="window.open('../index.php','_self',false)" / >
</td></tr>


<tr>
	<td style="padding: 10px 25px 20px 10x;" align="left" colspan="4"><img src="../imagenes/logo2.png" alt="" height="105" width="300"> </td>
</tr>




<tr height="5px">
	<td colspan="4" align="center" bgcolor="#A9D0F5"><font color="black"><p><b>Centro Tecnologico - FEVAL - </b></font></p></td>
</tr>


<p align="center"><font color="#FBF8EF"><b>Fecha de Hoy:

		<script>
				var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				var f=new Date();
				document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
		</script>

</b></font></p>

	</table></form>

<?php
include "conexion.php";
$desconexion=mysql_close($conexion);

?>

</body>
</html> 