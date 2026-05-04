<?php 
include_once "config/conexao.php";

include "class/ServicoSolicitacao.php";
include "class/Solicitacao.php";

include "includes/header.php";
include "includes/menu.php";

$oi = new Solicitacao
?>
<main class="container mt-5">
  <h3>Solicitação 1</h3>

  <p><strong>Status:</strong> </p>
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