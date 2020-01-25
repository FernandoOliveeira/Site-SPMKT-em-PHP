<?php
  session_start();
  include 'connection.php';

  $nomeProduto = isset($_POST['txtNome']) ? trim($_POST['txtNome']) : "";
  $quantidade = isset($_POST['txtQuantidade']) ? trim($_POST['txtQuantidade']) : "";
  $codBarras = isset($_POST['txtCodBarras']) ? trim($_POST['txtCodBarras']) : "";

  $_SESSION['quantidadeEntrada'] = $quantidade;

  $_SESSION['idProduto'] = "";
  $_SESSION['nomeProduto'] = "";
  $_SESSION['codBarras'] = "";
  $_SESSION['quantidadeEstoque'] = "";
  $_SESSION['localArmazenado'] = "";

  $quantidadeEstoque;

  if (!(empty($nomeProduto) && empty($codBarras))) {

    $stmt = $pdo->prepare('SELECT ID_PRODUTOS, NOME, COD_BARRAS, QUANTIDADE, LOCAL_ARMAZENADO FROM PRODUTOS WHERE NOME LIKE :NOME AND COD_BARRAS LIKE :CodBarras LIMIT 1');

    $stmt->execute(array(
      ':NOME' => $nomeProduto.'%',
      ':CodBarras' => '%' . $codBarras . '%',
    ));


    $count = $stmt->RowCount();


    if ($count != 0 ) {

      
      foreach ($stmt as $row ) {
        $_SESSION['idProduto'] = $row["ID_PRODUTOS"]; 
        $_SESSION['nomeProduto'] = $row["NOME"];
        $_SESSION['codBarras'] = $row["COD_BARRAS"];
        $_SESSION['quantidadeEstoque'] = $row["QUANTIDADE"];
        $_SESSION['localArmazenado'] = $row["LOCAL_ARMAZENADO"];
        
      }

      if($quantidade <= 0)
      {
        
        $_SESSION['mensagem'] = '<div class="alert alert-warning" role="alert">Quantia inválida</div>';
  
        echo "<script>location.href='../entradaProduto.php';</script>";
        exit();
      }
      else
      {
        echo "<script>location.href='../visualizarEntrada.php';</script>";
      }


    } 
    else 
    {
      $_SESSION['mensagem'] = '<div class="alert alert-warning" role="alert">Nenhum registro encontrado !</div>';

      echo "<script>location.href='../entradaProduto.php';</script>";
    }
    

  }
  else
  {
    echo "<script>location.href='../entradaProduto.php';</script>";
  }





?>