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

    // inserir
    public function inserir():bool
    {
        $sql = "INSERT servicos (nome, descricao, preco, descontinuado)
                 VALUES (:nome, :descricao, :preco, :descontinuado)";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":preco", $this->preco);
        $cmd->bindValue(":descontinuado", $this->descontinuado);
        if($cmd->execute())
        {
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        
        return false;
    }

    // atualizar
    public function atualizar():bool
    {
        if(!$this->id) return false;

        $sql = "UPDATE servicos set nome = :nome, descricao = :descricao, preco = :preco, descontinuado
                 where id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":preco", $this->preco);
        $cmd->bindValue(":descontinuado", $this->descontinuado);
        return $cmd->execute();
    }
}