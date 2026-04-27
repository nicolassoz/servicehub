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

    private function setServicoId(string $servico_id)
    {
        $this->servico_id = $servico_id;
    }

    public function getSolicitacaoId()
    {
        return $this->solicitacao_id;
    }

    private function setSolicitacaoId(string $solicitacao_id)
    {
        $this->solicitacao_id = $solicitacao_id;
    }

    public function getDataAssoc()
    {
        return $this->data_assoc;
    }

    private function setDataAssoc(string $data_assoc)
    {
        $this->data_assoc = $data_assoc;
    }

    // associar
    public function associar(int $servico_id, int $solicitacao_id): bool
    {
        ;
    }

    // listar servico de solicitacoes
    public function listarServicosDaSolicitacao(int $solicitacao_id): array
    {
        ;
    }
}