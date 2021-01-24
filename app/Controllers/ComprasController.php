<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Models\Compra;

class ComprasController extends Controller
{

    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        $compras = Compra::all();

        $this->lista = $compras;

        return $this->view('compras/index', $response);
    }

    public function store(ServerRequestInterface $request, ResponseInterface $response)
    {

        return $this->view('compras/create', $response);
    }

    public function save(ServerRequestInterface $request, ResponseInterface $response)
    {
        $data = $request->getParsedBody();
        $compra = new Compra;
        $compra->name = $data['name'];
        $compra->descricao = $data['descricao'];
        $idCompra = $compra->save();
        if ($idCompra) {
        } else {
        }

        return $response->withRedirect('/compras');
    }
}
