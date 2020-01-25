<?php 
  session_start();
  include 'controller/connection.php';

  $idProduto = isset($_GET['idProduto']) ? trim($_GET['idProduto']) : "";

  if (!$_SESSION['usuario']) {

    header("Location: index.php");
    exit();
  }


  $dateNow = date('Y-m-d');

  if ($idProduto != 0) {
      
    
    $stmt = $pdo->prepare("SELECT ID_PRODUTOS, NOME, COD_PRODUTO, DESCRICAO, PRECO, QUANTIDADE, COD_BARRAS, DATA_VALIDADE, LOCAL_ARMAZENADO, DATA_CADASTRO FROM PRODUTOS WHERE ID_PRODUTOS = :ID_PRODUTOS");
    
    
    $stmt->execute(array(
    ':ID_PRODUTOS' => $idProduto,
    ));

    $count = $stmt->RowCount();

    if (!empty($idProduto)) {

    foreach ($stmt as $row ) {
      $idProduto = $row['ID_PRODUTOS'];
      $validade = $row["DATA_VALIDADE"];

      $explode = explode("-", $row["DATA_VALIDADE"]);
      $dataCadastro = $explode[2] . '/' . $explode[1] . '/' . $explode[0];
      
      
      $nome = $row['NOME'];
      $codProduto = $row['COD_PRODUTO'];
      $descricao = $row['DESCRICAO'];
      $preco = str_replace(".", ",", $row['PRECO']);
      $quantidade = $row['QUANTIDADE'];
      $codBarras = $row['COD_BARRAS'];
      $localArmazenado = $row['LOCAL_ARMAZENADO'];
      


    }
    
    
    } 
    else 
    {
    echo '<div class="col-12">';
    echo '<h5 class="text-danger display-5"> Nenhum registro encontrado! </h5>';
    echo '<br>
    <a href="consultaProduto.php" class="btn btn-primary my-3">Voltar</a>
    </div>';
    }

  }
  else
  {
    echo "<script>location.href='consultaProduto.php';</script>";
  }

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    <!-- My Css -->
    <link rel="stylesheet" href="css/estilo.css">
   

    <title>Super Mercado - Estoque</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php 
      if ($_SESSION['tipo'] == 1) 
      {
        include 'navbarFooter/navbarAdm.php';
      }
      elseif ($_SESSION['tipo'] == 2)
      {
        include 'navbarFooter/navbarUsr1.php';
      }
      else
      {
        include 'navbarFooter/navbarUsr2.php';
      }
    
    ?>

    <!-- Meio do Site -->
    <div class="container-fluid bg-light">
      <div class="container">
        <fieldset>
          <div class="bg-info rounded box form-group text-center m-2 p-2">
            <legend class="display-4 text-white"><i class="fas fa-pen"></i>&nbspEditar Produto</legend>

            <?php 
              if (isset($_SESSION['mensagem'])) {
                
                echo $_SESSION['mensagem'];
                unset($_SESSION['mensagem']);
              }

            ?>
        
            <form action="controller/atualizarProduto.php" method="POST" class="text-center m-2 p-2">
            <input type="text" id="txtIdProduto" name="txtIdProduto" value="<?php echo $idProduto ?>" class="form-control" style="display:none;" disabled>
                
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 text-left mt-2">
                    <label for="txtNome" class="text-white">Nome</label>
                    <input type="text" id="txtNome" name="txtNome" value="<?php echo $nome ?>" class="form-control" required>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 text-left mt-2">
                    <label for="txtPreco" class="text-white">Preço</label>
                    <input type="text" id="txtPreco" name="txtPreco" value="<?php echo $preco ?>" class="form-control" required>
                  </div>
                  <div class="col-xs-6 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-left mt-2">
                    <label for="txtCodProd" class="text-white">Código do produto</label>
                    <input type="text" id="txtCodProd" name="txtCodProd" value="<?php echo $codProduto ?>" class="form-control" required>
                  </div>
                  <div class="col-12"><br></div>
              </div>
              
              <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 text-left">
                    <label for="txtQuantidade" class="text-white" >Quantidade</label>
                    <input type="number" id="txtQuantidade" name="txtQuantidade" value="<?php echo $quantidade ?>" class="form-control" disabled>            
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 text-left">
                    <label for="txtCodBarras" class="text-white">Código de barras</label>
                    <input type="text" id="txtCodBarras" name="txtCodBarras" value="<?php echo $codBarras ?>" class="form-control" disabled>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 text-left">
                    <label for="txtDataValidade" class="text-white">Data de validade</label>
                    <input type="text" onfocus="(this.type='date')" onfocusout="(this.type='text')" min="2000-01-01" id="txtDataValidade" name="txtDataValidade" value="<?php echo $validade ?>" class="form-control" required>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 text-left">
                    <label for="txtLocalArmazenado" class="text-white">Local de armazenamento</label>
                    <input type="text"  id="txtLocalArmazenado" name="txtLocalArmazenado" value="<?php echo $localArmazenado ?>" class="form-control" required>
                  </div> 
              </div>
              <br>
                <div class="col-12 text-left">
                  <label for="txtDescrição" class="text-white">Descrição do produto</label>
                  <textarea class="form-control" id="txtDescricao" name="txtDescricao" Placeholder="Descrição" id="exampleFormControlTextarea1" rows="5" required><?php echo $descricao ?></textarea>
                </div>
              <br>
              <button type="submit" class="btn btn-success" validate>Atualizar</button>&nbsp
                
            </form>
          </div>
        </fieldset>
      </div>
    </div>

    <!-- Footer -->
    <?php include 'navbarFooter/footer.php'; ?>
    <!-- My JS -->
    <script src="js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>