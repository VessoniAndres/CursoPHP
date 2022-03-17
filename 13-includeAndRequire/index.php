<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Include and require.</title>
    <style>
        #container{width: 500px; margin: 500 auto;}
        #footer{background-color: #222; padding: 10px; color: wheat;}
        #menu{background-color: #eee; padding: 10px}

    </style>
</head>
<body>
    <div class="container">
        <?php
            include("menu.php");
        ?>
        <h3>Main content</h3>
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>