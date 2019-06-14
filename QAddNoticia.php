<?php
include 'conectaDB.php';
session_start();

$data_entra = str_replace('/', '-', $_POST['data_entra_ar'] );
$QData_entra = date("Y-m-d H:i:s", strtotime($data_entra));

$data_sai = str_replace('/', '-', $_POST['data_sai_ar'] );
$QData_sai = date("Y-m-d H:i:s", strtotime($data_sai));

if (isset($_FILES['imagem'])) {
	$encoded_image = "data:" . $_FILES['imagem']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['imagem']['tmp_name']));
}
$nova_noticia = array(
	':titulo' => $_POST['titulo'],
	':resumo' => $_POST['resumo'],
	':texto' => $_POST['texto'],
	'data_entra_ar' => $QData_entra,
	'data_sai_ar' => $QData_sai,
	':imagem' => $encoded_image,
	':autor' => $_SESSION['autor']
);

$sql = $pdo->prepare("INSERT INTO `tb_noticia`(`titulo`, `resumo`, `texto`, `data_cadastro`, `data_entra_ar`, `data_sai_ar`, `responsavel`, `imagem`) VALUES (:titulo, :resumo, :texto, CURRENT_TIMESTAMP, :data_entra_ar, :data_sai_ar, :autor, :imagem )");
$sql->execute($nova_noticia);

if ($sql->rowCount() > 0) {
	echo "DEU BOM";
	header("location: index.php");
} else {
	echo "<br><br><br>ERROU!!!!!";
}

?>﻿
