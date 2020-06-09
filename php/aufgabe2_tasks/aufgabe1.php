<?php 

include 'tasks.php'; 


foreach ($tasks as $task) {
    print_task($task);
}

function print_task($taskArray) {
    echo $taskArray['id'].'<br>';
    echo $taskArray['user'].'<br>';
    echo $taskArray['status'].'<br>';
    echo $taskArray['todo'].'<br>';
    echo $taskArray['duedate'].'<br>';
}


function getTimestamp($date_string, $date_format = 'Y-m-d') {
    return DateTime::createFromFormat($date_format, $date_string)->getTimestamp();
    }

getTimestamp('2020-05-01');

?>