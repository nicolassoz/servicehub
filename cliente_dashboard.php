<?php 
session_start();

require_once "config/conexao.php";

require_once "includes/funcoes.php";

require_once "class/cliente.php";

// apenas um comando dentro do if não pressisa de {}
if(!isset($_SESSION['usuario_id']) || $_SESSION["tipo"]!=2)
    header("location: login.php");

// objeto da classe cliente
$cliente = new cliente;

// buscar os dados do cliente usando o ID do usuario logado
if(!$cliente->buscarPorId($_SESSION["usuario_id"]))
  {
    // se nao encontrar o cliente encerra a execução
    die("cliente não encontrado");
  }

  // consulta sql para buscar as solicitações do cliente
  $sql = "SELECT s.id, s.status, s.data_cad GROUP_CONCAT(se.nome SEPARADOR '.')AS servicos from solicitacoes s 
  INNER JOIN servico_solicitacoes ss ON ss.solicitacoes_id 
  where s.cliente_id=?
  GROUP BY s.id, s.status, s.data_cad 
          ORDER BY s.data_cad DESC";

  // preparar consulta
  $stmt = obterPdo()->prepare($sql);
  // ------ $cmd = obterPdo() -> prepare($sql);
  // executar
  $stmt->execute([$cliente->getId()]);
  // ----- $cmd->execute();

  $solicitacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

  include "includes/header.php";
  include "includes/menu.php"
?>

<main class="container mt-5">
  <h2>Bem-vindo,<strong><?= $_SESSION['nome'] ?></strong> </h2>
  <p><a href="logout.php" class="btn btn-danger btn-sm">Sair</a></p>
  <a href="cliente_perfil.php" class="btn btn-warning btn-sm">Meu Perfil</a>
  <h4 class="mt-4">Minhas Solicitações</h4>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Status</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
   
          <td></td>
         
          <td></td>
          <td></td>
          <td>
            <a href="cliente_detalhes.php?id=" class="btn btn-primary btn-sm">Detalhes</a>
          </td>
        </tr>
    </tbody>
  </table>
</main>

<?php 
include "includes/footer.php";
?>