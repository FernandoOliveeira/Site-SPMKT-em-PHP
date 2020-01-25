<?php
  session_start();
  include 'connection.php';

  if (!$_SESSION['idProduto']) {

    header("Location: ../index.php");
    exit();
  }

  $quantidadeEstoque = $_SESSION['quantidadeEstoque'];
  $idProduto = $_SESSION['idProduto']; 
  $nomeProduto = $_SESSION['nomeProduto'];
  $quantidadeEntrada = $_SESSION['quantidadeEntrada'];


  $quantidadeTotal = $quantidadeEntrada + $quantidadeEstoque;
  
  $stmt = $pdo->prepare('UPDATE PRODUTOS SET QUANTIDADE = :QuantidadeTotal WHERE ID_PRODUTOS = :ID_PRODUTOS');

  $stmt->execute(array(
    ":QuantidadeTotal" => $quantidadeTotal,
    "ID_PRODUTOS" => $idProduto
    
  ));

  $count = $stmt->RowCount();

  if ($count != 0) {
    
    $_SESSION['idProduto'] = "";
    $_SESSION['nomeProduto'] = "";
    $_SESSION['codBarras'] = "";
    $_SESSION['quantidadeEstoque'] = "";
    $_SESSION['localArmazenado'] = "";
    

    $_SESSION['mensagem'] = '<div class="alert alert-success" role="alert">Entrada realizada com sucesso !</div>';

    echo "<script>location.href='../entradaProduto.php';</script>";

  } 
  else 
  {
    $_SESSION['mensagem'] = '<div class="alert alert-warning" role="alert">Não foi possível realizar a entrada deste produto !</div>';

    echo "<script>location.href='../entradaProduto.php';</script>";

  }
  


?>