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
          <!-- Histórico -->
          
          <div class="bg-info rounded box form-group text-center m-2 p-2">
            <legend class="text-white display-4 my-3"><i class="fas fa-history"></i>&nbspHistórico de Vendas</legend>

            <div class="container">
              <?php 
                if (isset($_SESSION['mensagem'])) 
                { 
                  echo $_SESSION['mensagem'];
                  unset($_SESSION['mensagem']);
                }
              ?>
            </div>

            <form action="visualizarHistorico.php" method="POST" class="text-center m-2 p-2">
                
              <div class="row justify-content-center">
                <div class="col-6">
                  <select name="selectDias" class="custom-select my-3">
                    <option selected>Selecione o período:</option>
                    <option value="1">Últimos 7 dias</option>
                    <option value="2">Últimos 15 dias</option>
                    <option value="3">Últimos 30 dias</option>
                  </select>
                </div>
              </div>
              <br>
              <button type="submit" name="submit" class="btn btn-success m-2" value="Get Selected Values">Pesquisar</button>
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