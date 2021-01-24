<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;

class Controller
{
    public function view(String $view, ResponseInterface $response): ResponseInterface
    {
        $pagina = include '../app/Views/' . $view . '.php';
        $response->getBody()->getContents($pagina);
        return $response;
    }

    public function template(String $path): void
    {
        $path = str_replace(".", "/", $path);
        include dirname(__FILE__, 2) . "/views/$path.php";
    }
}
