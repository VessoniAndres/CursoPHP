<?php

include_once 'includes/user.php';
include_once 'includes/userSession.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //Esto va a ocurrir cuando cerramos el navegador y no serramos sesion.
    $user->setUser($userSession->getCurrentUser());
    include_once 'views/home.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //Si algien está intentando hacer un loguin con el form, vamos a validarlo.
    
    if($user->userExist($_POST['username'],$_POST['pass'])){
        //Si el usuario y la contraseñas no son correctos
        echo $user->userExist($_POST['username'],$_POST['pass']);
        echo $_POST['username'];
        echo $_POST['password'];
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'views/home.php';
    }else{
        //Si el usuario o la contraseña son incorrectos
        $errorLogin = "Nombre de usuario y/o contraseña incorrectos";
        include_once 'views/login.php';
    }
}else{
    // cargar pantalla de login(Si no hay una sesion abierta abre esto)
    include_once 'views/login.php';
}

?>