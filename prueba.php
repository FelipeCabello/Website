<?php

$mensaje = 
	'<html>'.
	'<body><h1>Mensaje de la página web -  camarlengoweb</h1>'.
	'aaaaaaaaa'.
	'<hr>'.
	'bbbbbbbbb'.
	'</body>'.
	'</html>';

$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: camarlengoweb@gmail.com';

if (mail("camarlengoweb@gmail.com", "Prueba", $mensaje, $cabeceras)) {
	echo "hola";
} else {
	echo "no";
}
?>
