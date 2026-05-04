<?php 
session_start();

include_once "includes/funcoes.php";

include_once "class/Solicitacao.php";
include_once "class/ServicoSolicitacao.php";

include_once "includes/header.php";
include_once "includes/menu.php";


$servicos_s = new ServicoSolicitacao;
$solicitacao = new Solicitacao;
?>
<main class="container mt-5">
  <h3>Solicitação #</h3>

  <p><strong>Status:</strong> </p>
  <p><strong>Data:</strong> </p>
  <p><strong>Serviços Solicitados:</strong> </p>
  <p><strong>Descrição:</strong> </p>
  <p><strong>Endereço:</strong> </p>

 
    <div class="alert alert-info">
      <strong>Resposta do Admin:</strong><br>
      
    </div>
 
    <div class="alert alert-warning">Ainda não há resposta.</div>
  

  <a href="cliente_dashboard.php" class="btn btn-secondary">Voltar</a>
</main>

<?php 
include "includes/footer.php";
?>