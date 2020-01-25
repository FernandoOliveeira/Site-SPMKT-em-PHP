<?php 
  session_start();

  if (!$_SESSION['usuario']) {

    header("Location: index.php");
    exit();
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
      elseif ($_SESSION['tipo'] == 3)
      {
        include 'navbarFooter/navbarUsr2.php';
      }
      else
      {
        include 'navabarFooter/navbar.php';
      }
    
    ?>

    <!-- Meio do Site -->
    <div class="container-fluid bg-light">
      <div class="container">
        <fieldset>
          <!-- Venda de Produtos -->
          <div class="bg-info rounded box form-group text-center m-2 p-2">
            <legend class="text-white display-4 my-3"><i class="fas fa-shopping-basket"></i>&nbspVenda de Produtos</legend>

            <?php 
              if (isset($_SESSION['mensagem'])) {
                echo $_SESSION['mensagem'];
                unset($_SESSION['mensagem']);
              }

            ?>
        
            <form action="controller/verificaVendaProduto.php" method="POST" class="text-center m-2 p-2">
                
              <div class="row">
                <div class="col-xs-4 col-sm-12   col-md-12 col-lg-4 col-xl-4 text-left">
                  <label for="txtNome" class="text-white">Nome</label>
                  <input type="text" id="txtNome" name="txtNome" placeholder="Nome do produto" class="form-control" required>
                </div>
           
                <div class="col-xs-4 col-sm-6 col-md-6 col-lg-4 col-xl-4 text-left">
                  <label for="txtNomQuantidadee" class="text-white">Quantidade</label>
                  <input type="number" id="txtQuantidade" name="txtQuantidade" placeholder="Quantidade" class="form-control" required>            
                </div>
                <div class="col-xs-4 col-sm-6 col-md-6 col-lg-4 col-xl-4 text-left">
                  <label for="txtCodBarras" class="text-white">Código de barras</label>
                  <input type="text" id="txtCodBarras" name="txtCodBarras" placeholder="Código de barras" class="form-control" required>
                </div>                
              </div>
              <br>
              <button type="submit" class="btn btn-success m-1" validate>Enviar</button>&nbsp
              <button type="reset" class="btn btn-secondary m-1">Limpar campos</button>
              
            </form>
          </div>
          
        </fieldset>
      </div>
    </div>
    <!-- Footer -->
    <?php include 'navbarFooter/footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>