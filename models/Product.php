<?php

namespace app\models;

abstract class Product
{
    private $id;
    private $sku;
    private $name;
    private $price;
    private $type;

    public function __construct($productData)
    {
        $id = $productData['id'] ?? '';
        $sku = $productData['sku'];
        $name = $productData['name'];
        $price = $productData['price'];
        $type = $productData['productType'];
        $this->setId($id);
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setType($type);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getType()
    {
        return $this->type;
    }

    abstract public function getOptions();
    abstract public function setOptions();
    abstract public function getSpecAttrs();
    abstract public function setSpecAttrs();
}
