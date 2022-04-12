<?php

class App{
    function __construct()
    {
        echo "<p>NuevaApp</p>";
        $URL = $_GET['url'];
        //Quito las / de mas que haya
        $URL = rtrim($URL,'/');
        //Uso las / Para separar la string $URL en diferentes partes de un arreglo
        $URL = explode('/',$URL);
        //Defino la ruta del archivo al que quiero acceder
        $controllerRoute = 'controllers/' . $URL[0] . '.php';
        //verifico que el archivo exista:
        if(file_exists($controllerRoute)){
            //En base a esa ruta importo la el archivo        
            require_once $controllerRoute;
            //Y muestro el contenido
            $controller = new $URL[0];
            //Asi imprimo la clase, pero para lo que viene despues de $URL[0]/xxx...
            if(isset($URL[1])){
                //Asi imprimo los metodos de la clase
                $controller -> {$URL[1]}();
            }
        }else{
            require_once 'controllers/errors.php';
            $controller = new Errors();
        }
    }
}


?>