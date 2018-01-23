<div id='posicion_posit'>
	<div id='posit'>
		<div id='texto_posit'>
			<?php
			
				// Recoger variables del formulario
				$nombre = $_POST['nombre'];
				$email = $_POST['email'];
				$pass = $_POST['pass'];
				$repass = $_POST['repass'];
				$comentario = $_POST['comentario'];

				$mensaje_error = "";


				// Validar email
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$mensaje_error .= "- Formato de correo incorrecto. <br />";
				}

				// Validar contraseñas
				if ($pass !== $repass){
					$mensaje_error .= "- Las contraseñas no coinciden. <br />";
				}

				if($mensaje_error == ""){
					// Montar correo y enviar 
					$cabecera = "Mensaje de Goblin Market";
					$cuerpo = "Estimado/a ".$nombre.".\n\n";
					$cuerpo .= "Usted ha enviado el siguiente comentario: \n";
					$cuerpo .= "'".$comentario."'.";

					mail($email, $cabecera, $cuerpo);

					echo "
						<h2>¡Registro completo!</h2>
						<p>Recibirá un mensaje en el correo introducido</p>
					";
				}else{
					// Mostrar errores
					echo "
						<h2>Hay errores en el formulario</h2>
						<p>$mensaje_error</p>
					";
				}
			
			?>
		</div>
	</div>
</div>