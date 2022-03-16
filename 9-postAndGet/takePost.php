<?php
    print_r($_POST);
    // "destructurndo":
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];
    // A partir de aqui puedo conectarme a la BD, procesar la info, validarla, etc.
    echo "El usuario es ".$usuario." y su contraseña es ".$pass;


?>