<?php

class View{
    function __construct()
    {
        echo '<p>Vista base</p>';
    }
    function render($name){
        require 'views/' . $name . '.php';
        // Como lo que hay dentro de esta carpeta es un index. entonces lo va a abrir
    }
}


?>