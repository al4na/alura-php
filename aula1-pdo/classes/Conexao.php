<?php
class Conexao
{
    public static function pegarConexao(): PDO
    {
        return new PDO(DB_DRIVE . ':host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    }
}
