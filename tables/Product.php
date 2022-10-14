<?php

require_once __DIR__ . '/Table.php';

class Product extends Table {

    public static function allProducts()
    {
        $db = Database::getInstance();

        $query = 'SELECT * FROM products';

        return $db->select('Product', $query);
    }

    public static function categories()
    {
        $db = Database::getInstance();

        $query = 'SELECT DISTINCT category FROM products';

        return $db->select('Product', $query);
    }

    public static function filterByCategory($category) {
        $db = Database::getInstance();

        $query = 'SELECT * FROM products WHERE category = :c';

        $params = [
            ':c' => $category
        ];

        return $db->select('Product', $query, $params);
    }

    public static function filterByName($name)
    {
        $db = Database::getInstance();

        $query = "SELECT * FROM products WHERE name LIKE '%$name%' OR description LIKE '%$name%'";

        return $db->select('Product', $query);
    }

    public static function getByUrl($url)
    {
        $db = Database::getInstance();

        $query = 'SELECT DISTINCT * FROM products WHERE url = :u';

        $params = [
            ':u' => $url
        ];

        return $db->select('Product', $query, $params);
    }

    // public static function getById($id)
    // {
    //     $db = Database::getInstance();

    //     $query = 'SELECT * FROM products where id = :id';

    //     $params = [
    //         ':id' => $id
    //     ];

    //     return $db->select('Product', $query, $params);
    // }
}
