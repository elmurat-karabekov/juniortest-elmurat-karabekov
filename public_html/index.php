<?php
require_once __DIR__.'/../vendor/autoload.php'; 

use app\core\Application;
use app\controllers\Controller;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [Controller::class, 'productList']);
$app->router->get('/add-product', [Controller::class, 'productAdd']);
$app->router->post('/', [Controller::class, 'massDelete']);
$app->router->post('/add-product', [Controller::class, 'saveProduct']);
    
$app->run();
