<?php

require_once "DB.php";

//nur beim ersten mal wird die Verbindung hergestellt
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";


$statement = DB::get()->query("SELECT * FROM task LIMIT 100");  // HIER: LIMIT 100
$all = $statement->fetchAll();


foreach ($all as $row) {
    $id = $row['id'];
    $duedate = $row['duedate'];
    $title = $row['title'];
    echo "Task $id: $duedate, $title <br>";
    //var_dump($row);
}
