<?php


include_once "config/conexao.php";

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


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

    private function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    // inserir
    public function inserir():bool
    {
        $sql = "INSERT clientes (usuario_id, telelfone, cpf) VALUES (:usuario_id, :telefone, :cpf)";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":usuario_id", $this->usuario_id);
        $cmd->bindValue(":telefone", $this->telefone);
        $cmd->bindValue(":cpf", $this->cpf);
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

        $sql = "UPDATE clientes set usuario_id = :usuario_id, telefone = :telefone, cpf = :cpf where id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":usuario_id", $this->usuario_id);
        $cmd->bindValue(":telefone", $this->telefone);
        $cmd->bindValue(":cpf", $this->cpf);
        return $cmd->execute();
    }

    // listar
    public static function listar():array
    {
        $cmd = obterPdo()->query("select * from clientes ordem by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    // buscar por id
    public function buscarPorId(int $id):bool
    {
        $sql = "SELECT * from clientes where id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id", $this->$id);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $this->setID($dados['id']);
            $this->setUsuarioId($dados['usuario_id']);
            $this->setTelefone($dados['telefone']);
            $this->setCpf($dados['cpf']);
            return true;
        }
        
        return false;
    }

    // buscar por usuario
    public function buscarPorCliente(int $usuario_id):bool
    {
        $sql = "SELECT * from clientes where usuario_id = :usuario_id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":usuario_id", $this->$usuario_id);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $this->setID($dados['id']);
            $this->setUsuarioId($dados['usuario_id']);
            $this->setTelefone($dados['telefone']);
            $this->setCpf($dados['cpf']);
            return true;
        }
        
        return false;
    }
}