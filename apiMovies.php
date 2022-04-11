<?php
//Tercera capa de abstraccion: La api codifica la respuesta de la segunda capa a JSON
include_once 'movie.php';

class ApiMovies{
    private $image;
    private $error;
    function error($message){
        echo '<code>' . json_encode(array('message' => $message))  . '</code>';
    }
    function printJSON($array){
        echo '<code>'. json_encode($array).'</code>';
    }
    function success($message){
        echo '<code>' . json_encode(array('message' => $message))  . '</code>';
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
    function addMovie($item){
        $movie = new Movie();
        echo '321';
        $result = $movie -> newMovie($item);
        echo '123';
        $this->success('New movie registered');
        return $result;
    }
    function uploadImage($file){
        //Nombre de la ruta
        $directory = 'images/';
        //Nombre del archivo
        $this -> image = basename($file['name']);
        //ruta + archivo
        $route = $directory . basename($file['name']);
        //tipo de archivo
        $fileType = strtolower(pathinfo($route,PATHINFO_EXTENSION));
        //confirmar que el archivo es una imagen
        $isItImage = getimagesize($file['tmp_name']);
            //Si es uma imagen entonces:
        if($isItImage != false){
            $size = $file["size"];
                //Si pesa demasiado:
            if($size > 500000){ 
                $this->error('the file must be ligther than 500kb');
                return false;
            }else{
                //Si tiene un tamaño adecuado veo que sea del tipo que quiero
                if($fileType == "jpg" || $fileType == "jpeg"){
                    //Si el archivo se suvio correctamente:
                    if(move_uploaded_file($file["tmp_name"], $route)){
                        return true;
                    }else{
                        //De lo contrario:
                        $this -> error = "There wan an error on the upload of the image";
                        return false;
                    }
                }else{
                //Si el formato no es el adecuado:
                    $this -> error = "Only jpg/jpeg files are acepted";
                    return false;
                }
            }
        }else{
            $this -> error = "The file is not an image";
            return false;
        }
    }
    function getImage(){
        return $this -> image;
    }
    function getError(){
        return $this -> error;
    }
}
?>