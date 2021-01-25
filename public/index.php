<?php

require '../autoloader.php';

use Slim\App;
use App\Controllers\ComprasController;

//$app = new App;

$app = new App([
    'settings' => [
        'displayErrorDetails' => true,
        'debug' => true
    ]
]);

$app->get('/', ComprasController::class . ':index');
$app->get('/compras', ComprasController::class . ':index');
$app->get('/compras/detalhe/{id}', ComprasController::class . ':show');
$app->get('/compras/create', ComprasController::class . ':store');
$app->post('/compras', ComprasController::class . ':save');
$app->get('/compras/update/{id}', ComprasController::class . ':update');
$app->put('/compras/{id}', ComprasController::class . ':atualizar');
$app->delete('/compras/delete/{id}', ComprasController::class . ':deletar');

$app->run();
