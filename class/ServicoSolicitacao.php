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
}