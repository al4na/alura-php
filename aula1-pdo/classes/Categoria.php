<?php

require_once 'classes/Conexao.php';

class Categoria
{

    public $id;
    public $nome;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function listar()
    {
        $query = "SELECT id, nome FROM categorias";
        $resultado = Conexao::pegarConexao()->query($query)->fetchAll();
        return $resultado;
    }

    public function inserir(): void
    {
        $query = "INSERT INTO categorias (nome) VALUES ('" . $this->nome . "')";
        Conexao::pegarConexao()->exec($query);
    }

    public function atualizar(): void
    {
        $query = "UPDATE categorias SET nome='" . $this->nome . "' WHERE id=" . $this->id;
        Conexao::pegarConexao()->exec($query);
    }

    public function carregar()
    {
        $query = "SELECT id, nome FROM categorias WHERE id=" . $this->id;
        $lista = Conexao::pegarConexao()->query($query)->fetchAll();
        foreach ($lista as $linha) {
            $this->nome = $linha['nome'];
        }
    }
}
