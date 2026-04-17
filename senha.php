<?php 
// $senha = password_hash("123456",PASSWORD_DEFAULT);
// echo $senha;

require_once "class/Usuario.php";

// testando update
$usuario = new Usuario();
    if($usuario->buscarPorId(31))
    {
        echo "<pre>";
        print_r($usuario);
    }
    else
        {
            echo "usuario não cadastrado";
            die();
        }
        $usuario->setNome("Milhonário Santos");
        echo "<hr>";
        echo "<prev>";
        if($usuario->atualizar())
            print_r($usuario);

?>