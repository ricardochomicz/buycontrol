<?php

require '../autoloader.php';

use Slim\App;
use App\Controllers\ComprasController;

$app = new App;

$app->get('/', ComprasController::class . ':index');
$app->get('/compras', ComprasController::class . ':index');
$app->get('/compras/create', ComprasController::class .':store');
$app->post('/compras', ComprasController::class . ':save');
$app->run();
