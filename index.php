<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Goblin Market</title>
	<link rel="stylesheet" href="estilo.css" type="text/css" /> 
</head>
<body>
	<div id="cabecera">
		<?php include("includes/cabecera.php"); ?>
	</div>
	
	<div id="cuerpo">
		<?php
			if(!isset($_GET['pag'])){

			}else{
				if($_GET['pag'] == 1) include('includes/form_registro.php');
				if($_GET['pag'] == 2) include('includes/form_pedido.php');
			}
		?>
	</div>
	
	<div id="pie">
		<?php include("includes/pie.php"); ?>
	</div>
</body>
</html>