<?php

	// DATOS DE LA CONEXIÓN CON LOCALHOST
	define("dominio", "localhost");
	define("usuario", "root");
	define("password", "");
	define("bd", "goblin_market");

	// DATOS DE LA CONEXION CON SERVIDOR EN INTERNET
	/*
	define("dominio", "");
	define("usuario", "");
	define("password", "");
	define("bd", "goblin_market");
	*/

	function conectar(){
		
		$mysqli = new mysqli(dominio, usuario, password, bd);
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		
		$mysqli->set_charset("utf8");
		
		return $mysqli;
		
	}

?>