<?php

$id = $_GET['id'];

require_once __DIR__ . '/../tables/Cart.php';
Cart::addToCart($id);

header('Location: ' . $_SERVER['HTTP_REFERER']);
