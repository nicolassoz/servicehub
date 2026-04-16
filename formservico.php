<?php 

require_once "config/conexao.php";

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

 if($_SERVER['REQUEST_METHOD']=="POST")
 {
    
    $nome = $_POST['txtnome'];
    $descricao = $_POST['txtdescricao'];
    $preco = $_POST['txtpreco'];

    $sql = "insert servicos (nome, descricao, preco) values(:nome, :descricao, :preco)";
    $cmd =  obterPdo()->prepare($sql);
    $cmd->execute([':nome'=>$nome, 'descricao'=>$descricao, 'preco'=>$preco]);

    $id =  obterPdo()->lastInsertId();

    if(isset($id))
        {
            echo "serviço cadastrado com sucesso, com o ID".$id;
        }
    else
        {
            echo "falha ao cadastrado o serviço.";
        }
 }

$sql = "select * from servicos";
$cmd = obterPdo()->prepare($sql);
$cmd->execute();
$servicos = $cmd->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de cadastro de serviços</title>
</head>
<body>
    <form  action="formservico.php" method="post">
    <input type="number" name="txtid" id="" hidden>
    <label for="txtnome">Nome</label>
    <input type="text" name="txtnome" id="">
    <label for="txtdescricao">Descrição</label>
    <input type="text" name="txtdescricao" id="">
    <label for="txtpreco">Preço</label>
    <input type="text" name="txtpreco" id="">
    <button type="submit">Gravar</button>
    </form>
    <h2>listra de serviços</h2>
    <table border="1" cellpadding = 10>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </table>
</body>
</html>