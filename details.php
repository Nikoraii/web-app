<?php

require_once __DIR__ . '/tables/Product.php';
$url = $_GET['url'];
$url_join = str_replace(' ', '+', $url);
$product = Product::getByUrl($url_join);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Product Details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col ml-5"><h3><a href="index.php">Home <i class="fa fa-home" aria-hidden="true"></i></a></h3></div>
            <div class="col mr-5"><h3 style="float: right"><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></h3></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <small><?= $product[0]->id ?></small>
                <h1><?= $product[0]->name ?></h1>
                <h6><?= $product[0]->category . " -> " . $product[0]->subcategory ?></h6>
                <p><?= $product[0]->description ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><?= $product[0]->features ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php if (!empty($product[0]->images0)) { ?>
                    <img src="<?= $product[0]->images0 ?>" alt="" class="rounded p-2">
                <?php } ?>
            </div>
            <div class="col">
                <?php if (!empty($product[0]->images1)) { ?>
                    <img src="<?= $product[0]->images1 ?>" alt="" class="rounded p-2">
                <?php } ?>
            </div>
            <div class="col">
                <?php if (!empty($product[0]->images2)) { ?>
                    <img src="<?= $product[0]->images2 ?>" alt="" class="rounded p-2">
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4><?= $product[0]->price ?> - <a href="modules/add_to_cart.php?id=<?= $product[0]->id ?>">Add to Cart</a></h4>
            </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>