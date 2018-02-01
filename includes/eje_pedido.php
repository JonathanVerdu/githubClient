<?php

	// Obtenemos cantidad del producto
	$cantidad = $_POST["cantidad"];
	$producto = $_POST["producto"];
	
	// Validamos que la cantidad sea correcta, en caso de no serlo mostrará un mensaje de error
	if($cantidad == ""){
		header('Location: ../index.php?pag=2&error=¡¡ Introduce alguna cantidad para el producto que quieres agregar al carrito !!');
	}

	else if($cantidad > 99){
		header('Location: ../index.php?pag=2&error=¡¡ Introduce una cantidad inferior de 99 !!');
	}

	else if($cantidad < 1){
		header('Location: ../index.php?pag=2&error=¡¡ Introduce una cantidad superior o igual a 1 !!');
	}

?>