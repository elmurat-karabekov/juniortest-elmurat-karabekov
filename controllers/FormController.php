<?php

namespace app\controllers;

use app\db\ProductsRepo;

class FormController
{
    private $data;
    private array $errors = [];
    private $fields = [];
    private $productsRepo;

    public function __construct()
    {
        $this->productsRepo = new ProductsRepo();
    }

    public function sanitizeInput($post_data): array
    {
        foreach ($post_data as $key => $val) {
            $val = trim(stripslashes(htmlspecialchars($val)));

            $this->data[$key] = $val;
            $this->fields = array_keys($this->data);
        }

        return $this->data;
    }

    public function validateForm()
    {
        foreach ($this->fields as $field) {
            $func = 'validate' . ucfirst($field);
            $this->$func();
        }

        $errors = $this->errors;

        return $errors;
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }

    private function validateSku()
    {
        $val = $this->data['sku'];
        if (empty($val)) {
            $this->addError('sku', 'Please, submit required data');
        } elseif (!preg_match('/^[A-Z0-9]{5,12}$/', $val)) {
            $this->addError('sku', 'Please, provide the data of indicated type');
        } elseif (in_array($val, $this->productsRepo->getSkus())){
            $this->addError('sku', 'Sku must be unique');
        }
    }

    private function validateName()
    {
        $val = $this->data['name'];

        if (empty($val)) {
            $this->addError('name', 'Please, submit required data');
        } elseif (!preg_match('/^[a-zA-Z0-9 ]{2,30}$/', $val)) {
            $this->addError('name', 'Please, provide the data of indicated type');
        }
    }

    private function validatePrice()
    {
        $val = $this->data['price'];

        if (empty($val)) {
            $this->addError('price', 'Please, submit required data');
        } elseif (!preg_match('/^(0|[1-9]\d*)(\.\d{2})?$/', $val)) {
            $this->addError('price', 'Please, provide the data of indicated type');
        }
    }

    private function validateProductType()
    {
        $val = $this->data['productType'];

        if ($val == 'Def') {
            $this->addError('productType', 'Please, submit required data');
        }
    }

    private function validateSize()
    {
        $val = $this->data['size'];

        if (empty($val)) {
            $this->addError('size', 'Please, submit required data');
        } elseif ((!filter_var($val, FILTER_VALIDATE_INT, ['options' => ["min_range" => 1, "max_range" => 100000]]))) {
            $this->addError('size', 'Please, provide the data of indicated type');
        }
    }

    private function validateHeight()
    {
        $val = $this->data['height'];

        if (empty($val)) {
            $this->addError('height', 'Please, submit required data');
        } elseif ((!filter_var($val, FILTER_VALIDATE_INT, ['options' => ["min_range" => 1, "max_range" => 300]]))) {
            $this->addError('height', 'Please, provide the data of indicated type (range: 1, 300)');
        }
    }

    private function validateWidth()
    {
        $val = $this->data['width'];

        if (empty($val)) {
            $this->addError('width', 'Please, submit required data');
        } elseif ((!filter_var($val, FILTER_VALIDATE_INT, ['options' => ["min_range" => 1, "max_range" => 300]]))) {
            $this->addError('width', 'Please, provide the data of indicated type (range: 1, 300)');
        }
    }

    private function validateLength()
    {
        $val = $this->data['length'];

        if (empty($val)) {
            $this->addError('length', 'Please, submit required data');
        } elseif ((!filter_var($val, FILTER_VALIDATE_INT, ['options' => ["min_range" => 1, "max_range" => 300]]))) {
            $this->addError('length', 'Please, provide the data of indicated type (range: 1, 300)');
        }
    }

    private function validateWeight()
    {
        $val = $this->data['weight'];

        if (empty($val)) {
            $this->addError('weight', 'Please, submit required data');
        } elseif ((!filter_var($val, FILTER_VALIDATE_INT, ['options' => ["min_range" => 1, "max_range" => 10000]]))) {
            $this->addError('weight', 'Please, provide the data of indicated type (range: 1, 10000)');
        }
    }
}
