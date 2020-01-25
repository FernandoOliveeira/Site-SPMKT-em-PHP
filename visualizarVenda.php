<?php 
  session_start();

  if (!$_SESSION['usuario']) {

    header("Location: index.php");
    exit();
  }

  

  $dataValidade = $_SESSION['dataValidade'];
  $explode = explode("-", $dataValidade);
  $dataValidade = $explode[2] . "/" . $explode[1] . "/" . $explode[0];

  $precoTotal = str_replace(".", ",", $_SESSION['quantidadeBaixa'] * $_SESSION['preco']);

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
      <div class="row text-center">
        <div class="col-12">
          
        </div>
      </div>
      
      <div class="container bg-light text-center ">
      <h1 class="display-4 text-white bg-info rounded py-3 mb-5"><i class="fas fa-cart-arrow-down"></i>&nbspCarrinho</h1>

        <div class="row">

        <table class="table table-hover table-info rounded">
          <thead>
            <tr>
              <th scope="col">NOME</th>
              
              <th scope="col">PREÇO</th>
              
              <th scope="col">QUANTIDADE</th>
              
              <th scope="col">DATA DE VALIDADE</th>
              
              <th scope="col">CÓD. BARRAS</th>

              <th scope="col">DESCRIÇÃO</th>
              
              <th scope="col">LOCAL ARMAZENADO</th>

              <th scope="col">PREÇO TOTAL</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th> <?php echo $_SESSION['nomeProduto']; ?> </th>
              <td> <?php echo str_replace(".", ",", $_SESSION['preco']); ?> </td>
              <td> <?php echo $_SESSION['quantidadeBaixa']; ?> </td>
              <td> <?php echo $dataValidade; ?> </td>
              <td> <?php echo $_SESSION['codBarras']; ?> </td>
              <td><textarea rows="3" disabled> <?php echo $_SESSION['descricao']; ?> </textarea></td>
              <td> <?php echo $_SESSION['localArmazenado']; ?> </td>
              <td> <?php echo $precoTotal; ?> </td>
            </tr>
          </tbody>
        </table>
      </div>

      <a href="controller/venderProduto.php" class="btn btn-success"> Realizar venda </a>&nbsp&nbsp
      <a href="vendaProduto.php" class="btn btn-secondary"> Voltar </a>

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
