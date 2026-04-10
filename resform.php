<?php 

include_once "config/conexao.php";

if($_SERVER['REQUEST_METHOD']=="POST")
    {
        echo "<h3>chamado pela ação do formulario (POST) </h3>";

        $id = $_POST['txtid'];
        $sql = "select id, nome from servicos where id = :id";
        $cmd = $pdo->prepare($sql);
        $cmd->execute([':id'=>$id]);
        $serve = $cmd->fetch(PDO::FETCH_ASSOC);
        var_dump($serve);
    }

if($_SERVER['REQUEST_METHOD']=="GET")
    {
        echo "chamado pela url ou formulario method='get'";
        
        $idViaGet = $_GET['txtid'];
        $sql = 'select * from servicos where id = :id';
        $cmd = $pdo->prepare($sql);
        $cmd->execute([':id'=>$idViaGet]);
        $serviços = $cmd->fetchAll(PDO::FETCH_ASSOC);
        var_dump($serviços);
    }


// var_dump($_SERVER['REQUEST_METHOD']);

// $id = $_POST['txtid'];
// $sql = "select id, nome from servicos";
// $cmd = $pdo->prepare($sql);
// $cmd->execute();
// $serve = $cmd->fetch(PDO::FETCH_ASSOC);
// var_dump($serve);

// ?>
