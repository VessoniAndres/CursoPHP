<?php

include_once 'apiMovies.php';
$api = new ApiMovies();

if(isset($_POST['name']) && isset($_FILES['image'])){
    if($api -> uploadImage($_FILES['image'])){
        //Insertar datos;
        $item = array(
            'name' => $_POST['name'], 
            'poster' => $api -> getImage()
        );
        echo $item['name'].$item['poster'];
        echo $api->addMovie($item);
    }else{
        $api->error("Error:" . $api->getError());
    }
    $api -> addMovie($item);
}else{
    $api->error('Error al llamar la API');
}


?>