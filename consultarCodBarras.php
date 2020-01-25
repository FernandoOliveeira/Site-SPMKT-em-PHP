<?php 
  session_start();
  include 'controller/connection.php';

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
        include 'navbarFooter/navbar.php';
      }
    
    ?>

    <!-- Meio do Site -->
    <div class="container- bg-light">
      <div class="container-fluid text-center ">
        <div class="row">
        
          <?php

            $codBarras = isset($_POST['txtCodBarras']) ? trim($_POST['txtCodBarras']) : "";


            if (!empty($codBarras)) 
            {
              
              $stmt = $pdo->prepare("SELECT ID_PRODUTOS, NOME, COD_PRODUTO, PRECO, QUANTIDADE, DATA_VALIDADE, COD_BARRAS, LOCAL_ARMAZENADO, DESCRICAO, USUARIO, DATA_CADASTRO FROM PRODUTOS WHERE COD_BARRAS LIKE :CodBarras ORDER BY NOME");

              $stmt->execute(array(
                ':CodBarras' => '%'.$codBarras.'%',
              ));

              $count = $stmt->RowCount();
              
              if ($count != 0) 
              {

                echo '<div class="col-12">';
                
                echo '<table class="table table-hover table-info rounded">
                <thead class="">
                  <tr>
                    <th scope="col">NOME</th>
                    
                    <th scope="col">PREÇO</th>

                    <th scope="col">CÓD. PRODUTO</th>
                    
                    <th scope="col">QUANTIDADE</th>
                    
                    <th scope="col">DATA DE VALIDADE</th>
                    
                    <th scope="col">CÓD. BARRAS</th>
                    
                    <th scope="col">LOCAL ARMAZENADO</th>
                    
                    <th scope="col" colspan="2">DESCRIÇÃO</th>';

                  if ($_SESSION['tipo'] == 1) 
                  {
                    echo '<th scope="col">QUEM CADASTROU</th>';
                    echo '<th scope="col">DATA CADASTRO</th>';
                    echo '<th scope="col">ALTERAR DADOS</th>';
                  }

                 echo'</tr>
                </thead>';
  
  
  
                foreach ($stmt as $row ) {
                  echo '<tbody>';

                  $explode = explode("-", $row["DATA_VALIDADE"]);
                  $validade = $explode[2] . '/' . $explode[1] . '/' . $explode[0];

                  $explode = explode("-", $row["DATA_CADASTRO"]);
                  $mesEAnoCadastro = $explode[1] . '/' . $explode[0];

                  $dia = $explode[2];

                  $dia = explode(" ", $dia);
                  $diaCadastro = $dia[0];

                  $dataCadastroCompleta = $diaCadastro . '/' . $mesEAnoCadastro;

                  $explode = explode(" ", $row["DATA_CADASTRO"]);
                  $horaCadastro = $explode[1];


                  echo '
                  <tr>
                  <th>'.$row["NOME"].'</th>
                  
                  <td>'.str_replace(".", ",", $row["PRECO"]).'</td>

                  <td>'.$row["COD_PRODUTO"].'</td>
                  
                  <td>'.$row["QUANTIDADE"].'</td>
                  
                  <td>'.$validade.'</td>
                  
                  <td>'.$row["COD_BARRAS"].'</td>
                  
                  <td>'.$row["LOCAL_ARMAZENADO"].'</td>
                  
                  <td colspan="2"><textarea rows="3" disabled>'.$row["DESCRICAO"].'</textarea></td>';

                  if ($_SESSION['tipo'] == 1) 
                  {

                    echo '<td>' . $row["USUARIO"] .  '</td>';

                    echo '<td>' . $dataCadastroCompleta . ' às ' . $horaCadastro . '</td>';

                    // Botão Editar
                    echo '<td> <a class="btn btn-sm btn-success text-white m-2" href="editarProduto.php?idProduto='.$idProdutos = $row['ID_PRODUTOS'].'"><i class="fas fa-pen"></i>&nbsp&nbspEditar</a>';

                    // Botão Deletar
                    echo '<a class="btn btn-sm btn-danger text-white m-2" href="deletarProduto.php?idProduto='.$idProdutos = $row['ID_PRODUTOS'].'"><i class="fas fa-trash-alt"></i>&nbspDeletar</a>
                    </td>';
                  }

                  echo'</tr>';
                }
                
                echo '</tbody>
                </table>';
                echo '<br>
                <a href="consultaProduto.php" class="btn btn-primary my-3">Voltar</a>
                </div>';
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
              header("Location: index.php");
            }

          ?>

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