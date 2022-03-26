<?php
include_once 'db.php';
class Survey extends DB{

    private $totalVotes;
    private $optionSelected;
// Funciones para votar
    // Esta funcion va a tomar el lenguaje seleccionado y va a establecer que la oction seleccionada es esa.
    public function setOptionSelected($option){
        $this->optionSelected = $option;
    }
    // Esta funcion se va a usar para obtener el valor del voto seleccionado.
    public function getOptionSelected(){
        return $this->optionSelected;
    }
    // Esta funcion se va a ejecutar para comunicarle a la BD que se voto por la opcion seleccionada.
    public function vote(){
        $query = $this->connect()->prepare('UPDATE favourite_programing_language SET votes = votes + 1 WHERE lenguage=:otion');
        $query -> execute(['otion'=>$this->optionSelected]);
    }
// Funciones para mostrar como va la votacion.
    // Esta funcion va a mostrar todos los datos de la tabla.
    public function showResults(){
        return $this->connect()->query('SELECT * FROM favourite_programing_language');
    }
    // 
    public function getTotalVotes(){
        $query = $this->connect()->query('SELECT SUM(votes) AS votos_totales FROM favourite_programing_language');
        $this->totalVotes = $query->fetch(PDO::FETCH_OBJ)->votos_totales;
        // print_r($query);
        // print_r($this->totalVotes);
        return $this->totalVotes;
    }
    public function getPercentageVotes($votes){
        return round(($votes/$this -> totalVotes)*100,1);
    }

}
?>

