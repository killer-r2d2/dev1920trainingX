<?php

//hier machen wir das gleiche wie in der standard aufgabe.
require "aufgabe3.php";

//zusätzlich schauen wir nochmal, ob jemand eingeloggt ist
if (isset($_SESSION['username'])) {
    //zeige die Ausgabe der Aufgabe 1 .
    require "../aufgabe1_tasks/aufgabe1.php";
}