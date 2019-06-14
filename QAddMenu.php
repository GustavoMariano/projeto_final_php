<?php
include 'conectaDB.php';
session_start();

if (isset($_FILES['imagem'])) {
	$encoded_image = "data:" . $_FILES['imagem']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['imagem']['tmp_name']));
}
$atualiza_menu = array(
	':id' => 1,
	':nome' => $_POST['nome'],
	':email' => $_POST['email'],
	':telefone' => $_POST['telefone'],
	':imagem' => $encoded_image
);

$sql = $pdo->prepare("UPDATE `tb_site` SET `id`=:id, `logo`=:imagem, `nome`=:nome,`telefone`=:telefone,`email`=:email WHERE :id");
$sql->execute($atualiza_menu);

if ($sql->rowCount() > 0) {
	echo "DEU BOM";
	header("location: index.php");
} else {
	echo "<br><br><br>ERROU!!!!!";
}

?>﻿
