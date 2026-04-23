<?php
// conexão
include_once "config/conexao.php";

// codigo para mostrar erro
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

class servico
{
    // atributo
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $descontinuado;
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

    public function getNome()
    {
        return $this->nome;
    }

    private function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    private function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    private function setPreco(string $preco)
    {
        $this->preco = $preco;
    }

    public function getDescontinuado()
    {
        return $this->descontinuado;
    }

    private function setDescontinuado(string $descontinuado)
    {
        $this->descontinuado = $descontinuado;
    }
}