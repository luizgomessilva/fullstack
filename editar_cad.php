<?php

session_start();
	if(empty($_SESSION['login'])){
		header('Location: login.php');
	}
include ('conexao.php');

$cod=$_GET['id'];
$nome=$_GET['nome'];
$senha=$_GET['senha'];
$status=$_GET['status'];

$mudar="UPDATE usuarios SET nome = '$nome', senha='$senha', status='$status' WHERE id_usu = '$cod'";

$alterar = mysqli_query($conexao,$mudar) or die ("Falhou!");
header('Location: visualiza_usu.php');

?>