<?php
include 'conectaDB.php';
session_start();

$data_entra = str_replace('/', '-', $_POST['data_entra_ar'] );
$QData_entra = date("Y-m-d H:i:s", strtotime($data_entra));

$data_sai = str_replace('/', '-', $_POST['data_sai_ar'] );
$QData_sai = date("Y-m-d H:i:s", strtotime($data_sai));

$atualiza_aviso = array(
	':id' => $_POST['levaId'],
	':aviso' => $_POST['aviso'],
	'data_entra_ar' => $QData_entra,
	'data_sai_ar' => $QData_sai,
	':autor' => $_SESSION['autor']
);



$sql = $pdo->prepare("UPDATE `tb_aviso` SET `id`=:id,`aviso`=:aviso,`data_cadastro`=CURRENT_TIMESTAMP,`data_entra_ar`=:data_entra_ar,`data_sai_ar`=:data_sai_ar,`responsavel`=:autor WHERE id=:id");
$sql->execute($atualiza_aviso);

if ($sql->rowCount() > 0) {
	echo "DEU BOM";
	header("location: index.php");
} else {
	echo "<br><br><br>ERROU!!!!!";
}

?>﻿
