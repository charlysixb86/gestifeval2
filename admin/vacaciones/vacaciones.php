
<?php
	error_reporting (5); 
	include_once "../../conexion.php";
	session_start();
	if(!isset($_SESSION['usuarioactual']))
	{
		 header('location: ../1.php');
	}
	if($_SESSION['Nivel']!="1")
	{
		 header('location: ../../index.php');
	}	
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Administrador</title>
		<script src="../js/ajax.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">@import url(../css/calendar-blue.css);</style>
		<script type="text/javascript" src="../js/calendar.js"></script>
		<script type="text/javascript" src="../js/lang/calendar-es.js"></script>
		<script type="text/javascript" src="../js/calendar-setup.js"></script>
		<style type="text/css">


  				body 		{ color: black; font-family: 'Oxygen', sans-serif; background: url(../../imagenes/fondo2.jpg)  center fixed;}

  				#contenedor {margin-left:150px;margin-right:auto; margin-top: 20px; 
  							margin-bottom: 0px;  }

  				#cabezera 	{text-align:center; margin-left:280px; margin-right:auto;
  							 margin-top: 40px ; color:#F5F6CE;}

  				#cabezera h1{margin-top: 65px; color:#F5F6CE; padding-right: 20px;}	

  				#secundario {float: left; width: 233px; height: 450px; 
  								padding: 0px 5px 0px 0px; background-color: #292929; 
  								border: 1px solid #555555; }


  				#secundario a{text-decoration:none; margin-right 1em;
  							 padding: .0em 0 .0em 0em;  color: #333; background: #f4f4f4;}

				#secundario a:hover {background: #58fa58;}

				#secundario input{width: 235px; height: 48px; text-align:left; 
								display:block;}

				#secundario input:hover{background: #3b5998; color: #31B404; font-weight: bold;
										text-decoration: underline;}

				#principal {margin-left: 255px; padding: 0px; background: #CEE3F6; 
							border:1px solid #555555; height: 450px; 
							width: 850px; font-size: 80%; text-align: center;}

				#principal h1 {background: white; color: #b4045f;}

				#subprincipal {text-align: left; margin-left: 38px; margin-top: 40px;}
				#subprincipal table{padding:13px 0px 13px 0px;}
				#subprincipal td{padding:6px 0px 6px 0px;}
		
			

  				.botones {border-right: #336699 1px solid; 
  						 border-top: #336699 1px solid; font-size: 12px;
  						 border-left: #336699 1px solid;
						 width: 100px; cursor: hand; color: #ffffff;
						 border-bottom: #336699 1px solid;
						 background-color: #292929; border-radius:0px; 
						 text-align: center; }


				#parrafo 	{text-align:justify; margin-top:40px; margin-left:40px; 
							padding: 0px 20px 20px 0px ;}

				#logo 		{float:right; margin-top:60px; margin-right: 160px;
							 width:150px; height: 150px;  }
						 
				#miMenu {}

				
				ul#listaMenu1 {
				  /* reseteamos las propiedades por defecto */
				  list-style: none;
				  margin: 0;
				  padding: 0;
				  
				  margin-left: 45px;
				  /* y podemos agregar propiedades para las fuentes de los textos */
								}

				/* cada item de la lista */
				ul#listaMenu1 li {
				  /* las mostraremos una al lado de la otra */
				  display: inline;
								}

				/* y la clave es definir los enlaces como bloques que floten; de ese modo, podemos agregarles porpiedades gráficas con facilidad */
				ul#listaMenu1 li a {
				  display: block; /* esto, transforma el enlace en un rectángulo al que podemos dimensionar */
				  float: left; /* son bloques pero flotan, los veremos uno al lado del otro */
				  text-align: center; /* centramos el texto */
				  text-decoration: none; /* para que no se subrayen los enlaces */
				  margin-right: 2px; /* en este ejemplo, cada botón se separa un poco del adyacente */
				  padding: 5px 20px;
				  /* por último, los colores y los bordes */
				  background: #3b5998;
				  border-top: 2px solid #815444;
				  border-right: 2px solid #3D1000;
				  border-bottom: 2px solid #3D1000;
				  border-left: 2px solid #815444;
				  color: #EEE;
								}
				/* y el efecto hover donde simplemente, cambiamos esos colores */
				ul#listaMenu1 li a:hover {
				  background: #66a376;
				  color: #000;
				  border-top: 2px solid #815444;
				  border-right: 2px solid #C59888;
				  border-bottom: 2px solid #C59888;
				  border-left: 2px solid #815444;
				  font-weight: bold;
				  text-decoration: underline;
										}

				.botones2 	{text-align: center;
					 		border-top: 2px solid #A9D0F5;
				  			border-right: 2px solid #A9D0F5;
				  			border-bottom: 2px solid #A9D0F5;
				  			border-left: 2px solid #A9D0F5;
				  			color: #000000;
				  			background:#EEE; }		

				.botones2:hover{background: #FFFFFF; color: #31B404; font-weight: bold;
										text-decoration: underline; }		

				.clase1 {width: 240px; text-align: center;
					 		border-top: 2px solid #A9D0F5;
				  			border-right: 2px solid #A9D0F5;
				  			border-bottom: 2px solid #A9D0F5;
				  			border-left: 2px solid #A9D0F5;
				  			color: #000000;
				  			background:#EEE; }							 							
			
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
					<td><img src="../../imagenes/logo2.png"/></td>
				</tr>
			</table>	

</div>



<div id="contenedor">

			<div id="secundario">
					<table>	

						
						<tr>
							<td>
								<input class="botones"  type="button"   value="Volver a Pantalla Principal"  onclick="window.open('../1.php','_self',false)" / >
							</td>
						</tr>

							<tr>
							<td>
								<input class="botones"  type="button"   value="Volver a Administrador"  onclick="window.open('../1a.php','_self',false)" / >
							</td>
						</tr>
					</table>
</div>	


			<div id="principal">


					<h1>Gestion de Vacaciones para el Administrador!</h1>

						<div id="miMenu">
  							<ul id="listaMenu1">
							    <li><a href="vacaciones.php">Inscribir Dias No-Laborables</a></li>
							    <li><a href="eliminavacas.php">Eliminar Dias No-Laborables</a></li>
							    <li><a href="vacacionesA3.html">Consultar Dias</a></li>
 							</ul>
						</br></div>

								<div id="subprincipal">
									<form action="vacacionesnuevo.php" method="POST">
									<table>
										<tr>
											<td>
												
												Seleccione Fecha:
													<input type="text" class="botones2" id="datavacas" name="datavacas" />
													<button id="trigger">...</button>	

													<script type="text/javascript">
													Calendar.setup(
													{
													inputField : "datavacas", // ID of the input field
													ifFormat : "%Y-%m-%d", // the date format
													button : "trigger" // ID of the button
													}
													);
													</script>
																											
											</td>
										</tr>


									
										
										
										<tr>		
											<td>		 

												Descripcion: </br> <textarea name="despv" class="botones2" cols="60" rows="6" /> </textarea>  

											</td>	
										</tr>	
										
												
												
												
												
												
												
												<tr><td align="left">
												<input type="submit" class="botones2" name="AnadirA" value="Añadir Dia" size="50"/>
												<input type="reset"  class="botones2" value="Cancelar" / >


											</td></tr>	
									</table>
								</div>
				</div>	
	

<?php $desconexion=mysql_close($conexion); ?>

</body></html>  





	

	
	


		


