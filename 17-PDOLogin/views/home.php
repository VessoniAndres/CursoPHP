<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../main.css">
</head>
<body>
    <div id="menu">
        <ul>
            <li>Home</li>
            <li class='logout'>Logout</li>
        </ul>
    </div>
    <section>
        <h1>Welcome <?php echo $user->getName(); ?></h1>
    </section>
</body>
</html>