<?php

require_once __DIR__ . '/../tables/Cart.php';
Cart::pay();

header('Location: ' . $_SERVER['HTTP_REFERER']);
