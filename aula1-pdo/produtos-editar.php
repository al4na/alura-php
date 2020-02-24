<?php require_once 'global.php' ?>
<?php
$produto = new Produto($_GET['id']);

$listaCategoria = Categoria::listar();
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Nova Categoria</h2>
    </div>
</div>

<form action="produtos-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <input type="hidden" name="id" value="<?php echo $produto->id ?>">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input name="nome" type="text" value="<?php echo $produto->nome ?>" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input name="preco" type="number" value="<?php echo $produto->preco ?>" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input name="quantidade" type="number" value="<?php echo $produto->quantidade ?>" min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="nome">Categoria do Produto</label>
                <select class="form-control" name="categoria_id">
                    <?php $selected = '' ?>
                    <?php foreach ($listaCategoria as $linha) : ?>
                        <?php
                        if ($linha['id'] == $produto->categoriaId) {
                            $selected = 'selected';
                        } ?>
                        <option <?php echo $selected ?> value="<?php echo $linha['id'] ?>"><?php echo $linha['nome'] ?></option>
                        <?php $selected = '' ?>
                    <?php endforeach ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
