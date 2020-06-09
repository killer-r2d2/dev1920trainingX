<?php

class todo {

    private $title;
    public function __construct($task_title) {
        echo $title;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $¨this->title = $title;
    }
    public function erledigen() {
        return "Task $this->title ist erledigt";
    }
}

$task = new Task ('Pause machen');
echo $task->erledigen();


?> 