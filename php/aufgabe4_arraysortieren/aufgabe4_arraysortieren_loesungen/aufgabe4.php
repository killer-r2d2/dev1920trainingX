<?php

/**
 * Hilfsfunktion, um einen array schön auszugeben.
 * @param $array array, den man ausgeben will.
 */
function print_array($array)
{
    echo '<pre>' . print_r($array, true) . '</pre>';
}

$array1 = array("eins", "zwei", "drei", "vier");
echo "<h1>1. Original</h1>";
print_array($array1);


echo "<h1>1. Indiziert, absteigend</h1>";
rsort($array1);
print_array($array1);


$array2 = array(
    "d" => "Zitrone",
    "a" => "Orange",
    "b" => "Banane",
    "c" => "Apfel"
);
echo "<h1>2. Original</h1>";
print_array($array2);


echo "<h1>2a. Assoziativ, aufsteigend nach key</h1>";
ksort($array2);
print_array($array2);


echo "<h1>2b. Assoziativ, absteigend nach value</h1>";
arsort($array2);
print_array($array2);





echo "<h1>3. Tasks Original</h1>";
require "tasks.php";
print_array($tasks);

echo "<h1>3a. Tasks sortiert nach duedate</h1>";
usort($tasks, "sort_tasks_by_duedate");
print_array($tasks);


echo "<h1>3b. Tasks sortiert nach status</h1>";
usort($tasks, "sort_tasks_by_status");
print_array($tasks);


/**
 * HIER KOMMEN DIE SORTIER-FUNKTIONEN
 */


/**
 * Vergleichsfunktion für task arrays.
 * Sortiert nach status.
 *
 * Es werden für beide status eine nummer berechnet (siehe get_task_status_number). Dann wird die Differenz zurückgegeben.
 * Das führt dazu, dass entweder eine negative zahl, null, oder eine positive zahl zurückgegeben wird
 */
function sort_tasks_by_status($task1, $task2)
{
    $status1 = $task1['status']; //open, in_progress, done, ...
    $status2 = $task2['status']; //open, in_progress, done, ...

    $status1_number = get_task_status_number($status1); //z.B. 1
    $status2_number = get_task_status_number($status2); //z.B. 4

    return $status1_number - $status2_number; //z.B. -3
}

/**
 * gibt für alle möglichen status eine nummer zurück, um dann nach dieser nummer zu sortieren.
 */
function get_task_status_number($status)
{
    $status_numbers = array(
        'on_hold' => 0,
        'open' => 1,
        'in_progress' => 2,
        'in_review' => 3,
        'done' => 4,
    );

    return $status_numbers[$status];
}

/**
 * Vergleichsfunktion für task arrays.
 * Sortiert nach duedate.
 *
 * Es werden für beide duedates die unix timestamps berechnet. Dann wird die Differenz zurückgegeben.
 * Das führt dazu, dass entweder eine negative zahl, 0, oder eine positive zahl zurückgegeben wird
 */
function sort_tasks_by_duedate($task1, $task2)
{
    $duedate1 = $task1['duedate'];
    $duedate2 = $task2['duedate'];

    $timestamp1 = getTimestamp($duedate1);
    $timestamp2 = getTimestamp($duedate2);

    return $timestamp1 - $timestamp2;
}

/**
 * berechnet den linux timestamp eines datums, das im definierten date_format ist.
 * @param $duedate das datum als string
 * @param string $date_format das datums format, in dem das duedate definiert ist
 * @return int
 */
function getTimestamp($duedate, $date_format = 'Y-m-d')
{
    // ein objektorientierter Aufruf, den wir noch lernen werden.
    return DateTime::createFromFormat($date_format, $duedate)->getTimestamp();
}
