<?php

require __DIR__ . '/../vendor/autoload.php';

use MyApp\Form\FormController;
use MyApp\Database\ProductsRepo;


$product = $errors = [
    'sku' => '',
    'name' => '',
    'price' => '',
    'size' => '',
    'height' => '',
    'width' => '',
    'length' => '',
    'weight' => '',
];

$type = $_POST['productType'] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $formContr = new FormController();
    $postData = $formContr->sanitizeInput($_POST);
    $formErrors = $formContr->validateForm();

    $product = array_merge($product, $postData);
    $errors = array_merge($errors, $formErrors);

    if (empty($formErrors)) {
        $class = '\\MyApp\\Models\\'.$postData['productType'];
        $newProduct = new $class($postData);
        $productsRepo = new ProductsRepo();
        $products = $productsRepo->getProducts();
        if (!in_array($newProduct->getSku(), $productsRepo->getSkus())) {
            $productsRepo->addProduct($newProduct);
            header('Location: https://juniortest-elmurat-karabekov.000webhostapp.com/');
        }
    }
}
