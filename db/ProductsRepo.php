<?php

namespace app\db;

use app\models\Product;

class ProductsRepo extends Database
{
    private $products = [];
    private $skus = [];

    public function __construct()
    {
        parent::__construct();
        $this->updateRepository();
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function addProduct(Product $product)
    {
        parent::insert($product);
        $this->updateRepository();
    }


    public function deleteProduct($ids)
    {
        foreach ($ids as $id) {
            parent::delete($id);
        }
        $this->updateRepository();
    }

    private function updateRepository()
    {
        $productsArr = parent::fetchProductsArr();
        foreach ($productsArr as $productData) {
            $class = '\\app\\models\\'.$productData['productType'];
            $productObj = new $class($productData);
            array_push($this->products, $productObj);
        }
    }

    public function getSkus()
    {
        foreach ($this->products as $product) {
            array_push($this->skus, $product->getSku());
        }
        return $this->skus;
    }
}
