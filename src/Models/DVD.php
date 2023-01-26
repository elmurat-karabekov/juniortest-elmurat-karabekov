<?php

namespace MyApp\Models;

class DVD extends Product
{
    private $size;
    private $specAttrs;
    private $options;

    public function __construct($productData)
    {
        parent::__construct($productData);
        $size = $productData['size'];
        $this->setSize($size);
        $this->setSpecAttrs();
        $this->setOptions();
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSpecAttrs()
    {
        $this->specAttrs = "Size: " . $this->size . ' MB';
    }

    public function getSpecAttrs()
    {
        return $this->specAttrs;
    }

    public function setOptions()
    {
        $this->options = [
            'size' => $this->size,
        ];
    }

    public function getOptions()
    {
        return $this->options;
    }
}
