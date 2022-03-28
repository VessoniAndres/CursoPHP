<?php

include_once 'db.php';
class User extends DB{
    //properties
    private $name;
    private $username;
    //methods
    public function userExist($user, $pass){
        // $md5pass = md5($pass);
        echo 'asd';
        $query = $this->connect()->prepare('SELECT * FROM usuarios3 WHERE usuario= :user AND contra= :pass');
        echo 'dsa';
        $query->execute(['user' =>$user, 'pass' =>$pass]);
        echo $query->rowCount();
        return $query->rowCount();
        //AND  'user' => $user] password = :pass
        // if($query->rowCount()){
        //     return true;
        // }else{
        //     return false;
        // }
    }
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE usuario=:user');
        $query->execute(['user'=>$user]);
        foreach($query as $currentUser){
            $this->name = $currentUser['nombre'];
            $this->username = $currentUser['usuario'];
        }
    }
    public function getName(){
        return $this->name;
    }
}

?>