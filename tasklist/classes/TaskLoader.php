<?php



class TaskLoader
{

    public function getAll()
    {
        $statement = DB::get()->prepare("SELECT * FROM task ORDER BY id DESC LIMIT 10");
        $statement->execute([]);
        $data = $statement->fetchAll();
        return $data;
    }

    public function getOneById($id)
    {
        $statement = DB::get()->prepare("SELECT * FROM task WHERE id = :id");
        $statement->execute([':id' => $id]);
        $data = $statement->fetchAll();
        if (empty($data)) {
            return null;
        } else {
            return $data[0];
        }
    }


    public function updateTask($id, $userId, $statusId, $title, $description, $duration, $duedate)
    {

        $statement = DB::get()->prepare("UPDATE task SET user_id= :userid, status_id= :statusid, title= :title,
        description= :description, duration= :duration, duedate= :duedate WHERE id = :id");
        $statement->execute(array(':userid' => $userId, ':statusid' => $statusId, ':title' => $title,
                ':description' => $description, ':duration' => $duration, ':duedate' => $duedate, ':id' => $id)
        );

    }


    public function setTask($userId, $statusId, $title, $description, $duration, $duedate)
    {
        $statement = DB::get()->prepare("
            INSERT INTO task ( user_id, status_id, title, description, duration, duedate)
            VALUES ( :user_id, :status_id, :title , :description , :duration, :duedate );
        ");
        $statement->execute(array(':user_id' => $userId, ':status_id' => $statusId,
                ':title' => $title, ':description' => $description, ':duration' => $duration, ':duedate' => $duedate)
        );
    }

    public function deleteTask($id){
        //prepared statement
        $statement = DB::get()->prepare("DELETE FROM task WHERE id = :id");
        $result = $statement -> execute(array(':id' => $id));
        if ($result){
            return $result;
        }
        throw new Exception("konnte nicht löschen!");
    }
}
