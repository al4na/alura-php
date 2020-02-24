<?php
class Produto
{
    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoriaId;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }


    public static function listar()
    {
        $query = "SELECT p.id, p.nome, preco, quantidade, categoria_id, c.nome as categoria_nome
                FROM produtos p
                INNER JOIN categorias c ON p.categoria_id = c.id";
        $resultado = Conexao::pegarConexao()->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir()
    {
        $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id)
        VALUES (:nome, :preco, :quantidade, :categoria_id)";

        $stmt = Conexao::pegarConexao()->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoriaId);

        $stmt->execute();
    }

    public function carregar(): void
    {
        $query = "SELECT nome, preco, quantidade, categoria_id FROM produtos WHERE id=:id";
        $stmt = Conexao::pegarConexao()->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();

        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
        $this->preco = $linha['preco'];
        $this->quantidade = $linha['quantidade'];
        $this->categoriaId = $linha['categoria_id'];
    }

    public function atualizar(): void
    {
        $query = "UPDATE produtos SET nome=:nome, preco=:preco, quantidade=:quantidade, categoria_id=:categoria_id WHERE id= :id";
        $stmt = Conexao::pegarConexao()->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoriaId);
        $stmt->bindValue(':id', $this->id);

        $stmt->execute();
    }

    public function exluir(): void
    {
        $query = "DELETE FROM produtos WHERE id = :id";
        $stmt = Conexao::pegarConexao()->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
}
