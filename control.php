<?php


//MODULO DE CONTROL PARA EL LOGIN DE NUESTRA APLICACIONES, INCLUIMOS FICHERO DE CONEXION PARA EMPEZAR //

include_once "conexion.php";

//VALIDAMOS USUARIO SI EXISTE EN NUESTRERA BD Y UTILIZAMOS FUNCION HTMLENTITIES PARA EVITAR INYECCIONES SQL
	 
$myusuario = mysql_query("SELECT NomUsuario FROM Tab_Trabajadores
                                 WHERE NomUsuario =  '".htmlentities($_POST["usuario"])."'",$conexion);
$nmyusuario = mysql_num_rows($myusuario);

//SI EXISTE USUARIO,VALIDAMOS CONTRASEÑA Y ESTADO (VIGENCIA)

     if($nmyusuario != 0){
          $sql = "SELECT NomUsuario
               FROM Tab_Trabajadores
               WHERE Vigencia = 'SI' AND NomUsuario = '".htmlentities($_POST["usuario"])."' 
               and contrasena = '".htmlentities($_POST["contrasena"])."'";
          $myclave = mysql_query($sql,$conexion);
          $nmyclave = mysql_num_rows($myclave);
		  
  /* SI SON CORRECTOS ( USUARIO Y CONTRASEÑA ) COMO ADEMAS DE CONTROLAR EL TIPO DE NIVEL OTORGADO , EMPEZARIAMOS A CREAR EL SISTEMA DE SESIONES	*/	  

 if($nmyclave != 0){
    session_start();

                    //Guardamos dos variables de sesión que nos ayudara para saber si se está o no "logueado" un usuario
                      $_SESSION["autenticado"] = "SI";
                      $_SESSION["usuarioactual"] = mysql_result($myclave,0,0); //Nombre del usuario logueado.
                      $_SESSION["Nivel"] = tipo_usuario($_POST["usuario"]); // Buscamos que tipo es utilizando una funcion desarollada mas abajo.
			   
						           if($_SESSION['Nivel']=="1")
								          header("location:admin/1.php");
						          else
								          header("location:user/2.php");
               //Direccionamos a nuestra página principal del sistema dependiendo del nivel asociado.
			   
                  }
          
            else
                {
                  echo"<script>alert('La contrase\u00f1a del usuario no es correcta.');
                  window.location.href=\"index.php\"</script>"; 
                }

                     }              

            else

                {

                echo"<script>alert('El usuario no existe.');window.location.href=\"index.php\"</script>";

                }
	 
	  
         // FUNCION PARA AVERIGUAR EL NIVEL ASOCIADO A UN USUARIO
	 
	 function tipo_usuario($user)
    {
        $sql = "SELECT Nivel FROM Tab_Trabajadores WHERE NomUsuario='$user'";
		$rec = mysql_query($sql);
		while($row = mysql_fetch_assoc($rec))
        {
            $result = $row['Nivel'];
        }
		return $result;
    }
	
	;



     $desconexion=mysql_close($conexion);	 
?>

	
