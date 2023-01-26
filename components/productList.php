<?php

require __DIR__ . '/../vendor/autoload.php';

use MyApp\Database\ProductsRepo;

$productsRepo = new ProductsRepo();

$products = $productsRepo->getProducts();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['delete'])) {
        $selectedIds = $_POST['delete'];
        $productsRepo->deleteProduct($selectedIds);
        header("Location: /");
    }
}
