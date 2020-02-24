<?php
require_once 'global.php';
try {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoriaId = $_POST['categoria_id'];

    $produto = new Produto();
    $produto->nome = $nome;
    $produto->preco = $preco;
    $produto->quantidade = $quantidade;
    $produto->categoriaId = $categoriaId;

    $produto->inserir();
    header('Location: produtos.php');
} catch (Exception $e) {
    print_r($e);
}
