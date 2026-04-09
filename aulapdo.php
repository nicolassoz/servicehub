<?php
include_once "config/conexao.php";
// serviços
$sql = "select * from servicos";
$cmd = $pdo->prepare($sql);
$cmd ->execute();

$servicos = $cmd->fetchAll(PDO::FETCH_ASSOC);

// var_dump($servicos);

// usuarios
$squ = "select * from usuarios";
$com = $pdo->prepare($squ);
$com ->execute();

$usuarios = $com->fetchAll(PDO::FETCH_ASSOC);

// clientes
$sqc = "select * from clientes";
$cma = $pdo->prepare($sqc);
$cma ->execute();

$clientes = $cma->fetchAll(PDO::FETCH_ASSOC);
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


    <br>
    <h2>lista de usuarios</h2>
    <table border="1" cellpadding = 10>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>senha</th>
        <th>Tipo</th>
        <th>Ativo</th>
        <th>Primeiro login</th>
        </tr>
    <?php  foreach($usuarios as $usuario): ?>
        <tr>
        <td><?= $usuario['id']?></td>
        <td><?= $usuario['nome']?></td>
        <td><?= $usuario['email']?></td>
        <td><?= $usuario['senha']?></td>
        <td><?= $usuario['tipo']?"Adm":"comum" ?></td>
        <td><?= $usuario['ativo']?"Sim":"Não" ?></td>
        <td><?= $usuario['primeiro_login']?"Sim":"Não" ?></td>
        </tr>
    <?php endforeach; ?>
    </table>

    <br>
    <h2>lista de clientes</h2>
    <table border="1" cellpadding = 10>
        <tr>
        <th>ID</th>
        <th>Usuario_ID</th>
        <th>Telefone</th>
        <th>CPF</th>
        </tr>
    <?php  foreach($clientes as $cliente): ?>
        <tr>
        <td><?= $cliente['id']?></td>
        <td><?= $cliente['usuario_id']?></td>
        <td><?= $cliente['telefone']?></td>
        <td><?= $cliente['cpf']?></td>
        </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>