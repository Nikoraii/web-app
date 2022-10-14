<?php

require_once __DIR__ . '/../tables/Product.php';
if (!empty($_POST['category'])) {
    $category = $_POST['category'];
    $filtered = Product::filterByCategory();
}