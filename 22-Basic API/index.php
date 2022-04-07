<?php
//Cuarta capa de abstraccion: Se muestra el resultado de la API
include_once 'apiMovies.php';
$api = new ApiMovies();
$api -> getAll();

?>