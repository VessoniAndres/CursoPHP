<?php
    include_once 'includes/survey.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
</head>
<body>
    <form action="#" method="post">
        <?php
            $survey = new Survey();
            if(isset($_POST['language'])){
                $survey->setOptionSelected($_POST['language']);
                $survey->vote();
            }
        ?>
        <h2>Which is your favourite programming language?</h2>
        <input type="radio" name="language" id="" value="c">C<br>
        <input type="radio" name="language" id="" value="c++">C++<br>
        <input type="radio" name="language" id="" value="c#">C#<br>
        <input type="radio" name="language" id="" value="java">Java<br>
        <input type="radio" name="language" id="" value="Javascripy">Javascripy<br>
        <input type="radio" name="language" id="" value="python">Python<br>

        <input type="submit" value="Vote">
    </form>
</body>
</html>