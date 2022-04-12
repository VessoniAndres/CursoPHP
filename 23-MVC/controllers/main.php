<?php

class main extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('main/index');
    }
    function saludar(){
        echo '<p>aloha</p>';
    }
}


?>