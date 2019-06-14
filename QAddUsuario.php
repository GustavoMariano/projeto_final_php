<?php
include 'conectaDB.php';
session_start();

$add_usuario = array(
	':nome' => $_POST['nome'],
	':usuario' => $_POST['usuario'],
	':senha' => $_POST['senha'],
	':nivel' => $_SESSION['nivel']
);

$sql = $pdo->prepare("INSERT INTO `tb_usuario`(`login`, `senha`, `nome`, `nivel`) VALUES (:usuario,:senha,:nome,:nivel)");
$sql->execute($add_usuario);

if ($sql->rowCount() > 0) {
	echo "DEU BOM";
	header("location: index.php");
} else {
	echo "<br><br><br>ERROU!!!!!";
}

?>