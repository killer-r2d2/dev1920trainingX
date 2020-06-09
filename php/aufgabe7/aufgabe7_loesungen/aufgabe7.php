<?php

$servername = "localhost";
$db_name = "TODO_APP";
$username = "root";
$password = "mysql";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully <br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$statement = $conn->query("SELECT * FROM task LIMIT 100");  // HIER: LIMIT 100
$all = $statement->fetchAll();

foreach ($all as $row) {
    $id = $row['id'];
    $duedate = $row['duedate'];
    $title = $row['title'];
    echo "Task $id: $duedate, $title <br>";
    //var_dump($row);
}

