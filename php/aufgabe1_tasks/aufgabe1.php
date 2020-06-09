<?php 

include 'tasks.php'; 


foreach ($tasks as $task) {
    echo $task['id'].'<br>';
    echo $task['user'].'<br>';
    echo $task['status'].'<br>';
    echo $task['todo'].'<br>';
}


?>