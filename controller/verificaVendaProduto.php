<?php
  session_start();
  include 'connection.php';

  $nome = isset($_POST['txtNome']) ? trim($_POST['txtNome']) : "";
  $quantidade = isset($_POST['txtQuantidade']) ? trim($_POST['txtQuantidade']) : "";
  $codBarras = isset($_POST['txtCodBarras']) ? trim($_POST['txtCodBarras']) : "";

  $_SESSION['quantidadeBaixa'] = $quantidade;

  $usuario = $_SESSION['usuario'];
  $idUsuario = $_SESSION['idUsuario'];

  $quantidadeEstoque;
 

  $stmt = $pdo->prepare('SELECT ID_PRODUTOS, NOME, PRECO, QUANTIDADE, COD_BARRAS, DATA_VALIDADE, DESCRICAO, LOCAL_ARMAZENADO FROM PRODUTOS WHERE NOME LIKE :NOME AND COD_BARRAS LIKE :CodBarras LIMIT 1');

  
  $stmt->execute(array(
    ':NOME' => $nome.'%',
    ':CodBarras' => '%'.$codBarras.'%'
  ));
  

  $count = $stmt->RowCount();

  
  if ($count != 0) {
    
    foreach ($stmt as $row ) {
      $_SESSION['idProduto'] = $row["ID_PRODUTOS"]; 
      $_SESSION['nomeProduto'] = $row["NOME"];
      $_SESSION['preco'] = $row["PRECO"];
      $_SESSION['quantidadeEstoque'] = $row["QUANTIDADE"];
      $_SESSION['dataValidade'] = $row["DATA_VALIDADE"];
      $_SESSION['codBarras'] = $row["COD_BARRAS"];
      $_SESSION['descricao'] = $row["DESCRICAO"];
      $_SESSION['localArmazenado'] = $row["LOCAL_ARMAZENADO"];
      $quantidadeEstoque = $row["QUANTIDADE"];
      
    }
    
    if ($quantidadeEstoque == 0) {
      $_SESSION['mensagem'] = '<div class="alert alert-warning" role="alert">Não temos este produto no estoque !</div>';

      echo "<script>location.href='../vendaProduto.php';</script>";
      exit();
    }
    else
    {
      if($quantidade > $quantidadeEstoque){
      
        $_SESSION['mensagem'] = '<div class="alert alert-warning" role="alert">Quantidade digitada é maior que a quantia em estoque !</div>';
  
        echo "<script>location.href='../vendaProduto.php';</script>";
        exit();
        
      }
      elseif($quantidade <= 0)
      {
        
        $_SESSION['mensagem'] = '<div class="alert alert-warning" role="alert">Quantia inválida</div>';
  
        echo "<script>location.href='../vendaProduto.php';</script>";
        exit();
      }
      else
      {
        echo "<script>location.href='../visualizarVenda.php';</script>";
      }

    }

  }

  else 
  {

    $_SESSION['mensagem'] = '<div class="alert alert-warning" role="alert">Nome do produto ou código de barras inválido !</div>';

    echo "<script>location.href='../vendaProduto.php';</script>";
    exit();
  }


?>