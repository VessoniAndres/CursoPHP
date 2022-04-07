<?php
//Segunda capa de abstraccion: peticion a la BD.
//Aqui definire las funcionalidades iniciales que tiene una pelicula
include_once 'db.php';
class Movie extends DB{
    function takeMovies(){
        $query = $this->connect()->query('SELECT * FROM movie');
        return $query;
    }

}


?>