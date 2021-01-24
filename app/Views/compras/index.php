<?php $this->breadcrumb = "Lista de Compras"; ?>
<?php $this->template('template.header'); ?>
<div class="container">
    <h2 class="alert alert-success"><?php echo $this->breadcrumb; ?></h2>
    <p class="text-center fw-bold">Lista de Compras</p>
    <hr>
<a href="/compras/create" class="btn btn-sm btn-primary">Criar</a>
    <?php foreach ($this->lista as $key => $value) : ?>
        <ul>
            <li><?php echo $value['name'] ?> - <?php echo $value['descricao'] ?></li>
        </ul>
    <?php endforeach; ?>
</div>
<?php $this->template('template.footer'); ?>