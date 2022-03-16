<?php
    print_r($_GET);
	$usuario = $_GET['tipo_usuario'];
	$navegador = $_GET['navegador'];

	echo "<br>El usuario es " . $usuario . " y tiene el navegador " . $navegador;
?>