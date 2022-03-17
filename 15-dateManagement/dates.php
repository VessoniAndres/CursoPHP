<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dates</title>    
    <style>
        body{background-color: #5276af;}
        .container{
            background-color: #fff;
            margin: 100px auto;
            padding: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            $d = date("d");
            switch ($d){
                case 1:
                    echo "Today is ".date("l").", ".date("m")." the first of".date("Y")."<br>";    
                    break;
                case 2:
                    echo "Today is ".date("l").", ".date("m")." the second of".date("Y")."<br>";    
                    break;
                case 3:
                    echo "Today is ".date("l").", ".date("m")." the third of".date("Y")."<br>";    
                    break;
                default:
                    echo "Today is ".date("l").", ".date("m")." the ".$d."th of ".date("Y")."<br>";
                    break;
            }   
            echo "And the time is ".date("h")." : ".date("i")." : ".date("s")." ".date("a");
            echo "<br>Or ".date("h: i:sa");
        ?>
    </div>
</body>
</html>