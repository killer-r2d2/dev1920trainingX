<?php

require_once "TaskLoader.php";



$taskLoader = new TaskLoader();

echo "<h2>getOneById(-1)</h2>";
print_array($taskLoader->getOneById(-1));
echo "<h2>getOneById(1)</h2>";
print_array($taskLoader->getOneById(1));
echo "<h2>getAll()</h2>";
print_array($taskLoader->getAll());


/** Funktion die einen Array schön darstellt */
function print_array($array)
{
    echo '<pre>' . print_r($array, true) . '</pre>';
}

?>



