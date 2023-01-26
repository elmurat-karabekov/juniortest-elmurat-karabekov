<?php

namespace MyApp\Models;

class Book extends Product
{
    private $weight;
    private $specAttrs;
    private $options;

    public function __construct($productData)
    {
        parent::__construct($productData);
        $weight = $productData['weight'];
        $this->setWeight($weight);
        $this->setSpecAttrs();
        $this->setOptions();
    }


    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getSpecAttrs()
    {
        return $this->specAttrs;
    }

    public function setSpecAttrs()
    {
        $this->specAttrs = "Weight: " . $this->weight . 'KG';
    }

    public function setOptions()
    {
        $this->options = [
            'weight' => $this->weight,
        ];
    }

    public function getOptions()
    {
        return $this->options;
    }
}
