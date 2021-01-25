<?php $this->breadcrumb = "Editar Compra"; ?>
<?php $this->template('template.header'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="alert alert-success"><?php echo $this->breadcrumb; ?></h2>
            <a href="/compras" class="btn btn-sm btn-light border mb-3">Cancelar</a>
            <form action="/compras/<?php echo $this->compra->idcompras; ?>" method="post">
                <input type="hidden" name="_METHOD" value="put">
                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" id="floatingInputGrid" placeholder="Nome Item" value="<?php echo $this->compra->name; ?>">
                            <label for="floatingInputGrid">Insira o nome</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="descricao" id="floatingInputGrid" placeholder="Descrição Item" value="<?php echo $this->compra->descricao; ?>">
                            <label for="floatingInputGrid">Insira a descrição</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="quantidade" id="floatingInputGrid" placeholder="Quantidade" value="<?php echo $this->compra->quantidade; ?>">
                            <label for="floatingInputGrid">Quantidade</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="valor" id="floatingInputGrid" placeholder="Valor" value="<?php echo $this->compra->valor; ?>">
                            <label for="floatingInputGrid">Insira o valor</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-sm btn-success mt-3">Atualizar</button>
            </form>
        </div>
    </div>
</div>
<?php $this->template('template.footer'); ?>