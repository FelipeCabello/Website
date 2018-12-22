<?php
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$asunto = $_POST["asunto"];
	$texto = $_POST["texto"];

	$texto2 = nl2br($texto);

	$mensaje =	'<html>'.
					'<body style="background-color: #e9e9e9">'.
						'<div style="padding: 60px; font-family: arial;">'.
							'<div style="margin: 0px auto; width: 600px; border-radius: 10px; background-color: #1a1a1a; color: white;">'.
								'<div style="padding: 40px;">'.
									'<img src="https://image.ibb.co/hoDVBp/Sin_t_tulo_1.png" alt="logo" style="width: 80%;">'.
									'<h1 style="padding-top: 15px;">Tienes un nuevo mensaje.</h1>'.
									'<h3>Hola Felipe, tienes un nuevo mensaje que tu buzón.</h3>'.
									'<p>Fué enviado por <span style="color: tomato;">'.$nombre.'</span> y tiene el siguiente correo eletrónico <span style="color: tomato;">'.$email.'</span>.</p>'.
									'<hr style="border: 1px solid white;">'.
									'<p style="min-height: 30%; color: tomato;">'.
										$texto2.
									'</p>'.
									'<p style="color: gray;">No responda a este mensaje, es un envío automático.</p>'.
								'</div>'.
							'</div>'.
						'</div>'.
					'</body>'.
				'</html>';


	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .= 'From: camarlengoweb@gmail.com';

	if ( mail("camarlengoweb@gmail.com", $asunto, $mensaje, $cabeceras) ) {
		return true;
	} else {
		return false;
	}
?>