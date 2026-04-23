<?php

include_once 'config/conexao.php';

class cliente
{
    // atributo
    private $id;
    private $usuario_id;
    private $telefone;
    private $cpf;
    private $pdo;

    // construtor
    public function __construct()
    {
        $this->pdo = obterPdo();
    }
}