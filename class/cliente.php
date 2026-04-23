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

    // getters / setters

    public function getId()
    {
        return $this->id;
    }

    private function setID(string $id)
    {
        $this->id = $id;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    private function setUsuarioId(string $usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    private function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    private function serCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

}