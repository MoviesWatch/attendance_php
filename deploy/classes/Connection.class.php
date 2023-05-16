<?php

class Connection
{
    public static $connection;

    public function __construct(
        $database,
    ) {
        // try {
        self::$connection = new PDO(
            "mysql:host=".Database::$host.";dbname=".$database.";charset=UTF8",
            Database::$user,
            Database::$password
        );
        // } catch (PDOException $e) {
        //     //roll back
        //     switch ($e->getCode()) {
        //         case 1045:
        //             echo json_encode(CustomException::internalConnectionError());
        //             exit();
        //         case 1049:
        //             echo json_encode(CustomException::invalidAcademicSemester());
        //             exit();
        //     }
        //     exit();
        // }
    }

    public static function makeQuery($class, $query, $values = [])
    {
        if (self::$connection === null) {
            new Connection($_SESSION["db"]);
        }
        // try {
        $statement = self::$connection->prepare($query);
        $statement->execute($values);
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        return $statement->fetchAll();
        // } catch (PDOException $e) {
        //     switch ($e->getCode()) {
        //         case "42S02":
        //             echo json_encode(CustomException::tableNotFound());
        //             exit();
        //         case 23000:
        //             echo json_encode(CustomException::dataAlreadyIn());
        //             exit();
        //         default:
        //             echo json_encode(CustomException::internalConnectionError());
        //             exit();
        //     }
        // }
    }

    public function lastInsertedID()
    {
        return self::$connection->lastInsertId();
    }
}
