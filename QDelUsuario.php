<?php
include 'conectaDB.php';

$delUsuario=array(
	'id' => $_POST['levaId']);

$sql = $pdo->prepare("DELETE FROM tb_usuario WHERE id = :id");
$sql->execute($delUsuario);

if ($sql->rowCount() > 0) {
	header("location: index.php");
} else {
	echo "<br><br><br>ERRO NOVO!!!!!";
}
?>