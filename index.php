<?php

require_once __DIR__ . '/tables/Product.php';
$products = Product::allProducts();
$categories = Product::categories();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css">
  </head>
  <body>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-11">
                <form method="post">
                    <input type="text" name="name" id="name" placeholder="Product name..." class="form-control-sm">
                    <select name="category" id="category" class="form-control-sm">
                        <option value="" selected></option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category->category ?>"><?= $category->category ?></option>
                        <?php } ?>
                    </select>
                    <select name="sort" id="sort" class="form-control-sm">
                        <option value="asc" selected>ASC</option>
                        <option value="desc">DESC</option>
                    </select>
                    <input type="submit" name="filter" value="Filter" class="form-control-sm btn btn-primary">
                    <a href="http://localhost/web-app/" class="form-control-sm btn btn-secondary">Reset</a>
                    <?php
                    if (isset($_POST['filter'])) {
                        $filtered = [];
                        if (!empty($_POST['name'])) {
                            $name = $_POST['name'];
                            $filtered += Product::filterByName($name);
                        }
                        if (!empty($_POST['category'])) {
                            $category = $_POST['category'];
                            $filtered_C = Product::filterByCategory($category);
                            $filtered += $filtered_C;
                        }

                        if (!empty($filtered)) {
                            $filtered_UQ = array_unique($filtered, SORT_REGULAR);
                            $products = $filtered_UQ;
                        }

                        $sort = $_POST['sort'];
                        if ($sort == 'asc') {
                            usort($products, function ($a, $b) {
                                return $a->price <=> $b->price;
                            });
                        } else {
                            usort($products, function ($a, $b) {
                                return $b->price <=> $a->price;
                            });
                        }
                    }

                    ?>
                </form>
            </div>
            <div class="col-1">
                <h3><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Add</th>
                </tr>
                <?php ?>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td scope="row"><a href="details.php?url=<?= $product->url?>"><?= $product->name ?></a></td>
                        <td><?= $product->category ?></td>
                        <td><?= $product->description ?></td>
                        <td><?= $product->price ?></td>
                        <td><a href="modules/add_to_cart.php?id=<?= $product->id ?>">Add</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>