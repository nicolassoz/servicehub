<?php 
// $senha = password_hash("123456",PASSWORD_DEFAULT);
// echo $senha;

require_once "class/Usuario.php";

// testando update
$usuario = new Usuario();
    $usuario->buscarPorId(28);
    if($usuario->atualizarSenha(password_hash("123456", PASSWORD_DEFAULT)))
        {
            echo "Senha do usuario ".$usuario->getNome()." atualizada com sucesso!";    
        }
    

?>