<?php

  session_start();
  include 'connection.php';

  $idProduto = $_GET['idProduto'];

  if (!$_SESSION['usuario']) {

    header("Location: index.php");
    exit();
  }
  

  $idProduto = isset($_POST['txtIdProduto']) ? $_POST['txtIdProduto'] : "";
  $nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : "";
  $codProduto = isset($_POST['txtCodProd']) ? $_POST['txtCodProd'] : "";
  $descricao = isset($_POST['txtDescricao']) ? $_POST['txtDescricao'] : "";
  $preco = isset($_POST['txtPreco']) ? str_replace(",", ".", $_POST['txtPreco']) : "";
  //$quantidade = isset($_POST['txtQuantidade']) ? $_POST['txtQuantidade'] : "";
  //$codBarras = isset($_POST['txtCodBarras']) ? $_POST['txtCodBarras'] : "";
  $dataValidade = isset($_POST['txtDataValidade']) ? $_POST['txtDataValidade'] : "";
  $localArmazenado = isset($_POST['txtLocalArmazenado']) ? $_POST['txtLocalArmazenado'] : "";

  $stmt = $pdo->prepare('UPDATE PRODUTOS SET NOME = :NOME, COD_PRODUTO = :COD_PRODUTO, DESCRICAO = :DESCRICAO, PRECO = :PRECO, DATA_VALIDADE = :DATA_VALIDADE, LOCAL_ARMAZENADO = :LOCAL_ARMAZENADO WHERE ID_PRODUTOS = :ID_PRODUTOS');
    
  $stmt->bindParam(":NOME", $nome);
  $stmt->bindParam(":COD_PRODUTO", $codProduto);
  $stmt->bindParam(":DESCRICAO", $descricao);
  $stmt->bindParam(":PRECO", $preco);
  //$stmt->bindParam(":QUANTIDADE", $quantidade);
  //$stmt->bindParam(":COD_BARRAS", $codBarras);
  $stmt->bindParam(":DATA_VALIDADE", $dataValidade);
  $stmt->bindParam(":LOCAL_ARMAZENADO", $localArmazenado);
  $stmt->bindParam(":ID_PRODUTOS", $idProduto);
  $stmt->execute();
  $count = $stmt->RowCount();

  if ($count != 0) {
    // Atualizado com sucesso
    $_SESSION['mensagem'] ='<div class="text-center alert alert-success" role="alert">Atualizado com sucesso !</div>';

    header('Location: ../consultaProduto.php');
    exit();

  } 
  else 
  {
    // Não atualizado
    $_SESSION['mensagem'] = '<div class="text-center alert alert-warning" role="alert">Nenhum dado foi atualizado !</div>';

    header('Location: ../consultaProduto.php');
    exit();
  }
  





?>