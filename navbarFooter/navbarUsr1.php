<nav class="navbar box fixed-top navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="index.php"><i class="fas fa-warehouse"></i>&nbsp&nbspSPMKT - Estoque</a>&nbsp
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" style="font-size: 20px;" href="home.php"><i class="fas fa-home"></i>&nbspHome</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" style="font-size: 20px;" href="cadastraProduto.php"><i class="fas fa-external-link-alt"></i>&nbspCadastrar novo produto</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" style="font-size: 20px;" href="consultaProduto.php"><i class="fas fa-search"></i>&nbspConsultar produto</a>
      </li>
    </ul>
    <form action="controller/logout.php" action="POST" class="form-inline my-2 my-lg-0">
      <button type="submit" class="btn btn-danger" style="font-size: 20px;" href="controller/logout.php"><i class="fas fa-sign-out-alt"></i>&nbspLogout </button>
    </form>
  </div>
</nav>