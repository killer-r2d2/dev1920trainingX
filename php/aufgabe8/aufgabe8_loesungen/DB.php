<?php

class DB
{
    /**
     * @var PDO die statisch gespeicherte PDO verbindung.
     */
    private static $connection;

    /**
     * Die $connection wird sogenannt "lazy" initialisiert
     * @return PDO eine offene PDO Datenbank-Verbindung
     */
    public static function get()
    {

        //im ersten Durchgang ist $connection noch null. Also wird initialisiert
        if (!isset(DB::$connection)) {

            // echo 'DB::$connection ist noch nicht gesetzt...<br>';

            $servername = "localhost";
            $db_name = "TODO_APP";
            $username = "root";
            $password = "mysql";

            try {
                //das Resultat der Initialisierung wird hier in die statische Variable gespeichert
                DB::$connection = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);
                // set the PDO error mode to exception
                DB::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //echo 'Connection successfull<br>';

            } catch (PDOException $e) {
                die ("Connection failed: " . $e->getMessage());
            }
        }

        return DB::$connection;
    }
}

