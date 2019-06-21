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
$atualiza_noticia = array(
	':id' => $_POST['levaId'],
	':titulo' => $_POST['titulo'],
	':resumo' => $_POST['resumo'],
	':texto' => $_POST['texto'],
	':data_entra_ar' => $QData_entra,
	':data_sai_ar' => $QData_sai,
	':imagem' => $encoded_image,
	':autor' => $_SESSION['autor']
);

$sql = $pdo->prepare("UPDATE `tb_noticia` SET `id`=:id, `titulo`=:titulo,`resumo`=:resumo,`texto`=:texto,`data_cadastro`=CURRENT_TIMESTAMP,`data_entra_ar`=:data_entra_ar,`data_sai_ar`=:data_sai_ar,`responsavel`=:autor,`imagem`=:imagem WHERE id=:id");
$sql->execute($atualiza_noticia);

if ($sql->rowCount() > 0) {
	echo "DEU BOM";
	header("location: index.php");
} else {
	echo "<br><br><br>ERROU!!!!!";
}

?>﻿
