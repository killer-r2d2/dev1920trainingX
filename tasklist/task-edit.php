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
?>



<?php



$taskLoader = new TaskLoader();

if (isset($_POST['submit'])) {


    $userId = 3;
    $statusId = 1;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $duedate = $_POST['duedate'];
    $taskId = $_POST['id'];


    //  update task
    $taskLoader->updateTask($taskId, $userId, $statusId, $title, $description, $duration, $duedate);


    redirect('task-list.php');


}



$taskID = $_GET['id'];

$taskDetails = new TaskLoader();
$taskInhalt = $taskDetails->getOneById($taskID);



?>
    <div class='wrapper'>
        
        <div class='title'><h1>Edit Task</h1></div>    
        
        <form class="editForm" action='task-edit.php' method='POST'>
            <label class="labelTitel">Title: </label>
            <input type='text' name='title' value='<?= $taskInhalt['title'];?>'>
            <br>
            <label class="labelTitel">Description: </label>
            <input type='text' name='description' value='<?= $taskInhalt['description'];?>'>
            <br>
            <label class="labelTitel">duration</label>
            <input type='text' name='duration' value='<?= $taskInhalt['duration'];?>'>
            <br>
            <label class="labelTitel">Duedate: </label>
            <input type='text' name='duedate' value='<?= $taskInhalt['duedate'];?>'>
            <br>
            <input type='hidden' name='id' value='<?= $taskInhalt['id'];?>'>
            <button class="changeBtn" type='submit' name='submit'>change information</button>
            <a class='editLink' href='task-list.php'>Back to Todo list</a>
        </form>
        

    </div>

</body>
</html>









