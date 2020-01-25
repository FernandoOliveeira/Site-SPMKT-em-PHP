<?php 
  session_start();

  if (!$_SESSION['usuario']) {

    header("Location: index.php");
    exit();
  }

  if(!isset($_SESSION['consulta']))
  {
    $_SESSION['consulta'] = "";
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
        include 'navbarFooter/navbar.php';
      }
    
    ?>

    <!-- Meio do Site -->
    <div class="container-fluid">
      <div class="container"> 
        <div class="container">
          <?php 
            if (isset($_SESSION['mensagem'])) 
            { 
              echo $_SESSION['mensagem'];
              unset($_SESSION['mensagem']);
            }
          ?>
        </div>
        <div class="row bg-info box rounded text-center m-2 p-2">
          <div class="col-12">
            <h2 class="text-white display-3 my-4 p-3"><i class="fas fa-search"></i>&nbspConsulta de produtos</h2>
          </div>
          <!-- Form -->
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-white text-center">
            <form action="controller/tipoConsulta.php" method="POST">

              <legend class="m-2 p-2">Escolha a forma de consulta:</legend>
              <div class="container d-flex justify-content-center">
                <div class="form-group text-left">
                  <input type="radio" class="mx-3" id="rdConsulta" name="rdConsulta" value="1"  checked><label for="rdConsulta">Nome do Produto</label>
                  <br>
                  <input type="radio" class="mx-3" id="rdConsulta" name="rdConsulta" value="2" ><label for="rdConsulta">Código de Barras</label>
                  <br>
                  <input type="radio" class="mx-3" id="rdConsulta" name="rdConsulta" value="3" ><label for="rdConsulta">Código do Produto</label>
                  <br>
                  <br>
                </div>
              </div>
              <button class="btn btn-primary m-3">Alterar</button>
              
            </form>
           
          </div>


          <!-- Form Consulta -->
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-white text-center ">
            <?php
            if ($_SESSION['consulta'] == "") {
              echo '<form action="consultarNomeProd.php" method="POST" class="m-2 p-2">

              <legend class="m-2 p-2">Digite o nome do produto:</legend>
      
              <input type="text" class="form-control mx-3" id="txtNome" name="txtNome" placeholder="Nome do produto" required>
              <br>
              <button type="submit" class="btn btn-primary m-3" validate>Enviar</button>
              
            </form>';
            }
            else
            {
              echo $_SESSION['consulta'];
            }
            ?>
          </div>
        </div>
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