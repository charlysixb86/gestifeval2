<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta http-equiv="Refresh" content="3;url=1.php">
			<style type="text/css">

  				body { color: black; font-family:Futura; 
  					background: url(../imagenes/fondo.jpg) no-repeat center center fixed;}

  			</style>
</head>

	<body>

		<h1 align="center"><font color="#F5F6CE">GESTIFEVAL</font></h1>
	</br></br>
		<table align="center" width="700" cellspacing="8" cellpadding="8" border="1" bgcolor="#81BEF7">
		
		<tr><td>

<?php
	
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
	
$usuario=$_SESSION["usuarioactual"];

	$fecha1=$_POST['data1'];
	$fecha2=$_POST['data2'];
	$fecha1 = strtotime($fecha1); 
	$fecha2 = strtotime($fecha2);
	$observa=$_POST['observ'];
	$diasfestivos=0;
	$calculado1=0;
	$coun=0;
		
			
			
			
	
				// CONSULTA CODIGO TRAB
	
		$consulta1="SELECT CodTrabajador FROM Tab_Trabajadores WHERE NomUsuario = '$usuario';";
		$trabajador=mysql_query ($consulta1,$conexion);
		if ($trabajador!=0)
			{
			while ($solucion2=mysql_fetch_array($trabajador))
				{
				
					$trabajador1=$solucion2[0];
					
					// Este echo es para activarlo en modo de prueba.
					//echo "<p>Codigo de trabajador actual: <font color=red> $trabajador1</font></p><br>";
				}
			}
	
	
	
					// CALCULO HORAS
				
			$consulta4="SELECT CosteHora
					FROM Tab_Coste
					WHERE Cod_Trabajador = '$trabajador1';";
			$calculado2=mysql_query ($consulta4,$conexion);

				if ($calculado2!=0)
				{
					while ($solucion4=mysql_fetch_array($calculado2))
						{
							//echo $solucion4[0];
							$costehora=$solucion4[0];
						}
				}
						$calculado1=$costehora*7;
						//echo $calculado1;	
				
	
			//RESTA FECHAS
			
			$segundos=($fecha2) - ($fecha1) ;
			$diferencia_dias=intval($segundos/60/60/24);
			$diferencia_dias2=$diferencia_dias+1;

	
			if ($diferencia_dias2 < 40 ) 

			{


					// Este echo es para activarlo en modo de prueba.
			//echo "<h3><br><font color=purple>La cantidad de d&iacuteas entre las 2 fechas son : <b>$diferencia_dias2</b> </font><br><br></h3>" ;
			
			
			//SELECCIONAR DIAS FESTIVOS DE LA TABLA
			
			$consulta=mysql_query ("SELECT Fecha FROM Tab_Vacaciones;",$conexion);
				if ($consulta!=0)
					{
						
						while($solucion=mysql_fetch_array($consulta))
						{
							$diasfest[]=$solucion[0];    /// ---   AKI.
							
						}
						$numerodefilas=mysql_num_rows($consulta);
						// Este echo es para activarlo en modo de prueba.
						//echo "El numero de filas de la consulta es: $numerodefilas <br><br>";
						

							// BUQLE FECHAS
								for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1)))
									{ 
									
										//echo "bucle for 1 comparacion fecha1 y fecha 2: $fecha1 | $fecha2 <br>";
										if((strcmp(date('D',$fecha1),'Sun')!=0) AND (strcmp(date('D',$fecha1),'Sat')!=0))
										{		// Este echo es para activarlo en modo de prueba.
												//echo "condicion NO  ES fin de semana: $fecha1 <br>";
												$ESfestivo=0;
			
												FOR ($pos=0;$pos<$numerodefilas;++$pos)
							
													{
											
														$diasfest1[$pos]=strtotime($diasfest[$pos]);
														if ($fecha1==$diasfest1[$pos])
															{
															// Este echo es para activarlo en modo de prueba.
																//echo "condicion: Es dia festivo $diasfest1[$pos]<br>";
																$ESfestivo=$ESfestivo+1;
															}									
													}
													
													
												
													
												// DIAS HABILES
												// Estos echo son para activarlos en modo de prueba.
												//echo "Fecha: "; 
												$fecha = date("Y-m-d",$fecha1); // RECONVERSION DE STROTIME A DATE
												//echo "<br>";
											
												If($ESfestivo==1)
													{
													// Estos echo son para activarlos en modo de prueba.
														/*Echo "<font color=blue>DIA FESTIVO</font>-";
														echo "<font color=blue>no se realizara la insercion de datos</font><br><br>";*/
													}
												else
													{
													
													$insercion="INSERT INTO Tab_Datos VALUES (`IdH`,'$trabajador1','VACA','VA01',`CodTarea`,'$fecha',7,'$observa',$calculado1,'H');";
													$ins=mysql_query ($insercion,$conexion);
													
													if ($ins!=0)
														{
														$coun=$coun+1;
														
														}
														
													
													}
													
													
													
														
														
														
										}	
	
										else // FINES DE SEMANA SOLO
											{
											// Estos echo son para activarlos en modo de prueba.
												/*echo "Fecha: "; 
												echo date('Y-m-d D',$fecha1);
												echo "<br>";
												echo "<font color=red>FIN DE SEMANA- no se realizara la insercion de datos</font><br> ";
												echo "<br>";
												echo "<br>";*/
											}				
									}
								if ($coun!=0)
									{
														
									echo "<p><font color=brown>$coun. Dias de vacaciones <br> INSERCION REALIZADA CORRECTAMENTE </font> 
										<img align='right' src='proyectos/bien.png'></img></p></br>";
									echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";
									}
								else
									{
										echo "<p>FALLO de Insercion <img align='right' src='proyectos/mal.png'></img></p></br>";
										echo "<font color='#0B243B' align='center'><b>Redirigiendo Página... </b></font></br>";
									}
															
								
									
					}


			}
				
		else 	
				{
					echo "<p align='center'>NO SON PERMITIDOS PERIODOS SUPERIORES A <b>40 DIAS</b></p> ";
					$desonexion=mysql_close($conexion);			
				}

		
																							
					
?>



	</table>
	<p style="padding-bottom: 20px;" align="center" colspan="3"><img src="../imagenes/logo2.png" alt="" height="105" width="300"> </p>
</body>
</html>






