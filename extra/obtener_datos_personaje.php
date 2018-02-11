<?php

  include_once "../include/conectarBD.php";
  include_once "../include/funciones.php"; 
  session_start();

  $nombre = $_POST["nombre"];
  $jsondata = array();

  $conexion = conectar();
  $conexion->query("SET NAMES 'utf8'");

  // Datos de tabla personajes
  $sql = "SELECT * FROM personajes WHERE nombre = '$nombre'";
  $res = $conexion->query($sql);
  $fila = $res->fetch_array();

  $edad = $fila["edad"]; 
  $altura = $fila["altura"];
  $peso = $fila["peso"];
  $raza = $fila["raza"];
  $sexo = $fila["sexo"];
  $clase = $fila["clase"];
  $exp = $fila["exp"];
  $fuerza = $fila["fuerza"];
  $destreza = $fila["destreza"];
  $carisma = $fila["carisma"];
  $inteligencia = $fila["inteligencia"];

  // Sacamos los actuales y los máximos a los que puede subir de cada atributo
  $sql = "SELECT * FROM relaciones_atributomax_personaje WHERE personaje = '$nombre' AND atributo = 'fu'";
  $res = $conexion->query($sql);
  $fila = $res->fetch_array();
  $actual_fuerza = $fila["subida_actual"];
  $max_fuerza = $fila["subida_total"];

  $sql = "SELECT * FROM relaciones_atributomax_personaje WHERE personaje = '$nombre' AND atributo = 'de'";
  $res = $conexion->query($sql);
  $fila = $res->fetch_array();
  $actual_destreza = $fila["subida_actual"];
  $max_destreza = $fila["subida_total"];

  $sql = "SELECT * FROM relaciones_atributomax_personaje WHERE personaje = '$nombre' AND atributo = 'ca'";
  $res = $conexion->query($sql);
  $fila = $res->fetch_array();
  $actual_carisma = $fila["subida_actual"];
  $max_carisma = $fila["subida_total"];

  $sql = "SELECT * FROM relaciones_atributomax_personaje WHERE personaje = '$nombre' AND atributo = 'in'";
  $res = $conexion->query($sql);
  $fila = $res->fetch_array();
  $actual_inteligencia = $fila["subida_actual"];
  $max_inteligencia = $fila["subida_total"];

  // Pasamos los datos recolectados al objeto JSON
  $jsondata["nombre"] = $nombre;
  $jsondata["edad"] = $edad;
  $jsondata["altura"] = $altura;
  $jsondata["peso"] = $peso;
  $jsondata["raza"] = $raza;
  $jsondata["sexo"] = $sexo;
  $jsondata["clase"] = $clase;
  $jsondata["exp"] = $exp;
  $jsondata["fuerza"] = $fuerza;
  $jsondata["destreza"] = $destreza;
  $jsondata["carisma"] = $carisma;
  $jsondata["inteligencia"] = $inteligencia;
  $jsondata["maxFuerza"] = $max_fuerza;
  $jsondata["actualFuerza"] = $actual_fuerza;
  $jsondata["maxDestreza"] = $max_destreza;
  $jsondata["actualDestreza"] = $actual_destreza;
  $jsondata["maxCarisma"] = $max_carisma;
  $jsondata["actualCarisma"] = $actual_carisma;
  $jsondata["maxInteligencia"] = $max_inteligencia;
  $jsondata["actualInteligencia"] = $actual_inteligencia;

  // Datos de las habilidades
  $sql = "SELECT * FROM relaciones_habilidad_personaje WHERE personaje = '$nombre'";
  $res = $conexion->query($sql);

  $i = 0;
  while($fila = $res->fetch_array()){
  	$nombre_hab = $fila["habilidad"];
  	$bono_hab = $fila["bono"];
  	$jsondata["habilidad_nombre"][$i] = $nombre_hab;
  	$jsondata["habilidad_bono"][$i] = $bono_hab;
  	$i++;
  }
  $jsondata["sql"] = $sql;

  // Datos de las mejoras
  $sql = "SELECT * FROM relaciones_mejora_personaje WHERE personaje = '$nombre'";
  $res = $conexion->query($sql);

  $i = 0;
  while($fila = $res->fetch_array()){
  	$mejora = $fila["mejora"];
  	$jsondata["mejora"][$i] = $mejora;
  	$i++;
  }

  // Datos de las tecnicas
  $sql = "SELECT * FROM relaciones_tecnica_personaje WHERE personaje = '$nombre'";
  $res = $conexion->query($sql);

  $i = 0;
  while($fila = $res->fetch_array()){
  	$tecnica = $fila["tecnica"];
  	$jsondata["tecnica"][$i] = $tecnica;
  	$i++;
  }
 
  echo json_encode($jsondata);
	 
?>