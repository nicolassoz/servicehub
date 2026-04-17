<?php 
// $senha = password_hash("123456",PASSWORD_DEFAULT);
// echo $senha;

require_once "class/Usuario.php";

echo "<pre>";
foreach (Usuario::listar() as $user)
    {
        echo $user['id']."-".$user['nome']."<br>";
    }

?>