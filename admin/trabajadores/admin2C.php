
<?php
include_once "../../conexion.php";
	/*error_reporting (5); 
	
	session_start();
	if(!isset($_SESSION['usuarioactual']))
	{
		 header('location: 11.php');
	}
	if($_SESSION['tipo']!="1")
	{
		 header('location: index.php');
	}*/
 ?>


<html>
<head>
	<title>Administrador</title>
	<meta charset="utf-8" />
	<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../../imagenes/fondo2.jpg) no-repeat center center fixed;}

  			</style>
</head>

<body>
	<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
	</br></br></br>


	<form action="admin2CCC.php" method="POST">
	<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">

	<tr><td colspan="2" align="center">
	<H2> Administrador </H2>
	</td></tr>

	<tr><td colspan="2" align="right">
	<p> Modificacion de Usuarios </p>
	</td></tr>

	<tr><td align="left">
	Seleccionar usuario:

		<?php
			$consulta_mysql3='select * from Tab_Trabajadores ORDER BY ApeTrabajador ASC';
			$resultado_consulta_mysql3=mysql_query($consulta_mysql3,$conexion);
			echo "<select name='ususel'>";

				while($fila=mysql_fetch_array($resultado_consulta_mysql3))
					{
    					echo "<option value='".$fila['NomTrabajador']."'>".$fila['ApeTrabajador']. "&nbsp"."&nbsp"  .  $fila['NomTrabajador']."</option>";
					}
				echo "</select>";

 		?>

	</td></tr>

	<tr><td align="right">
	<input type="submit" name="Anadir2" value="Modificar Datos" size="50"/>
	<input type="button" value="Volver" onclick="window.open('ccc.php','_self',false)" / >
	</td></tr>

	</table></form>

	<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../../imagenes/logo2.png" alt="" height="105" width="300"> </p>

	<?php

$desconexion=mysql_close($conexion);

	?>

	</body>
</html> 