<?php
//Cuarta capa de abstraccion: Se muestra el resultado de la API
include_once 'apiMovies.php';
$api = new ApiMovies();
if(isset($_GET['id'])){
    if(is_numeric($_GET['id'])){
        $api -> getById(($_GET['id']));
    }else{
        $api->error('The params are incorrect.');
    }
}else{
    $api -> getAll();
}

?>