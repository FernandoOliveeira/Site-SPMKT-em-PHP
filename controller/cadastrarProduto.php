<?php 
    session_start();
    include 'connection.php';


    $nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : "";
    $codProduto = isset($_POST['txtCodProd']) ? $_POST['txtCodProd'] : "";
    $descricao = isset($_POST['txtDescricao']) ? $_POST['txtDescricao'] : "";
    $preco = isset($_POST['txtPreco']) ? str_replace(",", ".", $_POST['txtPreco']) : "";
    $quantidade = isset($_POST['txtQuantidade']) ? $_POST['txtQuantidade'] : "";
    $codBarras = isset($_POST['txtCodBarras']) ? $_POST['txtCodBarras'] : "";
    $dataValidade = isset($_POST['txtDataValidade']) ? $_POST['txtDataValidade'] : "";
    $localArmazenado = isset($_POST['txtLocalArmazenado']) ? $_POST['txtLocalArmazenado'] : "";
    $usuario = $_SESSION['usuario'];
    $idUsuario = $_SESSION['idUsuario'];

    if (!(empty($nome) || empty($descricao) || empty($preco) || empty($quantidade) || empty($codBarras) || empty($dataValidade) || empty($localArmazenado))) 
    {
        $stmt = $pdo->prepare('INSERT INTO PRODUTOS () VALUES(null, :NOME, :COD_PRODUTO, :DESCRICAO, :PRECO, :QUANTIDADE, :COD_BARRAS, default, :DATA_VALIDADE, :LOCAL_ARMAZENADO, :USUARIO, :ID_USUARIO)');
    
        $stmt->bindParam(":NOME", $nome);
        $stmt->bindParam(":COD_PRODUTO", $codProduto);
        $stmt->bindParam(":DESCRICAO", $descricao);       
        $stmt->bindParam(":PRECO", $preco);
        $stmt->bindParam(":QUANTIDADE", $quantidade);
        $stmt->bindParam(":COD_BARRAS", $codBarras);
        $stmt->bindParam(":DATA_VALIDADE", $dataValidade);
        $stmt->bindParam(":LOCAL_ARMAZENADO", $localArmazenado);
        $stmt->bindParam(":USUARIO", $usuario);
        $stmt->bindParam(":ID_USUARIO", $idUsuario);
        $stmt->execute();
        $count = $stmt->RowCount();
    
        if ($count != 0) {
            // Cadastro realizado com sucesso
            $_SESSION['mensagem'] = '<div class="text-center alert alert-success" role="alert">Cadastro realizado com sucesso !</div>';
            header('Location: ../cadastraProduto.php');
            exit();
        }
        else
        {
            // Cadastro não realizado
            $_SESSION['mensagem'] = '<div class="text-center alert alert-danger" role="alert">Cadastro não realizado !</div>';
            header('Location: ../cadastraProduto.php');
            exit();
        }

    }
    else
    {
        header("Location: ../index.php");
    }

?>