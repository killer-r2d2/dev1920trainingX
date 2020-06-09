<?php

class DB
{
    private static $connection;

    /**
     * Die $connection wird sogenannt "lazy" initialisiert
     * @return PDO eine offene PDO Datenbank-Verbindung
     */
    public static function get()
    {

        //im ersten Durchgang ist $connection noch null. Also wird initialisiert
        if (DB::$connection == null) {
            $servername = "localhost";
            $db_name = "TODO_APP";
            $username = "root";
            $password = "mysql";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //das Resultat der Initialisierung wird hier in die statische Variable gespeichert
                DB::$connection = $conn;
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        return DB::$connection;
    }
}

