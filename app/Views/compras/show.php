<?php $this->breadcrumb = "Detalhe Compra"; ?>

<?php $this->template('template.header'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="alert alert-success"><?php echo $this->breadcrumb; ?></h2>
            <a href="/compras" class="btn btn-sm btn-primary mb-3">Lista de Compras</a>
            <div class="list-group">
                <a href="/compras/update/<?php echo $this->show->idcompras; ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $this->show->name; ?></h5>
                        <small class="text-muted d-block">Data Compra: <?php echo \Helpers\Utils::formataData($this->show->data); ?></small>
                    </div>
                    <p class="mb-1"><?php echo $this->show->descricao; ?></p>
                    <small class="text-muted d-block">Valor Unitário: <?php echo \Helpers\Utils::moedaBR($this->show->valor); ?></small>
                    <small class="text-muted">Quantidade: <?php echo $this->show->quantidade; ?> (<?php echo \Helpers\Utils::moedaBR($this->total); ?>)</small>

                </a>

            </div>
        </div>
    </div>
</div>
<?php $this->template('template.footer'); ?>