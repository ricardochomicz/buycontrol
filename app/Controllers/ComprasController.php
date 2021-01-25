<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Models\Compra;
use Config\DB;

class ComprasController extends Controller
{

    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        $dados = Compra::all();
        $this->lista = $dados;

        return $this->view('compras/index', $response);
    }

    public function store(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->view('compras/create', $response);
    }

    public function save(ServerRequestInterface $request, ResponseInterface $response)
    {
        $data = $request->getParsedBody();
        $dados = new Compra;
        $dados->name = mb_convert_case($data['name'], MB_CASE_TITLE, "UTF-8");
        $dados->descricao = $data['descricao'];
        $dados->valor = str_replace(',', '.', $data['valor']);
        $dados->quantidade = $data['quantidade'];
        $dados->data = date("Y-m-d");
        $dados->save();

        return $response->withRedirect('/compras');
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response)
    {
        $id = $request->getAttribute('id');
        $show = Compra::find($id);
        $this->show = $show;
        $this->total = $this->show->quantidade * $this->show->valor;

        return $this->view('compras/show', $response);
    }

    public function update(ServerRequestInterface $request, ResponseInterface $response)
    {
        $id = $request->getAttribute('id');
        $dados = Compra::find($id);
        $this->compra = $dados;

        return $this->view('compras/update', $response);
    }

    public function atualizar(ServerRequestInterface $request, ResponseInterface $response)
    {
        $data = $request->getParsedBody();
        $id = $request->getAttribute('id');
        $dados = Compra::find($id);
        $dados->name = mb_convert_case($data['name'], MB_CASE_TITLE, "UTF-8");
        $dados->descricao = $data['descricao'];
        $dados->valor = str_replace(',', '.', $data['valor']);
        $dados->quantidade = $data['quantidade'];
        $dados->data = date("Y-m-d");
        $dados->save();

        return $response->withRedirect('/compras');
    }

    public function deletar(ServerRequestInterface $request, ResponseInterface $response)
    {
        $id = $request->getAttribute('id');
        $dados = Compra::find($id);
        $dados->delete();

        return $response->withRedirect('/compras');
    }
}
