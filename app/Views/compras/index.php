<?php

use Helpers\Utils;
use Config\DB;

$moeda = new Utils;
$con = DB::connection();

$p = (isset($_GET['page'])) ? $_GET['page'] : 1;
$pesquisa = (isset($_GET['search'])) ? $_GET['search'] : '';
$totalItems = count($this->lista);
$qtd_page = 5;
$num_page = ceil($totalItems / $qtd_page);
$inicio = ($qtd_page * $p) - $qtd_page;

$data = $con->prepare("SELECT * FROM compras WHERE name LIKE '%$pesquisa%' ORDER BY name ASC LIMIT $inicio, $qtd_page");
$data->execute();
$results = $data->fetchAll();
?>
<?php $this->breadcrumb = "Lista de Compras"; ?>
<?php $this->template('template.header'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="alert alert-success"><?php echo $this->breadcrumb; ?></h2>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <a href="/compras/create" class="btn btn-sm btn-primary mb-3">Novo</a>
                </div>
                <div class="col-sm-6 col-md-6">
                    <form class="row row-cols-lg-auto " action="compras" method="GET">
                        <div class="col-12">
                            <label class="visually-hidden" for="inlineFormInputGroupUsername">Pesquisar</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="inlineFormInputGroupUsername" placeholder="Pesquisar" name="search">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-borderless caption-top">
                <caption>Total Itens: <?php echo count($this->lista); ?></caption>
                <thead class="table-light">
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col" class="text-center">Qtd</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Total</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $key => $value) : ?>
                        <tr>
                            <td><?php echo \Helpers\Utils::formataData($value['data']); ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['descricao']; ?></td>
                            <td class="text-center"><?php echo $value['quantidade']; ?></td>
                            <td><?php echo \Helpers\Utils::moedaBR($value['valor']); ?></td>
                            <td><?php echo \Helpers\Utils::moedaBR($value['quantidade'] * $value['valor']); ?></td>
                            <td class="text-center">
                                <form action="/compras/delete/<?php echo $value['idcompras'] ?>" method="post">
                                    <input type="hidden" name="_METHOD" value="delete">
                                    <a href="/compras/detalhe/<?php echo $value['idcompras'] ?>" class="btn btn-sm btn-primary">Detalhe</a>
                                    <a href="/compras/update/<?php echo $value['idcompras'] ?>" class="btn btn-sm btn-success">Atualizar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
            $previous = $p - 1;
            $next = $p + 1;
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-sm justify-content-center">

                    <li class="page-item">
                        <?php
                        if ($previous != 0) { ?>
                            <a class="page-link" href="compras?page=<?php echo $previous; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        <?php  } ?>
                    </li>
                    <?php
                    for ($i = 1; $i < $num_page + 1; $i++) : ?>
                        <li class="page-item"><a class="page-link" href="compras?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <?php
                        if ($previous <= $num_page) { ?>
                            <a class="page-link" href="compras?page=<?php echo $next; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        <?php  } ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php $this->template('template.footer'); ?>