<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions</title>
    <style>
        body{background-color: #5492d1; font-family: Arial;}
        #container{ background-color: #fff; padding: 10px; width: 400px; margin: 150px auto;}
        .errors{color: red}
    </style>
</head>
<body>
    <div class="container">
        <h2>Multiplications</h2>
        <form action="" method="POST">
            <input type="text" name="number1">
            <input type="text" name="number2">
            <input type="submit" value="Calculate">
        </form>
        <?php
            include("operations.php");
            validateFields();
        ?>
    </div>
</body>
</html>