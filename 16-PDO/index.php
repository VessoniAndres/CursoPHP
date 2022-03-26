<?php
    include_once 'includes/survey.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="survey.css">
    <title>Survey</title>
</head>
<body>
    <form action="#" method="post">
        <?php
            //inicializamos la encuesta
            $survey = new Survey();
            //Definimos cuando se mostraran los resultados. Con una variable booleana.
            $showResult = false;
            //Si se ejecuta el metodo post pasara lo siguiente:
            if(isset($_POST['language'])){
                //Si se envia una respuesta, que se muestren los resultados
                $showResult = true;
                //Que se setée cual es la opcion seleccionada
                $survey->setOptionSelected($_POST['language']);
                //Que se realice la votacion en la BD
                $survey->vote();
            }
        ?>
        <h2>Which is your favourite programming language?</h2>
        <?php
            // Si showResults pasa a ser true, mostramos los resultados
            if($showResult){
                //Habiamos definido el metodo que retorna los resultados en survey.php
                $tabla = $survey -> showResults();
                //Muestro el total de votos
                echo '<h2> Votos totales: ' . $survey -> getTotalVotes() . '</h2><br>';

                //Recorro todos los resultados de cada uno de los campos
                foreach($tabla as $renglon){
                    $porcentaje = $survey -> getPercentageVotes($renglon['votes']);
                    include 'results.php';
                }
            }else{
                include 'form.php';
            }
        ?>
    </form>
</body>
</html>