<?php
include 'conectaDB.php';
session_start();

$atualiza_usuario = array(
	':id' => $_POST['levaId'],
	':nome' => $_POST['nome'],
	':usuario' => $_POST['usuario'],
	':senha' => $_POST['senha'],
	':nivel' => $_SESSION['nivel']
);



$sql = $pdo->prepare("UPDATE `tb_usuario` SET `id`=:id,`login`=:usuario,`senha`=:senha,`nome`=:nome,`nivel`=:nivel WHERE id=:id");
$sql->execute($atualiza_usuario);

if ($sql->rowCount() > 0) {
	echo "DEU BOM";
	header("location: index.php");
} else {
	echo "<br><br><br>ERROU!!!!!";
}

?>﻿
