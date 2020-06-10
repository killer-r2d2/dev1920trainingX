<?php
//init
require_once("init.php");
//taskloader holen
$taskLoader = new TaskLoader();
//task id auslesen
//funktion delete
try{
    $onetask = $taskLoader->deleteTask($_GET["id"]);
    $_SESSION['message'] = "Der Task mit der id {$_GET["id"]} wurde gelöscht";
} catch (Exception $e){
    echo $e->getMessage();
    die();
}
//redirect
redirect('task-list.php');
?>