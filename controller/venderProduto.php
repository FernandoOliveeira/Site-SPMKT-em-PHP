<?php
  session_start();
  include 'connection.php';
  
  if (!$_SESSION['idProduto']) {

    header("Location: ../index.php");
    exit();
  }

  

  $usuario = $_SESSION['usuario'];
  $idUsuario = $_SESSION['idUsuario'];


  $idProduto = $_SESSION['idProduto'];
  $nomeProduto = $_SESSION['nomeProduto'];
  $preco = $_SESSION['preco'];
  $quantidadeBaixa = $_SESSION['quantidadeBaixa'];
  $quantidadeEstoque = $_SESSION['quantidadeEstoque'];


  $valorTotalVenda = $preco * $quantidadeBaixa;
  
 
  $stmt = $pdo->prepare('INSERT INTO VENDAS () VALUES (null, :PRODUTO, :VALOR_UNITARIO, :QUANTIDADE_VENDIDA, :VALOR_TOTAL_VENDA, default, :USUARIO, :ID_USUARIO, :ID_PRODUTOS)');
  
  $stmt->execute(array(
    ":PRODUTO" => $nomeProduto,
    ":VALOR_UNITARIO" => $preco,
    ":QUANTIDADE_VENDIDA" => $quantidadeBaixa,
    ":VALOR_TOTAL_VENDA"=> $valorTotalVenda,
    ":USUARIO" => $usuario,
    ":ID_USUARIO" => $idUsuario,
    ":ID_PRODUTOS" => $idProduto,

  ));

  $count = $stmt->RowCount();

  if ($count != 0) {
    
    // Venda realizada com sucesso

    $quantidadeRestante = $quantidadeEstoque - $quantidadeBaixa;
    
    
    $stmt = $pdo->prepare('UPDATE PRODUTOS SET QUANTIDADE = :QUANTIDADE WHERE ID_PRODUTOS = :ID_PRODUTOS');

    $stmt->execute(array(
      ":QUANTIDADE" => $quantidadeRestante,
      ":ID_PRODUTOS" => $idProduto

    ));
    

    $_SESSION['mensagem'] = '<div class="alert alert-success" role="alert">Venda realizada com sucesso !</div>';


    $_SESSION['idProduto'] = "";
    $_SESSION['nomeProduto'] = "";
    $_SESSION['preco'] = "";
    $_SESSION['quantidadeBaixa'] = "";
    $_SESSION['quantidadeEstoque'] = "";

    echo "<script>location.href='../vendaProduto.php';</script>";
    exit();

  }
  else
  {
    // Erro a realizar a venda

    $_SESSION['idProduto'] = "";
    $_SESSION['nomeProduto'] = "";
    $_SESSION['preco'] = "";
    $_SESSION['quantidadeBaixa'] = "";
    $_SESSION['quantidadeEstoque'] = "";
    
    $_SESSION['mensagem'] = '<div class="alert alert-warning" role="alert">Erro ao realizar a vendo do produto !</div>';

    echo "<script>location.href='../vendaProduto.php';</script>";
    exit();
  }


?>