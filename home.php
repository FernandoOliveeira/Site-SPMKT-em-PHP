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
      <div class="container bg-light  text-center ">
        <div class="row m-2 p-2">

          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
          
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 bg-info rounded">
            <h1 class="display-5 text-white">Bem vindo, <?php echo $_SESSION['usuario']; ?></h1>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
              
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