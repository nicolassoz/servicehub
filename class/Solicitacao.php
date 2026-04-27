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

    public function getDataPreferida()
    {
        return $this->data_preferida;
    }

    private function setDataPreferida(string $data_preferida)
    {
        $this->data_preferida = $data_preferida;
    }

    public function getStatus()
    {
        return $this->status;
    }

    private function seStatus(string $status)
    {
        $this->status = $status;
    }
    
    public function getDataCad()
    {
        return $this->data_cad;
    }

    private function setDataCad(string $data_cad)
    {
        $this->data_cad = $data_cad;
    }

    public function getDataAtualizacao()
    {
        return $this->data_atualizacao;
    }

    private function setDataAtualizacao(string $data_atualizacao)
    {
        $this->data_atualizacao = $data_atualizacao;
    }

    public function getDataResposta()
    {
        return $this->data_resposta;
    }

    private function setDataResposta(string $data_resposta)
    {
        $this->data_resposta = $data_resposta;
    }

    public function getRespostaAdmin()
    {
        return $this->resposta_admin;
    }

    private function setRespostaAdmin(string $resposta_admin)
    {
        $this->resposta_admin = $resposta_admin;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    private function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
    }

    // inserir
    public function inserir():bool
    {
        $sql = "INSERT solicitacoes (cliente_id, descricao_problema, data_preferida, status, data_cad, data_atualizacao, data_resposta, resposta_admin, endereco)
                 VALUES (:cliente_id, :descricao_problema, :data_preferida, :status, :data_cad, :data_atualizacao, :data_resposta, :resposta_admin, :endereco)";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":cliente_id", $this->cliente_id);
        $cmd->bindValue(":descricao_problema", $this->descricao_problema);
        $cmd->bindValue(":data_preferida", $this->data_preferida);
        $cmd->bindValue(":status", $this->status);
        $cmd->bindValue(":data_cad", $this->data_cad);
        $cmd->bindValue(":data_atualizacao", $this->data_atualizacao);
        $cmd->bindValue(":data_resposta", $this->data_resposta);
        $cmd->bindValue(":resposta_admin", $this->resposta_admin);
        $cmd->bindValue(":endereco", $this->endereco);
        if($cmd->execute())
        {
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        
        return false;
    }

}