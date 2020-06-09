<?php


function my_autoload($class_name)
{
    $file = 'classes/'.$class_name.'.php';
    require_once($file);
}
spl_autoload_register('my_autoload');

echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS);

print_r(new XY());

?>