<?php

class Task
{
    /**
     * Klassenvariable
     * @var string $title
     */
    private $title;

    /**
     * Task constructor.
     * @param $title
     */
    public function __construct($task_title)
    {
        $this->title = $task_title;
    }

    /**
     * @return string the task title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function erledigen()
    {
        return "Task ' $this->title ' ist erledigt. <br>";
    }

}


$task = new Task('Pause machen');
echo $task->erledigen();

//titel überschreiben
$task->setTitle("JETZT Pause machen");
echo $task->erledigen();

//getter verwenden
echo "Nur der Titel: " . $task->getTitle();

echo "<br>";
//debug output
var_dump($task);