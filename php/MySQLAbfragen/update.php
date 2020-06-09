<?php

require_once "../DB.php";

$id = 23;
$query = "UPDATE user SET username = 'test@web-professionals.ch' WHERE id = $id;";
$num = DB::get()->exec($query);
if ($num > 0) {
    echo "Erfolgreich Benutzer mit id = $id geändert.";
} else {
    echo "Benutzer nicht gefunden oder keine Änderung notwendig.";
}



?>