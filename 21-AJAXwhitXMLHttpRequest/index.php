<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro Ajax With XmlHttpRequest</title>
</head>
<body>
    <div class="main-container">
        <form action="" id="newTodo" mathod="POST">
            <p> 
                To Do: <br>
            <input type="text" name="todo" id="todo">
        </p>
        <p>
            <input type="button" id="send" value="Add Todo">
            <button id="test">test</button>
        </p>
        </form>
        <div id="showTodoContainer"></div>
    </div>
    <script src="index.js"></script>
    <script>loadTodos();</script>
</body>
</html>