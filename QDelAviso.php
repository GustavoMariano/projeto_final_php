<?php
include 'conectaDB.php';

$delAviso=array(
	'identificador' => $_POST['levaId']);

$sql = $pdo->prepare("DELETE FROM tb_aviso WHERE id = :identificador");
$sql->execute($delAviso);

if ($sql->rowCount() > 0) {
	header("location: index.php");
} else {
	echo "<br><br><br>ERRO NOVO!!!!!";
}
?>