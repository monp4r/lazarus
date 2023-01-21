<?php
	function comprobar_entrada($dato) { /* Función para prevenir inyección código JS */
		$dato = trim($dato);
		$dato = stripslashes($dato);
		$dato = htmlspecialchars($dato);
		return $dato;
	}
	
	function comprobar_entrada2($conexion, $dato) { /* Función para prevenir inyección código JS y SQL */
		$dato = mysqli_real_escape_string($conexion, $dato);
		$dato = trim($dato);
		$dato = stripslashes($dato);
		$dato = htmlspecialchars($dato);
		return $dato;
	}
?>