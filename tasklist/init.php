<?php
//started die session funktionalität. muss zu oberst sein
session_start();


function my_autoload($class_name) {

    $file = 'classes/'.$class_name.'.php';
    require_once($file);
}
spl_autoload_register('my_autoload');




//output buffering: html erst am schluss senden. Ermöglicht senden von headers irgendwo im code
ob_start();

function redirect($url = "", $exit = true)
{
    header("Location: $url");
    if ($exit) {
        exit;
    }
}



/** Funktion die einen Array schön darstellt */
function print_array($array)
{
    echo '<pre>' . print_r($array, true) . '</pre>';
}

?>

