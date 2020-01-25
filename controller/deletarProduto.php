<?php
  session_start();
  include 'connection.php';

  if (!$_SESSION['usuario']) {

    header("Location: index.php");
    exit();
  }

  
  $idProduto = isset($_POST['txtIdProduto']) ? $_POST['txtIdProduto'] : "";

  $stmt = $pdo->prepare('DELETE FROM PRODUTOS WHERE ID_PRODUTOS = :ID_PRODUTO LIMIT 1');

  $stmt->bindParam(":ID_PRODUTO", $idProduto);
  $stmt->execute();
  $count = $stmt->RowCount();

  if ($count != 0) {
    // Deletado com sucesso
    $_SESSION['mensagem'] = '<div class="text-center alert alert-success" role="alert">Deletado com sucesso !</div>';

    header("Location: ../consultaProduto.php");
    exit();
  }
  else
  {
    // Item não excluído
    $_SESSION['mensagem'] = '<div class="text-center alert alert-warning" role="alert">Ocorreu um erro ao deletar o item !</div>';

    header("Location: ../consultaProduto.php");
    exit();
  }


?>