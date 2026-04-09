<?php
include_once "config/conexao.php";

$sql = "select * from servicos";
$cmd = $pdo->prepare($sql);
$cmd ->execute();

$servicos = $cmd->fetchAll(PDO::FETCH_ASSOC);

// var_dump($servicos);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>aula PDO php</title>
</head>
<body>
    
    <h2>lista de serviços</h2>
    <table border="1" cellpadding = 10>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Descontinuado</th>
        </tr>
    <?php  foreach($servicos as $servico): ?>
        <tr>
        <td><?= $servico['id']?></td>
        <!-- short echo -->
        <td><?= $servico['nome']?></td>
        <td><?= $servico['descricao']?></td>
        <td><?= $servico['preco']?></td>
        <td><?= $servico['descontinuado']?"Sim":"Não" ?></td>
        </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>