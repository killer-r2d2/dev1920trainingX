<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<?php

$servername = "localhost";
$db_name = "TODO_APP";
$username = "root";
$password = "root";


try {
$conn = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
} catch (PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}

$statement = $conn->query("SELECT * FROM task LIMIT 100");
$all = $statement->fetchAll();
foreach ($all as $row) {
    $id = $row['id'];
    $title = $row['title'];
    echo "Task : $id, $title <br>";
// var_dump($row);
}

?>

    
</body>
</html>