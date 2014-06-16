


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
		 header('location: ../index.php');
	}

	
 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Administrador</title>
		<script src="js/ajax.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">@import url(css/calendar-blue2.css);</style>
		<script type="text/javascript" src="js/calendar.js"></script>
		<script type="text/javascript" src="js/lang/calendar-es.js"></script>
		<script type="text/javascript" src="js/calendar-setup.js"></script>
		<style type="text/css">

  				body 		{ color: black; font-family: 'Oxygen', sans-serif; background: url(../imagenes/fondo2.jpg)  center fixed;}

  				#contenedor {margin-left:150px;margin-right:auto;
  							 margin-top: 20px; margin-bottom: 0px; }

  				#cabezera 	{text-align:center; margin-left:280px;
  							margin-right:auto; margin-top: 40px ; color:#F5F6CE;}

  				#cabezera h1{margin-top: 50px; 
  							color:#F5F6CE;}	


  				#secundario {float: left; width: 240px; padding: 0px 5px 0px 0px; 
  							background-color: #292929; border: 1px solid #555555;
  							 height: 450px;}

  				#secundario a{text-decoration:none; margin-right 1em;
  				 			  padding: .0em 0 .0em 0em;  color: #333; background: #f4f4f4;}

				#secundario a:hover {background: #58fa58;}

				#secundario input{width: 235px; height: 48px; text-align:left;
									display:block;}

				#secundario input:hover{background: #3b5998; color: #31B404; font-weight: bold; 
										text-decoration: underline;}

				#principal {margin-left: 255px; padding: 0px;
				 			background: #CEE3F6; border:1px solid #555555; 
				 			height: 450px; width: 850px; font-size: 80%; }


				#principal img {padding: 10px; float: right;}

				#principal td {padding-left: 10px; }

				#principal h3 {background: white; color: #b4045f;}

				#tab_principal {margin-top: 0px;margin-bottom: 0px; width: 650px;}

				#tab_principal td{margin-top: 360px; width: 650px;}

				#logo {height:121px; width:405px; margin-left:20px;
						margin-right: 0px; margin-bottom: 10px;}

				#bienvenida {text-align:center; color:white; font-weight: normal;
							 font-size: 115%; width:200px; height:26px; 
							background-color:#292929 ; border:1px solid #555555;}
				
				#bienvenida:td {margin-right:auto; margin-left:auto;}

				#tab_sec {height:90px;}

  				.botones {border-right: #336699 1px solid; border-top: #336699 1px solid;
  						 font-size: 12px; border-left: #336699 1px solid;
						 width: 100px; cursor: hand; color: #ffffff; 
						 border-bottom: #336699 1px solid;
						 background-color: #292929; border-radius:0px; text-align: center; }

				#horas {width: 25px; border-radius:0px; text-align: center;
						 background-color: #F8FBEF; color:black;}

				#data { border-radius:0px; text-align: center;  background-color: #F8FBEF;
						 color:black;}

				#pro1 {width: 135px; border-radius:4px; text-align: center;}


				#Volver {margin-top: 30px; margin-left: 80px;
							 border-right: #336699 1px solid;
							 border-top: #336699 1px solid; 
							 font-size: 12px; border-left: #336699 1px solid;
							 width: 100px; cursor: hand; color: #ffffff;
							 border-bottom: #336699 1px solid;
							 background-color: #292929; border-radius:0px; text-align: center; }


				#Volver input:hover{background: #3b5998; color: #FFFAFA;}
				

				.menuad {height:70px; width:70px; margin-top: 130px;
						 margin-right:auto; margin-left:auto;}
				
			
				*, *:before, *:after {-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box;}

 
				.container {width:52em;margin:1em auto;padding:.1999em; margin-top: 60px;}
 
				.item {width:12em;height:12em;background-color:white;float:left;margin:.2em;background-size:cover;padding:1em;}
				.item-double {width:24.4em;}
				 
				.item-teal {background-color:#008299; width: 200px;}
				.item-blue {background-color:#2672EC; width: 220px; }
				.item-purple {background-color:#8C0095;}
				.item-darkpurple {background-color:#5133AB;}
				.item-red {background-color:#AC193D;}
				.item-orange {background-color:#D24726;}
				.item-green {background-color:#008A00; width: 200px;}
				.item-skyblue {background-color:#094AB2;}
				 
				.item-teal:hover {background-color:#00A0B1;}
				.item-blue:hover {background-color:#2E8DEF;}
				.item-purple:hover {background-color:#A700AE;}
				.item-darkpurple:hover {background-color:#643EBF;}
				.item-red:hover {background-color:#BF1E4B;}
				.item-orange:hover {background-color:#DC572E;}
				.item-green:hover {background-color:#00A600;}
				.item-skyblue:hover {background-color:#0A5BC4;}
				.item a, .item .not-found {color:#FFF;	font-size:2em;line-height:1.3;text-decoration:none;display:inline-block;width:120%;height:100%;}
 
				@media only screen and (max-width:50em) {.container {width:100%;margin:0;}}

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
		}

?>		
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

				<form name="form2" id="form2" method="post" action="2A.html">
					<tr>
						<td>
							<input  class="botones" align="right" type="submit" value="Ir a Consultas"/>
						</td>
					</tr>
				</form>


			<form name="form1" id="form1" method="post" action="vacaciones1.html">
				<tr>
					<td>
						<input class="botones" type="submit" align="right" name="envio" id="envio" value="Insertar Vacaciones" />
					</td>
				</tr>
			</form>

				<tr>
					<td>
						<input class="botones" type="button"  value=" Cambiar Contraseña" onclick="window.open('../../password.php','_self',false)" / >
					</td>
				</tr>

				
				<tr>
					<td>
						<input class="botones"  type="button"   value="Volver a Pantalla Principal"  onclick="window.open('1.php','_self',false)" / >
					</td>
				</tr>
			</table>
			</div>	



		<div id="principal">


			

<div class="container js-isotope" data-isotope-options="{ "itemSelector": ".item", "layoutMod": "fitRows" }">
<div class="item item-blue"><a class="post-title" href="departamento/deptprincipal.php">Departamentos</a></div>
<div class="item item-teal"><a class="post-title" href="trabajadores/ccc.php">Trabajadores</a></div>
<div class="item item-green"><a class="post-title" href="vacaciones/ddd.php">Vacaciones</a></div>
<div class="item item-double item-purple"><a class="post-title" href="proyectos/aaa.php">Proyectos</a></div>
<div class="item item-double item-orange"><a class="post-title" href="actividades/bbb.php">Actividades</a></div>


</div>
</div>

	



<?php

$desconexion=mysql_close($conexion);

?>

</body>
</html> 