<?php 
include_once "config/conexao.php";

include_once "class/Servico.php";

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

  include "includes/header.php";
include "includes/menu.php";

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo']!=1)
  {
    header("location: login.php");
    exit();
  }
  $servicos = Servico::listar();

  $sucesso = filter_input(INPUT_GET, "sucesso", FILTER_VALIDATE_INT); 
$erro = filter_input(INPUT_GET, "erro", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
?>

<main class="container mt-5">
  <h2 class="text-center mb-4">?</h2>

<?php if($sucesso):?>
<div class="alert alert-success alert-dismissible fade show">
  Solicitação enviada com sucesso! em breve entraremos em contato.
  <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
  <?php endif;?>

  <?php if($erro):?>
<div class="alert alert-danger alert-dismissible fade show">
  <?= $erro ?>
  <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
  <?php endif;?>

  <form action="processa_contrato.php" method="POST" class="bg-light p-4 shadow rounded">

    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

    <div class="row">

      <div class="col-md-6 mb-3">
        <label class="form-label">?</label>
        <input type="text" name="nome" class="form-control" required minlength="3">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">?</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">?</label>
        <input type="text" name="telefone" class="form-control" required minlength="8" maxlength="20">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">?</label>
        <input type="text" name="cpf" class="form-control" minlength="11" maxlength="14">
      </div>

      <div class="col-md-12 mb-3">
        <label class="form-label">?</label>
        <input type="text" name="endereco" class="form-control" required minlength=5>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">?</label>
        <input type="date" name="data_preferida" class="form-control">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">?</label>
        <select name="servicos_ids[]" class="form-select" multiple required size="5">
          <?php foreach($servicos as $servico):?>
            <option value="<?= $servico['id'] ?>">
           <?=$servico['nome'] ?>
            </option>
         <?php endforeach;?>
        </select>
        <small class="text-muted">
          Para selecionar mais de um: segure <strong>CTRL</strong>(Windows) ou <strong>CMD</strong>(mac)
        </small>
      </div>

      <div class="col-md-12 mb-3">
        <label class="form-label">?</label>
        <textarea name="descricao" class="form-control" rows="4" required minlength="10"></textarea>
      </div>

    </div>

    <button class="btn btn-success w-100">Enviar Solicitação</button>
  </form>
</main>





  <main class="container mt-5">
  <h2>gerenciar Servicos</h2>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>descontinuado</th>
        <th>ação</th>
      </tr>
    </thead>
    <tbody>
      <?php  foreach($servicos as $s):?>
        <tr>
          <td><?= $s['id'] ?></td>
          <td><?= $s['servico_nome'] ?></td>
          <td><?= $s['preco'] ?></td>
          <td><?= $s['descontinuado'] ?></td>
          <td>
            <a href="admin_servicos_excluir.php?id=" class="btn btn-danger btn-sm">excluir</a>
          </td>
        </tr>
        <?php endforeach;?>
    </tbody>
  </table>

  <a href="admin_dashboard.php" class="btn btn-secondary">Voltar</a>
</main>

<?php 
include "includes/footer.php";
?>