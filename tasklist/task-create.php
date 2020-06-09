
<?php

require_once "init.php";

?>

            <form action="task-create.php" method="POST">
                <label>Title: </label>
                <input type="text" name="title" id="">
                <br>
                <label>Description: </label>
                <input type="text" name="description" id="">
                <br>
                <label>duration</label>
                <input type="text" name="duration" id="">
                <br>
                <label>Duedate: </label>
                <input type="text" name="duedate" id="">
                <br>
                <button type="submit" name="submit">Create</button>
            </form>



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


