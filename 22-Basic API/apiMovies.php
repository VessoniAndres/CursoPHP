<?php
//Tercera capa de abstraccion: La api codifica la respuesta de la segunda capa a JSON
include_once 'movie.php';

class ApiMovies{
    function error($message){
        echo '<code>' . json_encode(array('message' => $message))  . '</code>';
    }
    function printJSON($array){
        echo '<code>'. json_encode($array).'</code>';
    }
    function getAll(){
        $movie = new Movie();
        $movies = array();
        //I.E. Dentro de movies hay un objeto llamado items, el cual es un Array.
        $movies["items"] = array();

        $result = $movie->takeMovies();
        
        if($result->rowCount() > 0){
            //Si quiero almacenar los resultados en una variable, debo usar fetch o
            //fetch all.
            //Itero sobre cada uno de las filas para setear un item  y pushearlo
            //Dentro del arreglo.
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'poster' => $row['poster']
                );
                array_push($movies['items'], $item);
            }
            //retorno el Json de las movies, json_encode convierte a json el array
            //De peliculas.
            $this -> printJSON($movies);
        }else{
            //Como hacer un recorrido a un arreglo vacio daria un error, entonces
            //tenemos este else.
            // echo json_encode(array('message' => "There aren't elements registred"));
            $this -> error('No items registered');
            //json_encode permite parsear el argumento a formato JSON.
        }
    }
    function getById($id){
        $movie = new Movie();
        $movies = array();
        $movies["items"] = array();

        $result = $movie->takeMovie($id);
        
        if($result->rowCount() == 1){
            $row = $result->fetch();
            $item = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'poster' => $row['poster']
            );
            array_push($movies['items'], $item);
            $this -> printJSON($movies);
        }else{
            $this -> error('No items registered');
        }
    }
}

?>