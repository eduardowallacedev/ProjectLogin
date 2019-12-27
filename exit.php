<?php
// Elimina a sessao do usuario e volta pra tela inicial
session_start();
unset($_SESSION['id']);
header("location: index.php");

?>