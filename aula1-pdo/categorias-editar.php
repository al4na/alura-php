<?php require_once 'classes/Categoria.php' ?>
<?php
$categoria = new Categoria();
$categoria->id = $_GET['id'];

$resultado = $categoria->carregar();
?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Categoria</h2>
    </div>
</div>
<form action="#" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input type="text" value="<?php echo $resultado['nome']; ?>" name="nome" class="form-control">
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>
