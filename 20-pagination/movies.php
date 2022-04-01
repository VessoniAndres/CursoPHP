<?php
include_once 'db.php';
class Movies extends DB{

    private $actualPage;
    private $totalPages;
    private $nResults;
    private $resultsPerPage;
    private $index;
    private $error = false;

    function __construct($nPerPage){
        parent::__construct();
        
        $this->resultsPerPage = $nPerPage;
        $this->index = 0;
        $this->actualPage = 1;

        $this->calcPages();
    }
    public function calcPages(){

        $query = $this->connect()->query('SELECT COUNT(*) AS total FROM movie');
        $this->nResults = $query->fetch(PDO::FETCH_OBJ)->total;
        $this->totalPages = ceil($this->nResults / $this->resultsPerPage);
        //Valido que haya un get
        if(isset($_GET['page'])){
//La página sea un numero, que sea mayor o igual a 1, que sea menor o igual que el numero de paginas totales.
            if(is_numeric($_GET['page']) && $_GET['page'] >= 1 && $_GET['page'] <= $this->totalPages){
            $this->actualPage = $_GET['page'];
            $this->index = ($this->actualPage - 1) * $this->resultsPerPage;
            }else{
                //confirma un error.
                echo 'Error 404';
                $this->error = true;
            }
        }
    }
    public function showMovies(){
        if($this->error){
            //Si hubo un error:
            echo 'erroracoro';
        }else{
            //Si no hubo un error: continuamos mostrando la pag.
            $query = $this->connect()->prepare('SELECT * FROM movie LIMIT :pos, :n');
            //LIMIT limita el numero de resultados que queremos que se muestren.
            //recive dos valores, :pos la posicion desde donde queremos que se muestren los resultados
            //y :n la cantidad de valores que se muestren a partir de ahí.
            $query->execute(['pos' => $this->index, 'n' => $this->resultsPerPage]);
            foreach($query as $movie){
                //$movie se usa dentro de moviesView
                include 'moviesView.php';
            }
        }
    }
    public function showPages(){
        //mostrando los enlaces a las paginas:
        $actual = "";
        echo "<ul>";
        //Creando el numero de enlaces en base a la cantidad de peliculas que tenemos
        //y a las cantidad de pelicualas que queremos por pagina.
        for($i = 0; $i < $this->totalPages; $i++){
            if(($i+1) == $this->actualPage){
                $actual = "class='actual'";
            }else{
                $actual = "";
            }
            echo "<li><a " . $actual . " href='#'>" . ($i+1) . "</a></li>";
        }
        echo "</ul>";
    }

}

?>