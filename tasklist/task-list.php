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


<div class="wrapper">

    <div class="title"><h1>Mega Todo list</h1></div>


    <a class="container container--addTask" href="task-create.php">addTask <i class="fas fa-plus-circle"></i></a>

<?php

    $taskLoader = new TaskLoader();
    $tasks = $taskLoader->getAll();
    foreach ($tasks as $task) {
        $id = $task["id"];
        $title = $task["title"];
        $duedate = $task["duedate"];
        $description = $task["description"];


    ?>

        <div class="container"><p><strong>Folgende Arbeiten sind zu erledigen:</strong><?=$title?><p><br>
            <div class="infoTrashBox">
                <a href="task-details.php?id=<?=$id?>"<i class="fas fa-info-circle"></i><a/>
                <a onclick="return confirm('wirklich Task mit id <?= $id ?> löschen?')"
                href="delete-task.php?id=<?= $id ?>"<i class="far fa-trash-alt"></i><a/>
            </div>
        </div>

    <?php

    }
?>





    <!--message anzeigen-->
    <?php
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>



</div>




</body>
</html>


