<?php
  // Función para prevenir inyección código JS y SQL
	function comprobar_entrada2($dato) { /* Función para prevenir inyección código JS */
		$dato = trim($dato);
		$dato = stripslashes($dato);
		$dato = htmlspecialchars($dato);
		return $dato;
	}
?>