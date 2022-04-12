<?php

class Errors extends Controller{
    function __construct()
    {
        parent::__construct();
        //Por aqui pasamos el mensaje de error que va a pasar la vista
        $this->view->message='Error al cargar un recurso';
        //Y aqui la renderizamos,
        $this->view->render('error/index');
    }
}

?>