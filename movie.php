<?php
//Segunda capa de abstraccion: peticion a la BD.
//Aqui definire las funcionalidades iniciales que tiene una pelicula
include_once 'db.php';
class Movie extends DB{
    //Consulta para todos los id;
    function takeMovies(){
        $query = $this->connect()->query('SELECT * FROM movie');
        return $query;
    }
    //Consulta especifica para cada id
    function takeMovie($id){
        $query = $this->connect()->prepare('SELECT * FROM movie WHERE id= :id');
        $query->execute(['id' => $id]);
        return $query;
    }
    //Agrega una nueva pelicula a la BD
    //$movie es un array
    function newMovie($movie){
        $query = $this->connect()->prepare('INSERT INTO moviePrueva (name1, poster) VALUES (:name1, :poster)');
        $query->execute(['name1' => $movie['name'], 'poster' => $movie['poster']]);
        return $query;
    }
}


?>