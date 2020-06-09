<?php
date_default_timezone_set('Europe/Zurich');


/**
 * Class User for the task list
 */
class User
{
    private $name;
    private $created;


    public function __construct($created = NULL)
    {
        if ($created == NULL) {
            $created = time();
        }
        $this->created = $created;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getInformation()
    {
        $formatted_date = date("d.m.Y H:i:s", $this->created);
        return "Der Benutzer '" . $this->name . "' wurde erstellt am: " . $formatted_date;
    }

}


$user = new User();
$user2 = new User();
$user->setName("Stefan");
echo $user->getInformation();

