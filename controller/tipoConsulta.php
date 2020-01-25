<?php
session_start();



$rdConsulta = isset($_POST['rdConsulta']) ? trim($_POST['rdConsulta']) : "";


if (!empty($rdConsulta)) {
  
  if ($rdConsulta == 1) 
  {
    $_SESSION['checked'] = 1;

    $_SESSION['consulta'] = '
    
      <form action="consultarNomeProd.php" method="POST" class="m-2 p-2">

        <legend class="m-2 p-2">Digite o nome do produto:</legend>

        <input type="text" class="form-control mx-3" id="txtNome" name="txtNome" placeholder="Nome do produto" required>
        <br>
        <button type="submit" class="btn btn-primary m-3" validate>Enviar</button>
        
      </form>';

    header("Location: ../consultaProduto.php");
    exit();

  } 
  elseif($rdConsulta == 2)
  {
    $_SESSION['checked'] = 2;
    
    $_SESSION['consulta'] = '
    
      <form action="consultarCodBarras.php" method="POST" class="m-2 p-2">

        <legend class="m-2 p-2">Digite o código de barras:</legend>

        <input type="text" class="form-control mx-3" id="txtCodBarras" name="txtCodBarras" placeholder="Código de barras" required>
        <br>
        <button type="submit" class="btn btn-primary m-3" validate>Enviar</button>
        
      </form>';

    header("Location: ../consultaProduto.php");
    exit();
  }
  else
  {
    $_SESSION['checked'] = 3;
    
    $_SESSION['consulta'] = '
    
    <form action="consultarCodProduto.php" method="POST" class="m-2 p-2">

      <legend class="m-2 p-2">Digite o código do produto:</legend>

      <input type="text" class="form-control mx-3" id="txtCodProd" name="txtCodProd" placeholder="Código do produto" required>
      <br>
      <button type="submit" class="btn btn-primary m-3" validate>Enviar</button>
      
    </form>';

  header("Location: ../consultaProduto.php");
  exit();
  }
    
    


} 
else 
{
  header("Location: ../index.php");
  exit();
}





?>