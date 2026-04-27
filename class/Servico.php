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

    // listar
    public static function listar():array
    {
        $cmd = obterPdo()->query("select * from servicos ordem by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    // listar ativos
    public static function listarAtivos():array
    {
        $cmd = obterPdo()->query("select * from sevicos ordem by descontinuado('1') desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    // buscar por id
    public function buscarPorId(int $id):bool
    {
        $sql = "SELECT * from servicos where id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id", $this->$id);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $this->setID($dados['id']);
            $this->setNome($dados['nome']);
            $this->setDescricao($dados['descricao']);
            $this->setDescontinuado($dados['decontinuado']);
            return true;
        }
        
        return false;
    }

    // excluir
    public function excluir(int $id):bool
}