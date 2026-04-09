<?php 

include_once "config/conexao.php";

$nome = $_POST['txtid'];
$sql = "select nome from servicos where id = :id";
$cmd = $pdo->prepare($sql);
$cmd->execute(["id"=>$id]);
$serve = $cmd->fetch(PDO::FETCH_ASSOC);

?>
<h2>nome do serviço: <?=  $serve['nome']?></h2>