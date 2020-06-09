<?php

require_once "../DB.php";
require_once "TaskLoader.php";


/**
 * Hilfsfunktion, um einen array schön auszugeben.
 * @param $array array, den man ausgeben will.
 */
function print_array($array)
{
    echo '<pre>' . print_r($array, true) . '</pre>';
}


echo "<h1>TaskLoader</h1>";


$taskLoader = new TaskLoader();

echo "<h2>getOneById(1)</h2>";
print_array($taskLoader->getOneById(1));

echo "<h2>getOneById(-1)</h2>";
print_array($taskLoader->getOneById(-1));

echo "<h2>getAll()</h2>";
print_array($taskLoader->getAll());

