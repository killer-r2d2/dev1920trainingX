<?php

require_once "../DB.php";


class TaskLoader {

    function getAll() {
        $statement = DB::get()->prepare("SELECT * FROM task");
        $statement->execute([]);
        $data = $statement->fetchAll();
        return $data;
    }

    function getOneById($id) {
        $statement = DB::get()->prepare("SELECT * FROM task WHERE id = :id");
        $statement->execute([':id' => $id]);
        $data = $statement->fetchAll();
        If (empty($data)) {
            return null;
        } else {
            return $data[0];
        }
    }


}

?>