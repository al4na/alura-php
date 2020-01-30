<?php

class Categoria
{

    public $id;
    public $nome;

    public function listar()
    {
        $query = "SELECT id, nome FROM categorias";
        $conexao = new PDO('mysql:host=database;dbname=estoque', 'root', 'root');
        $resultado = $conexao->query($query)->fetchAll();
        //$lista = $resultado
        return $resultado;
    }
}
