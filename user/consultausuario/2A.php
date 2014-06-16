<?php 


	error_reporting (5); 
	include_once "../../conexion.php";
	session_start();
	if(!isset($_SESSION['usuarioactual']))
	{
		 header('location: 2.php');
	}
	if($_SESSION['Nivel']!="2")
	{
		 header('location: ../index.php');
	}
	
$usuario=$_SESSION["usuarioactual"];
	
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Gestifeval Proyect</title>
		<script src="../js/ajax.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">@import url(../css/calendar-blue2.css);</style>
		<script type="text/javascript" src="../js/calendar.js"></script>
		<script type="text/javascript" src="../js/lang/calendar-es.js"></script>
		<script type="text/javascript" src="../js/calendar-setup.js"></script>
		<style type="text/css">

  				body 		{ color: black; font-family: 'Oxygen', sans-serif; background: url(../../imagenes/fondo2.jpg)  center fixed;}

  				#contenedor {margin-left:150px;margin-right:auto; margin-top:20px; 
  							margin-bottom: 0px; padding:0px;  }

  				#cabezera 	{text-align:center; margin-left:280px;margin-right:auto;
  							 margin-top: 40px ; color:#F5F6CE;}

  				#cabezera p {text-align:center; color:#F5F6CE; 
  							font-weight: bold ; font-size: 130%}

  				#cabezera h1{margin-top: 50px;}	

  				#secundario {float: left; width: 240px; padding: 0px 5px 0px 0px;
  							 background-color: #292929; border: 1px solid #555555; height: 450px;}

  				#secundario a{text-decoration:none; margin-right 1em; padding: .0em 0 .0em 0em;
  							 color: #333; background: #f4f4f4;}

				#secundario a:hover {background: #58fa58;}
				#secundario input{width: 240px; height: 48px; text-align:left; display:block;}
				#secundario input:hover{background: #3b5998; color: #31B404; font-weight:bold;
										 text-decoration: underline;}

				#principal {margin-left: 255px; padding: 0px; background: #CEE3F6;
							border:1px solid #555555; height: 450px; width: 850px; font-size: 80%; }

				#principal img {padding: 10px; float: right; margin-right:40px;}
				#principal td {padding-left: 10px; margin-top: 90px; }
				#principal h1 { padding-left: 13px; background: white; color: #b4045f; width:380px;}
				#principal p { padding-left: 13px; padding-right: 200px; padding-bottom: 20px; text-align: justify;}

				#tab_principal {width: 650px; margin-bottom:70px;}
				#tab_principal td{width: 650px;}

				#logo {height:121px; width:405px; margin-left:20px;
						margin-right: 0px; margin-bottom: 10px;}

				#bienvenida {text-align:center; color:white; font-weight: normal;
							font-size: 115%; width:200px; height:26px; 
							background-color:#292929 ; border:1px solid #555555; }

  				.botones {border-right: #336699 1px solid; border-top: #336699 1px solid;
  						 	font-size: 12px; border-left: #336699 1px solid;
							width: 100px; cursor: hand; color: #ffffff;
							border-bottom: #336699 1px solid;
							background-color: #292929; border-radius:0px;
							text-align: center; }

				#horas {width: 25px; border-radius:0px; text-align: center;
						 background-color: #F8FBEF; color:black;}

				.fecha { margin-left: 123px; padding-top: 30px; font-weight: bold;}


				.clase1 {	width: 80px; text-align: left;
					 		border-top: 2px solid #A9D0F5;
				  			border-right: 2px solid #A9D0F5;
				  			border-bottom: 2px solid #A9D0F5;
				  			border-left: 2px solid #A9D0F5;
				  			color: #000000;
				  			background:#EEE;
				  			margin-top:50px;

				  			 }

				
  		</style>
	</head>



<body>

<?php

	$usuario=$_SESSION["usuarioactual"];
	$nomape="select NomTrabajador,ApeTrabajador from Tab_Trabajadores where NomUsuario = '$usuario'";
	$resu=mysql_query ($nomape,$conexion);
	if ($resu !=0)
		{
			while ($solucion=mysql_fetch_array($resu))
			{
				echo "<p align='right'><font size='2' color=white>Bienvenid@: &nbsp <b>$solucion[0] $solucion[1]</b></font></p>"; 
			}
		}?>		


		<div id="cabezera">
			<table>
				<tr>
					<td><h1>GESTIFEVAL (v.09 Beta)</h1></td>
					<td><img id="logo" src="../imagenes/logo2.png"/></td>
				</tr>
			</table>		
			
		</div>




		<div id="contenedor">

				<div id="secundario">
					<table>		
						<tr>
							<td>

									<input class="botones" type="button" class="botones" align="right" value=" Volver a Principal" onclick="window.open('../2.php','_self',false)" / >

							</td>
						</tr>		
					</table>
				</div>	





				<div id="principal">
				
				<table id="tab_principal">		
				<form name="form1" id="form1" method="post" action="2AA.php">

					<tr>
						<td>
							
								<h1>Consultar Horas Trabajadas!</h1>
						</td>
					</tr>

					<tr>
						<td>
							
								<p> 
									Selecciona Fecha Origen y Destino para poder visualizar sus registros en pantalla , incluyendo actividades
									en las que ah participado , añadiendo numero de horas , fecha y observaciones.
								</p>	

						</td>
					</tr>

<tr>
	<td>
		<b>Seleccione Fecha de Inicio:</b>
		<input type="text" id="data1" name="data1u" />
		<button id="trigger">...</button>	

			<script type="text/javascript">
			Calendar.setup(
			{
			inputField : "data1", // ID of the input field
			ifFormat : "%Y-%m-%d", // the date format
			button : "trigger" // ID of the button
			}
			);
			</script>

	</td>
</tr>


<tr>
	<td>	
		<b>Seleccione Fecha de Fin: &nbsp;&nbsp;</b>
		<input type="text" id="data2" name="data2u" />
		<button id="triggerhappy">...</button>	

			<script type="text/javascript">
			Calendar.setup(
			{
			inputField : "data2", // ID of the input field
			ifFormat : "%Y-%m-%d", // the date format
			button : "triggerhappy" // ID of the button
			}
			);
			</script>

	</td>
</tr>


<div id="enviar">
	<tr>
		<td>
			<input type="submit" value="Visualizar" class="clase1"/>
			<input type="reset" value="Borrar" class="clase1" / >
		</td>
	</tr>
</div>	

</table></form>

</div></div>


<?php $desconexion=mysql_close($conexion); ?>

</body>
</html> 
