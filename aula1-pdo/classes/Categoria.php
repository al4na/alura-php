<?php
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

    public static function listar()
    {
        //throw new Exception("Erro ao listar categorias", 1);
        $query = "SELECT id, nome FROM categorias";
        $resultado = Conexao::pegarConexao()->query($query)->fetchAll();
        return $resultado;
    }

    public function inserir(): void
    {
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $stmt = Conexao::pegarConexao()->prepare($query);
        $stmt->bindValue(':nome', $this->nome);

        $stmt->execute();
    }

    public function atualizar(): void
    {
        $query = "UPDATE categorias SET nome=:nome WHERE id= :id";
        $stmt = Conexao::pegarConexao()->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':id', $this->id);

        $stmt->execute();
    }

    public function carregar()
    {
        $query = "SELECT id, nome FROM categorias WHERE id= :id";
        $stmt = Conexao::pegarConexao()->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();

        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
    }

    public function exluir(): void
    {
        $query = "DELETE FROM categorias where id=:id";
        $stmt = Conexao::pegarConexao()->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
}
