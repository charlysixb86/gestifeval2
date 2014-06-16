
<?php 


	error_reporting (5); 
	include_once "../conexion.php";
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
		<script src="js/ajax.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">@import url(css/calendar-blue2.css);</style>
		<script type="text/javascript" src="js/calendar.js"></script>
		<script type="text/javascript" src="js/lang/calendar-es.js"></script>
		<script type="text/javascript" src="js/calendar-setup.js"></script>
		<style type="text/css">

  				body 		{ color: black; font-family: 'Oxygen', sans-serif; background: url(../imagenes/fondo2.jpg)  center fixed;}

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
				#principal h3 {background: white; color: #b4045f;}

				#tab_principal {width: 650px; margin-bottom:70px;}
				#tab_principal td{width: 650px;}

				#logo {height:121px; width:405px; margin-left:20px;
						margin-right: 0px; margin-bottom: 10px;}

				#bienvenida {text-align:center; color:white; font-weight: normal;
							font-size: 115%; width:200px; height:26px; 
							background-color:#292929 ; border:1px solid #555555; }
				
				#tab_sec {height:90px;}

  				.botones {border-right: #336699 1px solid; border-top: #336699 1px solid;
  						 	font-size: 12px; border-left: #336699 1px solid;
							width: 100px; cursor: hand; color: #ffffff;
							border-bottom: #336699 1px solid;
							background-color: #292929; border-radius:0px;
							text-align: center; }

				#horas {width: 25px; border-radius:0px; text-align: center;
						 background-color: #F8FBEF; color:black;}

				#data { border-radius:0px; text-align: center;
				  		background-color: #F8FBEF; color:black;}

				#pro1 {width: 135px; border-radius:4px; text-align: center;}

				#contenido {padding-top: 30px; }
				#contenido2 {padding-top: 30px; }

				#volver {margin-right: 200px; margin-bottom:40px; }
				#volver:hover{background: #3b5998; color: #FFFAFA;}
				#envio:hover{background: #3b5998; color: #FFFAFA;}


				#inscripcion {margin-left:20px; margin-top:10px;}
				#inscripcion img{margin-right:30px; margin-bottom:100px;}
				#proyecto {}

				
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
			<form name="form2" id="form2" method="post" action="consultausuario/2A.php">
				<tr>
					<td>
					<input  class="botones" align="right" type="submit" value="Horas Trabajadas"/>
					</td>
				</tr>
			</form>

				<tr>
					<td>
						<input class="botones" type="button" align="right" value="Horas y Coste por Proyecto / Actividad" onclick="window.open('consultausuario/fecha15.php','_self',false)" / >
					</td>
				</tr>
				
				<tr>
					<td>
						<input type="button" class="botones" value="Consultar" onclick="window.open('consultausuario/2Afecha.php','_self',false)" / >
					</td>
				</tr>
		

			<form name="form3" id="form2" method="post" action="consultausuario/4A.php">
				<tr>
					<td>
					<input class="botones" align="right" type="submit" value="Exportar a EXCEL" />
					</td>
				</tr>
		</form>

			<form name="form8" id="form2" method="post" action="consultausuario/5A.php">
				<tr>
					<td>
				
				<input align="right" class="botones" type="submit" name="envio" id="envio" value="Exportar a EXCEL2" />
			</td></tr>
		</form>

			<form name="form1" id="form1" method="post" action="prueba1/vacaciones1.html">
				<tr>
					<td>
					<input class="botones" type="submit" align="right" name="envio" id="envio" value="Insertar Vacaciones" />
					</td>
				</tr>
			</form>


				<tr>
					<td>
					<input class="botones" type="button"  value=" Cambiar Contraseña" onclick="window.open('password.php','_self',false)" / >
					</td>
				</tr>

				
				
			</table>
		</div>	





		<div id="principal">

					
							<div id="inscripcion">
								<h1> Inscripción de Horas <img src='../admin/fotos/hora.png'></img></h1>
							</div>
				

			
				<table id="tab_principal">		
				<form name="form1" id="form1" method="post" action="trabajador.php">
	

					<tr>
						<td id="proyecto">
							Seleccionar Proyecto: </br> 
								<?php
									$consulta_mysql="select * from Tab_Proyectos where Vigencia = 'SI';";
									$resultado_consulta_mysql=mysql_query($consulta_mysql,$conexion);
									echo "<select class='botones' id='pro1'  onchange='load(this.value)'>";
									while($fila=mysql_fetch_array($resultado_consulta_mysql)){
    								echo "<option value='".$fila['NomProyecto']."'>".$fila['NomProyecto']."</option>";}
									echo "</select></br>";
								?>

						</td>
					</tr>
					
				<tr>
					<td>
						Seleccionar Actividad: </br> 
						<select name="act" id="act">
						<div id="act"></div></select>
					</td>
				</tr>

 
 				<tr>
 					<td id="contenido">
 						Numero de Horas:
 						<input class="botones" id="horas" type="text" name="nhoras"  required/>
 					</td>
 				</tr>
 
 				<tr>
 					<td>
						Seleccione Fecha de Inicio:
						<input class="botones" type="text" id="data" name="data" required/>
						<button id="trigger">...</button>	
 
 
 						<script type="text/javascript">
						Calendar.setup(
						{
							inputField : "data", // ID of the input field
							ifFormat : "%Y-%m-%d", // the date format
							button : "trigger" // ID of the button
						}
								 );


						</script>
 					</td>
 				</tr>
 
 	</br>
 	<tr>
 		<td id="contenido2" align="left">
			Observaciones:</br>
 	
	<textarea name="observ" cols="50" rows="4" /> </textarea>
 	</tr>
 		</td>

	<tr>
		<td>
			<input id="envio" class="botones" type="submit" name="envio" id="envio" value="Enviar Datos" />
			<input id="envio" class="botones" type="reset" name="borra" id="borrar" value="Borrar Datos" />
		</td>
	</tr>
	
	<tr>
		<td align="right">
			<input id="volver" class="botones" type="button"   value="Salir" onclick="window.open('../index.php','_self',false)" / >
		</td>
	</tr>	

	</form></table></div>

	
	</form></table></div></div>


<?php

$desconexion=mysql_close($conexion);

?>

</body>
</html> 





	
	















