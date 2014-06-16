<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
											<!--  CHARSET UTF8 y APLICACION DE ESTILOS EN CSS -->
		<title>Autentificacion PHP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<style type="text/css">

  				body {  font-family: 'Quicksand', sans-serif; background: url(imagenes/fondo2.jpg)  fixed; }

  				#cabezera { color:#F5F6CE; text-align:center; margin-top:100px; }
  				#cabezera h1{  margin-left:auto; margin-right:auto; }
  				#cabezera p{  margin-left:auto; margin-right:auto; }
				#p1 { width: 220px; font-weight:bold; color:#F5F6CE; font-size:80%; margin-bottom:20px; border-right: #336699 1px solid;
					 border-top: #336699 1px solid; border-left: #336699 1px solid; cursor: hand; border-bottom: #336699 1px solid;}
  				#tabla { width:455px; height:250px; text-align:center; background-color:#84AAE7; border: 1px solid black; margin-left:auto;
						margin-right:auto;}
				#td_imagen {text-align:center; margin-left:auto;margin-right:auto; padding-bottom:5px; height:10px;}
				#td_final {text-align:center; margin-left:auto;margin-right:auto; padding-bottom:0px; font-weight:bold; background-color:#F5ECCE;  font-size:85%;}
				#td_boton {text-align:center; margin-left:auto;margin-right:auto; padding-left:105px;}
				#td_boton {text-align:center; margin-left:auto;margin-right:auto; padding-left:105px;}
				#td_usu {text-align:center; margin-left:auto;margin-right:auto; padding-left:120px; width:10px; font-size:85%;}
				#td_pas { font-size:85%;}
				#td2 {height:47px; text-align:center; margin-left:auto;margin-right:auto; font-size:86%;  font-weight:normal;}
				#logo {height:105px; width:325px; margin-bottom: 10px;}
				#final {font-weight:bold; color:#2A0A0A; font-size:70%; text-align:center; margin-left:auto;margin-right:auto; }

				.clase1 {width: 127px; text-align: left;
					 		border-top: 2px solid #A9D0F5;
				  			border-right: 2px solid #A9D0F5;
				  			border-bottom: 2px solid #A9D0F5;
				  			border-left: 2px solid #A9D0F5;
				  			color: #000000;
				  			background:#EEE; }	


  			</style>
	</head>




											<!--  FORMULARIO ACCESO O LOGIN PARA LA APLICACION  -->


		<body>

		<div id="cabezera">

			<h1>GESTIFEVAL (v.0.9 Beta)</h1>
			<p id="p1">Fecha de Hoy: 

											<!--  SACA DIA/FECHA CON JAVASCRIPT -->

				<script type="text/javascript">
					var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
					var f=new Date();
					document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
				</script></p>

		</div>

		<form action="control.php" method="POST">
			
			<table id="tabla">

				<tr>
					<td colspan="3" align="center"


<?php
			// CAMBIARA CABECERA LOGIN DEPENDIENDO SI LAS CREEDENCIALES SON CORRECTAS O NO //

if (isset($_POST["errorusuario"]))
	{	
		if ($_POST["errorusuario"]=="si")
			{
				echo"<td bgcolor=red>";
				echo"Error, Introduzca datos nuevamente";
				echo"</td>";
			}

		else

			{
				echo"<td bgcolor=silver>";
				echo"Introduzca su clave de acceso";
				echo"</td>";
			}
	}

		else

			{
				echo"<td bgcolor=silver>";
				echo"Esperando datos";
				echo"</td>";
			}
?>

	</td>
</tr>

<tr>
	<td id="td2" colspan="3" ><p>*Por favor, introduce tu usuario y tu contraseña para acceder*</p>
	</td>
</tr>

<tr>
	<td id="td_usu" >Usuario:</td>
	<td  align="left">
		<input type="Text" name="usuario" class="clase1" size="17" maxlength="50">
	</td>

</tr>	


<tr>
	<td id="td_pas" align="right" >Contraseña:</td>
	<td align="left" ><input type="password" class="clase1" name="contrasena" size="17" maxlength="50"> </td>
</tr>

<tr>
	<td id="td_boton"  colspan="3">
		<input type="submit" value="Entrar">
	</td>
</tr>

<tr>
	<td id="td_imagen" colspan="3">
		<img id="logo" src="imagenes/logo2.png"> 
	</td>
</tr>


	</table></form>

<div id="final">
	<p>Esta aplicación esta optimizada para navegadores Google Chrome </p> 
	pulse para descargar <a href="http://www.google.es/intl/es/chrome/browser/"> aqui </a> 
</div>

<?php
include "conexion.php";
$desconexion=mysql_close($conexion);
?>

</body>
</html> 