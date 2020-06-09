<?php

//started die sesstion funktionalität. muss zu oberst sein
session_start();


//nimmt den login entgegen und speichert diesen in der session
//detail: Hier wird auf empty überprüft, wenn also einfach ?username= steht, ist das kein gültiger login, sonder löscht den letzten benutzer
if (isset($_GET['username'])) {
    $_SESSION['username'] = $_GET['username'];
}


//wenn jemand bereits in der session gespeichert ist, sagen wir hallo. sonst nicht
if (isset($_SESSION['username'])) {
    echo "Hallo " . $_SESSION['username'];
} else {
    echo "Es ist niemand eingeloggt";
}



?>
