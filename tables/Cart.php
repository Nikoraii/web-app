<?php

require_once __DIR__ . '/Table.php';

class Cart extends Table {
    public $id;

    public static function fullCart()
    {
        $db = Database::getInstance();

        $query = 'SELECT * FROM carts';

        return $db->select('Cart', $query);
    }

    public static function addToCart($id)
    {
        $db = Database::getInstance();

        $query = 'INSERT INTO carts (product_id) VALUES(:pid)';

        $params = [
            ':pid' => $id
        ];

        return $db->insert('Cart', $query, $params);
    }

    public static function removeFromCart($id)
    {
        $db = Database::getInstance();

        $query = 'DELETE FROM carts WHERE product_id = :pid';

        $params = [
            ':pid' => $id
        ];

        $db->delete($query, $params);
    }

    public static function pay()
    {
        $db = Database::getInstance();

        $query = 'DELETE FROM carts';

        $db->delete($query);
    }
}