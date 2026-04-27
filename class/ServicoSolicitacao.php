<?php
// conexão
include_once "config/conexao.php";

// codigo para mostrar erro
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

class ServicoSolicitacao 
{
    // atributo
    private $servico_id;
    private $solicitacao_id;
    private $data_assoc;
    private $pdo;

    // construtor
    public function __construct()
    {
        $this->pdo = obterPdo();
    }

    // getters / setters

    public function getServicoId()
    {
        return $this->servico_id;
    }

    private function setServicoId(int $servico_id)
    {
        $this->servico_id = $servico_id;
    }

    public function getSolicitacaoId()
    {
        return $this->solicitacao_id;
    }

    private function setSolicitacaoId(int $solicitacao_id)
    {
        $this->servico_id = $solicitacao_id;
    }

    public function getDataAssoc()
    {
        return $this->data_assoc;
    }

    

    //  associar
    public static function associar(int $servico_id, int $solicitacao_id): bool
    {
        $sql = "insert servico_solicitacao values(:servico_id, :solicitacao_id, default)";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":servico_id", $servico_id);
        $cmd->bindValue(":sorlicitacao_id", $solicitacao_id);
        return $cmd->execute();
    }

    //  listar servico de solicitacoes
    public function listarServicosDaSolicitacao(int $solicitacao_id): array
    {
        
    }
}