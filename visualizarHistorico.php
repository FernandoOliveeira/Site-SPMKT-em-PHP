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
      <div class="container-fluid bg-light  text-center ">
        <div class="row">
          <?php

            $selectDias = isset($_POST['submit']) ? $_POST['selectDias'] : "";

            
            if (!empty($selectDias)) {
 
              if ($selectDias == 1) 
              {
                $dias = 7;  
              }
              elseif ($selectDias == 2) 
              {
                $dias = 15;  
              }
              elseif ($selectDias == 3)
              {
                $dias = 30;
              }
              else
              {
                $_SESSION['mensagem'] = '<div class="alert alert-warning" role="alert">Selecione o período de consulta</div>';

                echo "<script>location.href='historicoVendas.php';</script>";
              }


              

              $valorTotalVendas = 0;
              
              $stmt = $pdo->prepare("SELECT ID_VENDAS, PRODUTO, VALOR_UNITARIO, QUANTIDADE_VENDIDA, VALOR_TOTAL_VENDA, DATA_VENDA, USUARIO FROM VENDAS WHERE DATA_VENDA BETWEEN CURDATE() - INTERVAL :DIAS DAY AND NOW() ORDER BY DATA_VENDA");

              $stmt->execute(array(
                ':DIAS' => $dias,
              ));

              $count = $stmt->RowCount();

              if($count != 0)
              {
                echo '<div class="col-12">';

                echo '<h2 class="mb-2 p-2 bg-info text-white rounded"> Exibindo vendas dos últimos ' . $dias . ' dias </h2>';

                echo '<table class="table table-hover table-info rounded">
                <thead>
                  <tr>
                    <th scope="col">CÓD. DA VENDA</th>
                    
                    <th scope="col">PRODUTO</th>
                    
                    <th scope="col">VALOR UNITÁRIO</th>
                    
                    <th scope="col">QUANTIDADE VENDIDA</th>
                    
                    <th scope="col">VALOR DA VENDA</th>
                    
                    <th scope="col">DATA DA VENDA</th>
                    
                    <th scope="col">QUEM VENDEU</th>
                  </tr>
                </thead>';

                foreach ($stmt as $row ) {
                  echo '</tbody>';
                  
                  $explode = explode("-", $row["DATA_VENDA"]);
                  $mesEAnoVenda = $explode[1] . '/' . $explode[0];

                  $dia = $explode[2];

                  $dia = explode(" ", $dia);
                  $diaVenda = $dia[0];

                  $dataVendaCompleta = $diaVenda . '/' . $mesEAnoVenda;

                  $explode = explode(" ", $row["DATA_VENDA"]);
                  $horaVenda = $explode[1];
                  
                  

                  echo '
                  <tr>
                    <th class="">'.$row["ID_VENDAS"].'</th>

                    <td class="">'.$row["PRODUTO"].'</td>
                    
                    <td class="">'. number_format($row["VALOR_UNITARIO"], 2, ',', '.').' R$'.'</td>
                    
                    <td class="">'.$row['QUANTIDADE_VENDIDA'].'</td>
                    
                    <td class="">'.number_format((float)$row["VALOR_TOTAL_VENDA"],2, ',','.').' R$'.'</td>
                    
                    <td class="">'.$dataVendaCompleta.' às '.$horaVenda.'</td>
                    
                    <td class="">'.$row["USUARIO"].'</td>';
                    
                    $valorTotalVendas = $valorTotalVendas + $row["VALOR_TOTAL_VENDA"];

                  echo'</tr>';
                }

                echo'
                  <tr>
                  <td colspan="3"> </td>
                    <th scope="col"> Valor total das vendas: </th>
                    <th>'.number_format((float)$valorTotalVendas, 2, ',','.'). ' R$ </th>
                    <td colspan="2"> </td>
                  </tr>
                </tbody>
                </table>';

                echo '<br>
                <a href="historicoVendas.php" class="btn btn-primary my-3">Voltar</a>
                </div>';
              }
              else
              {
                echo '<div class="alert alert-danger" role="alert">Nenhum registro encontrado !</div>';
                echo '<br>
                <a href="historicoVendas.php" class="btn btn-primary my-3">Voltar</a>
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