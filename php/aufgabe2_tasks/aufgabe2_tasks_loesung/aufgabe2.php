<?php

require "tasks.php";

function print_task($taskArray) {
    echo "<tr>";
    echo "<td>" . $taskArray['id'] . "</td>";
    echo "<td>" . $taskArray['user'] . "</td>";
    echo "<td>" . $taskArray['status'] . "</td>";
    echo "<td>" . $taskArray['title'] . "</td>";
    echo "<td>" . $taskArray['description'] . "</td>";
    echo "<td>" . $taskArray['duedate'] . "</td>";
    echo "</tr>";
}

/**
 * berechnet den linux timestamp eines datums, das im definierten date_format ist.
 * @param $duedate das datum als string
 * @param string $date_format das datums format, in dem das duedate definiert ist
 * @return int
 */
function getTimestamp($duedate, $date_format = 'Y-m-d') {
    // ein statischer, objektorientierter Aufruf (haben wir noch nicht behandelt...)
    return DateTime::createFromFormat($date_format, $duedate)->getTimestamp();
}




echo "<h1>Fällige Tasks</h1>";
echo "<table cellpadding='5' cellspacing='5'>";
echo "<tr><th>ID</th><th>User</th><th>Status</th><th>Title</th><th>Description</th><th>Due Date</th></tr>";

foreach ($tasks as $task) {

    $task_timestamp = getTimestamp($task['duedate']);
    //echo "current time --> " . time() . '<br>';
    //echo $task['duedate'] . " --> $task_timestamp <br>";

    //task nur ausgeben wenn er fällig ist.
    $taskFaellig = $task_timestamp < time() && $task['status'] != 'done';
    if($taskFaellig){
        print_task($task);
    }

}

echo "</table>";
