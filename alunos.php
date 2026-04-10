<?php 
 require_once "config/conexao.php";

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

 if($_SERVER['REQUEST_METHOD']=="POST")
 {
    $nome = $_POST['txtnome'];
    $sobrenome = $_POST['txtsobrenome'];
    $turma = $_POST['txtturma'];

    $sql = "insert servicos (nome, sobrenome, turma) values(:nome, :sobrenome, :turma)";
    $cmd = $pdo->prepare($sql);
    $cmd->execute([':nome'=>$nome, 'sobrenome'=>$sobrenome, 'turma'=>$turma],);

    $id = $pdo->lastInsertId();

    if(isset($id))
        {
            echo "aluno cadastrado com sucesso, com o ID".$id;
        }
    else
        {
            echo "falha ao cadastrado o aluno.";
        }

        $sql = "select * from alunos";
        $cmd = $pdo->prepare($sql);
        $cmd ->execute();
        $alunos = $cmd->fetchAll(PDO::FETCH_ASSOC);
 }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de cadastro de alunos</title>
</head>
<body>
    <form  action="alunos.php" method="post">
    <input type="number" name="txtid" id="" hidden>
    <label for="txtnome">Nome</label>
    <input type="text" name="txtnome" id="">
    <label for="txtsobrenome">sobrenome</label>
    <input type="text" name="txtsobrenome" id="">
    <label for="txtturma">turma</label>
    <input type="text" name="txtturma" id="">
    <button type="submit">Gravar</button>
    </form>

    <h2>lista de alunos</h2>
    <table border="1" cellpadding = 10>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Turma</th>
        <th>Ativo</th>
        </tr>
    <?php  foreach($alunos as $aluno): ?>
        <tr>
        <td><?= $aluno['id']?></td>
        <td><?= $aluno['nome']?></td>
        <td><?= $aluno['sobrenome']?></td>
        <td><?= $aluno['turma']?></td>
        <td><?= $aluno['ativo']?"Sim":"Não" ?></td>
        </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>