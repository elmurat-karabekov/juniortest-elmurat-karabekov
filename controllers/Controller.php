<?php 

namespace app\controllers;

use app\core\Application;
use app\db\ProductsRepo;

class Controller
{
    public static $controller;
    public $formContr;
    public $productsRepo;
    private const ADD_PAGE_PARAMS = [
        'product' => [
            'sku' => '',
            'name' => '',
            'price' => '',
            'size' => '',
            'height' => '',
            'width' => '',
            'length' => '',
            'weight' => '',
        ],
        'errors' => [
            'sku' => '',
            'name' => '',
            'price' => '',
            'size' => '',
            'height' => '',
            'width' => '',
            'length' => '',
            'weight' => '',
        ],
    ];

    public function __construct()
    {
        $this->formContr = new FormController(); 
        $this->productsRepo = new ProductsRepo();
    }

    public function productList()
    {
        $products = $this->productsRepo->getProducts();

        $params['products'] = $products;

        return Application::$app->router->renderView('productList', $params);
    }

    public function productAdd()
    {
        $params = Controller::ADD_PAGE_PARAMS;

        copy(Application::$rootDir.'/jquery/fields.js', Application::$rootDir.'/public_html/fields.js');

        return Application::$app->router->renderView('productAdd', $params);
    }
    
    public function massDelete()
    {
        if (isset($_POST['delete'])) {
            $selectedIds = $_POST['delete'];
            $this->productsRepo->deleteProduct($selectedIds);
        }
        
        header("Location: /");
    }

    public function saveProduct()
    {
        $formContr = new FormController();
        $postData = $formContr->sanitizeInput($_POST);
        $formErrors = $formContr->validateForm();

        $params = Controller::ADD_PAGE_PARAMS;

        $params['type'] = $_POST['productType'] ?? '';
        $params['product'] = array_merge($params['product'], $postData);
        $params['errors'] = array_merge($params['errors'], $formErrors);

        if (empty($formErrors)) {
            $class = '\\app\\models\\'.$postData['productType'];
            $newProduct = new $class($postData);
            $productsRepo = new ProductsRepo();
            $productsRepo->addProduct($newProduct);
            header('Location: /');
        } else {
            return Application::$app->router->renderView('productAdd', $params);
        }
    }

}