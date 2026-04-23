<?php
// conexão
include_once "config/conexao.php";

// codigo para mostrar erro
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

class Solicitacao
{
    // atributo
    private $id;
    private $cliente_id;
    private $descricao_problema;
    private $data_preferida;
    private $status;
    private $data_cad;
    private $data_atualizacao;
    private $data_resposta;
    private $resposta_admin;
    private $endereco;
    

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

    public function getClienteId()
    {
        return $this->cliente_id;
    }

    private function setClienteId(string $cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    public function getDescricaoProblema()
    {
        return $this->descricao_problema;
    }

    private function setDescricaoProblema(string $descricao_problema)
    {
        $this->descricao_problema = $descricao_problema;
    }
    
}