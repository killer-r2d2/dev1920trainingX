<?php

require_once("../DB.php");

DB::get();
DB::get();
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS);


$statement = DB::get()->query("SELECT * FROM task LIMIT 100");
$all = $statement->fetchAll();
foreach ($all as $row) {
    $id = $row['id'];
    $title = $row['title'];
    echo "Task : $id, $title <br>";
// var_dump($row);
}

?>