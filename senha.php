<?php 
// $senha = password_hash("123456",PASSWORD_DEFAULT);
// echo $senha;

require_once "class/Usuario.php";

$usuario = new Usuario();
    if($usuario->buscarPorId(31))
    {
        echo "<pre>";
        echo $usuario->getId()."-".$usuario->getNome()."<br>";
    }
    else
        {
            echo "usuario não cadastrado";
        }

?>