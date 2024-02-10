<?php
	function comprobar_entrada($dato) { /* We prevent JS and HTML inyection */
		$dato = trim($dato);
		$dato = stripslashes($dato);
		$dato = htmlspecialchars($dato);
		return $dato;
	}
	
	function comprobar_entrada2($conexion, $dato) { /* We prevent here SQL inyection too (not used) */
		$dato = mysqli_real_escape_string($conexion, $dato);
		$dato = trim($dato);
		$dato = stripslashes($dato);
		$dato = htmlspecialchars($dato);
		return $dato;
	}
?>