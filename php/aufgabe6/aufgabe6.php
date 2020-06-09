<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

class User {

    private $name;
    private $created;

    public function __construct() {
        $this->created = time();
    }
    public function getname() {
        return $this->name;
        }
    public function setname($name) {
        $this->name = $name;
        }

    public function getInformation() {
        $zeit = date('d.m.Y. H:i', $this->created);
        return "der Benutzer $this->name wurde erstellt am: $zeit";
    }

}

$user = new User();
$user->setName("Roger");
echo $user->getInformation();


?>

    
</body>
</html>
