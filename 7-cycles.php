<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cylces</title>
    <style>
        body{
            background-color: #e85f79;
            text-align: center;
        }
        div{
            width: 200px;
            height: 200px;
            background-color: red;
            margin: 10px;
            display: inline-block;
        }
    </style>
</head>
<body> 
    <?php
        for($i = 0; $i < 10; $i++){
    ?>
        <img src="imagen.jpg" alt="">
    <?php
        }
    ?>
    <?php
        while(rand(1,10) != 5){
    ?>
        <div></div>
    <?php
        }
    ?>
</body>
</html>