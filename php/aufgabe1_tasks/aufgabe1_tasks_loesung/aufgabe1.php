<?php

echo "<h1>Tasks</h1>";
echo "<table cellpadding='5' cellspacing='5'>";
echo "<tr><th>ID</th><th>User</th><th>Status</th><th>Title</th><th>Description</th><th>Due Date</th></tr>";


require "tasks.php";

foreach ($tasks as $task) {

    echo "<tr>";

    echo "<td>" . $task['id'] . "</td>";
    echo "<td>" . $task['user_id'] . "</td>";
    echo "<td>" . $task['status_id'] . "</td>";
    echo "<td>" . $task['title'] . "</td>";
    echo "<td>" . $task['description'] . "</td>";
    echo "<td>" . $task['duedate'] . "</td>";

    echo "</tr>";

}

echo "</table>";
