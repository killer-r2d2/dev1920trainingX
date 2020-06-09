<?php

//autoload function definieren
function my_autoload($class_name)
{
    echo "<p style='background-color: red'>my_autoload: $class_name </p>";

    $file = "classes/$class_name.php";
    require_once($file);
}

//autoload function registrieren
spl_autoload_register('my_autoload');


//DB klasse wurde bis jetzt nicht includet, sondern wird direkt verwendet
echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS);
echo "<br/>";

//XY klasse wurde bis jetzt nicht includet, sondern wird direkt verwendet
$xy = new XY();
$xy->sayHello();

//name der Klasse heisst nicht gleich wie der Dateiname --> fehler
new TestClassName();

//Klasse existiert nicht
new LOL();