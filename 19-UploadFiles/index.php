<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploading files</title>  
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h2>Upload File</h2>
        <input type="file" name="file">
        <p class="center"><input type="submit" value="Upload!"></p>
    </form>
</body>
</html>