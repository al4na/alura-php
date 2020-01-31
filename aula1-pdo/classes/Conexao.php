<?php

class Conexao
{
    public static function pegarConexao(): PDO
    {
        return new PDO('mysql:host=database;dbname=estoque', 'root', 'root');
    }
}
