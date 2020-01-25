<?php 
session_start();

include 'connection.php';


$hasuser = false;

$usuario = isset($_POST['txtUsuario']) ? $_POST['txtUsuario'] : "";

$senha = isset($_POST['txtSenha']) ? $_POST['txtSenha'] : "";


if (empty($usuario) && empty($senha)) {


    header('Location: ../index.php');


} 

else 
{

    $stmt = $pdo->query('SELECT ID_USUARIO, USUARIO, SENHA, ID_TIPO_USUARIO FROM USUARIOS');
	
	while ($ln = $stmt->fetch(PDO::FETCH_ASSOC)) {
		if ($usuario == $ln["USUARIO"]) {
            $_SESSION['usuario'] = $ln["USUARIO"];
            $_SESSION['idUsuario'] = $ln["ID_USUARIO"];
			$hasuser = true;

			if (md5($senha) == $ln["SENHA"]) {
               
                $_SESSION['tipo'] = $ln["ID_TIPO_USUARIO"];
                
                // Você entrou !
                header("Location: ../home.php");
                exit();
			}
			else 
			{
                // Senha ou usuário inválido 
                $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Usuário ou senha inválidos !</div>';
                
                header("Location: ../index.php");
                exit();
			}
		}
	};

	if (!$hasuser) 
	{
       // Usuário ou senha inválido
        $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Usuário ou senha inválidos !</div>';

        header("Location: ../index.php");
        exit();
    }
    

}

?>