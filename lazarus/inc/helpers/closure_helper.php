<?php
	// Aquí se escribiría el código que se ejecutará al FINAL de cada script en PHP (código de limpieza)
	
	// Cerrar la conexión con la base de datos
	$connection->closeConnection();
	
	ob_end_flush(); //Configuración procesador PHP: volcar la SALIDA de PHP y deshabilita el buffering
?>