<?php
require_once 'global.php';

$id = $_GET['id'];
$produto = new Produto($id);
$produto->exluir();

header('Location: produtos.php');
