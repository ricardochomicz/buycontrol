<?php $this->breadcrumb = "Adicionar Compra"; ?>
<?php $this->template('template.header'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="alert alert-success"><?php echo $this->breadcrumb; ?></h2>
            <form action="/compras" method="post">
                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" id="floatingInputGrid" placeholder="Nome Item">
                            <label for="floatingInputGrid">Insira o nome</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="descricao" id="floatingInputGrid" placeholder="Descrição Item">
                            <label for="floatingInputGrid">Insira a descrição</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="quantidade" id="floatingInputGrid" placeholder="Quantidade">
                            <label for="floatingInputGrid">Quantidade</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="valor" id="floatingInputGrid" placeholder="Valor">
                            <label for="floatingInputGrid">Insira o valor</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-sm btn-success mt-3">Adicionar</button>
            </form>
        </div>
    </div>
</div>
<?php $this->template('template.footer'); ?>