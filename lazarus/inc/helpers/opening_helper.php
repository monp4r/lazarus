<?php

	// Aquí se escribiría el código que se ejecutará al INICIO de cada script en PHP (código de inicialización)
	session_start(); //Habilitación de las sesiones PHP
  ob_start(); //Configuración procesador PHP: activa almacenamiento en buffer de la SALIDA de PHP
	
	//definición de constantes
	define("BAD_REQUEST", -2);
	define("CANCELAR", -1);
	define("OK", 0);
	define("ERROR_ALTA_USUARIO", 1);
	define("ERROR_MODIFICA_USUARIO", 2);
	define("ERROR_BORRADO_USUARIO", 3);
	define("NO_EXISTE_USUARIO", 4);
	define("ERROR_DATOS_USUARIO", 5);
	
	
	//conexión con base de datos
  include_once 'config/Connection.php';
  $connection = new Connection();
	
	// ya se puede incluir el código de la plantilla y otros ...
	include "input_helper.php";
?>