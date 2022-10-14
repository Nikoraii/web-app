<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';

class Table
{
    public static function getById($id, $table, $class_name)
    {
        $db = Database::getInstance();

        $query = "SELECT * FROM $table WHERE id = :id";

        $params = [
            ':id' => $id
        ];

        $records = $db->select($class_name, $query, $params);
        foreach ($records as $record) {
            return $record;
        }
        return null;
    }
}
