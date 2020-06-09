<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9fd733068b.js" crossorigin="anonymous"></script>

    <title>Task details</title>
</head>
<body>





<?php

    require_once 'init.php';

    $taskID = $_GET['id'];

    $taskDetails = new TaskLoader();
    $taskContents = $taskDetails->getOneById($taskID);
    echo "<div class='wrapper'>
    
    
    
        <div class='title'><h1>Task details</h1></div>
    
        <div class='container'>
            <p><strong>Folgende Arbeiten sind zu erledigen:</strong></p>
            <p>{$taskContents['title']}</p>
            <p><strong>Description:</strong></p>
            <p>{$taskContents['description']}</p>
            <p><strong>Task ID:</strong></p>
            <p>{$taskContents['id']}</p>
            <p><strong>Duedate:</strong></p>
            <p>{$taskContents['duedate']}</p>
        </div>
    
        <br><a class='editLink' href='task-edit.php?id=$taskID'>Edit Task</a>
        <br><a class='editLink' href='task-list.php'>Back to Todo list</a>

    
    </div>";


?>




</body>
</html>







