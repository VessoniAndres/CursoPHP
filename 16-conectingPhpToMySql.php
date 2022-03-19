<?php

    include('Contraseña.php');
    $conection = new mysqli($domain, $username, $password);
    if($conection-> connect_error){
        die('Conection failed: '. $conection-> connect_error);
    }
    echo 'Conection succesfuly';

?>
