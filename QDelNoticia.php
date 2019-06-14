<?php
include 'conectaDB.php';

$delNoticia=array(
	'identificador' => $_POST['levaId']);

$sql = $pdo->prepare("DELETE FROM tb_noticia WHERE id = :identificador");
$sql->execute($delNoticia);

if ($sql->rowCount() > 0) {
	header("location: index.php");
} else {
	echo "<br><br><br>ERRO NOVO!!!!!";
}
?>