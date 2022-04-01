<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Paginacion</title>
</head>
<body>
    <?php 
        include_once 'movies.php';
        $movies = new Movies(3);
     ?>
    <div id="container">

        <div id="pages">
            <?php $movies -> showPages(); ?>
        </div>

        <div class="movies">
            <?php $movies -> showMovies(); ?>
        </div>
    </div>
    
</body>
</html>