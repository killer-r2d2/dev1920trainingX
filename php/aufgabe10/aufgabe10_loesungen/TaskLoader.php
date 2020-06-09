<?php

class TaskLoader
{

    public function getAll()
    {
        //prepared statement
        $statement = DB::get()->prepare("SELECT * FROM task LIMIT 10"); //TODO remove LIMIT
        $statement->execute();

        //ausführen mit PDO::FETCH_ASSOC
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getOneById($id)
    {
        //prepared statement
        $statement = DB::get()->prepare("SELECT * FROM task WHERE id = :id");

        //ausführen mit PDO::FETCH_ASSOC
        $statement->execute(array(':id' => $id));
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($data)) {
            return null;
        } else {
            return $data[0];
        }
    }

}