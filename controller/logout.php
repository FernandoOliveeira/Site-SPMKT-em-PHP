<?php 

session_start();

session_destroy();

session_start();

$_SESSION['mensagem'] = '<div class="alert alert-success" role="alert">Volte Sempre !</div>';

header("Location: ../index.php");

?>