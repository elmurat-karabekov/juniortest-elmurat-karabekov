<?php

namespace MyApp\Models;

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;
    private $specAttrs;
    private $options;

    public function __construct($productData)
    {
        parent::__construct($productData);
        $height = $productData['height'];
        $width = $productData['width'];
        $length = $productData['length'];
        $this->setHeight($height);
        $this->setWidth($width);
        $this->setLength($length);
        $this->setSpecAttrs();
        $this->setOptions();
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getSpecAttrs()
    {
        return $this->specAttrs;
    }

    public function setSpecAttrs()
    {
        $this->specAttrs = "Dimension: " . $this->height . 'x' . $this->width . 'x' . $this->length;
    }

    public function setOptions()
    {
        $this->options = [
            'height' => $this->height,
            'width' => $this->width,
            'length' => $this->length,
        ];
    }

    public function getOptions()
    {
        return $this->options;
    }
}
