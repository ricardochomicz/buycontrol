<?php $this->breadcrumb = "Home"; ?>
<?php include 'template/header.php'; ?>
<div class="container">
    <h2 class="alert alert-success">Página Home</h2>
    <p class="text-center fw-bold">Lista de Compras</p>
    <hr>

    <?php foreach ($this->lista as $key => $value) : ?>
        <ul>
            <li><?php echo $value['name'] ?> - <?php echo $value['descricao'] ?></li>
        </ul>
    <?php endforeach; ?>
</div>
<?php include 'template/footer.php'; ?>