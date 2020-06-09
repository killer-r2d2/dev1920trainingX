<?php

// Aufgabe 4 Punkt 1

// $array1 = ['eins', 'zwei', 'drei', 'vier'];

// rsort($array1);
// print_r($array1);


// Aufgabe 4 Punkt 2

// $array2 = array("d" => "Zitrone", "a" => "Orange", "b" => "Banane","c" => "Apfel");
// // ksort($array2);
// // print_r($array2);

// krsort($array2);
// print_r($array2);

// Aufgabe 4 Punkt 3
$tasks = [
    
    ['id'=>'1','user'=>'Stefan','status'=>'open','todo'=>'Wohnung drei Minuten lang waschen','duedate'=>'2017-05-15'],
    ['id'=>'2','user'=>'Beda','status'=>'done','todo'=>'Keller sechs Stunden lang putzen','duedate'=>'2018-05-15'],
    ['id'=>'3','user'=>'Manuela','status'=>'in_progress','todo'=>'Küche sechs Stunden lang polieren','duedate'=>'2020-05-15'],
    ['id'=>'4','user'=>'Ramona','status'=>'done','todo'=>'Auto fünf Sekunden lang aufräumen','duedate'=>'2014-05-15'],
    
];




$array = array(3, 4, 2, 5, 6, 1);

function compare($a, $b) {
    // 5 immer zu oberst (am kleinsten)
    if ($a['duedate'] < $b['duedate']) {
    return -1;
    } elseif ($b['duedate'] == 5) {
    return 1;
    } else {
    return $a - $b;
    }
    }


    usort($tasks, "compare");
    print_r($tasks);

    function getTimestamp($date_string, $date_format = 'Y-m-d') {
        return DateTime::createFromFormat($date_format, $date_string)->getTimestamp();
        }

?>