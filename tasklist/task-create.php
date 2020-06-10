
<?php

require_once "init.php";

?>


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

    <title>Task list</title>
</head>
<body>

<div class='wrapper'>

    <div class='title'><h1>Create Task</h1></div>

    <form class="editForm" action="task-create.php" method="POST">
                <label class="labelTitel">Title: </label>
                <input type="text" name="title" id="">
                <br>
                <label class="labelTitel">Description: </label>
                <input type="text" name="description" id="">
                <br>
                <label class="labelTitel">duration</label>
                <input type="text" name="duration" id="">
                <br>
                <label class="labelTitel">Duedate: </label>
                <input type="text" name="duedate" id="">
                <br>
                <button class="changeBtn" type="submit" name="submit">Create</button>
                <a class='editLink' href='task-list.php'>Back to Todo list</a>
    </form>

</div>



        <?php
        $taskLoader = new TaskLoader();

        if (isset($_POST['submit'])) {


            $userId = 3;
            $statusId = 1;
            $title = $_POST['title'];
            $description = $_POST['description'];
            $duration = $_POST['duration'];
            $duedate = $_POST['duedate'];


            //insert tasks
            $tasks = $taskLoader->setTask($userId, $statusId, $title, $description, $duration, $duedate);

            //  success??;
            redirect('task-list.php');


        }
        ?>


</body>
</html>
