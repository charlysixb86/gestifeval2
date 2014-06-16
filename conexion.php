


<?php

// ARCHIVO UNICO DE CONEXION , AJUSTAR SEGUN SERVIDOR WEB , NOMBRE DE LA BASE DE DATOS , USUARIO Y CONTRASEÑA
	define('DB_SERVER','localhost');
	define('DB_NAME','gestifeval');
	define('DB_USER','chica');
	define('DB_PASS','chica');
	$conexion = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	mysql_select_db(DB_NAME,$conexion);
	mysql_query("SET NAMES 'utf8'");


?>
