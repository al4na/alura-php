<?php
require_once 'global.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$categoriaId = $_POST['categoria_id'];

$produto = new Produto($id);
$produto->nome = $nome;
$produto->preco = $preco;
$produto->quantidade = $quantidade;
$produto->categoriaId = $categoriaId;
$produto->atualizar();

header('Location: produtos.php');
