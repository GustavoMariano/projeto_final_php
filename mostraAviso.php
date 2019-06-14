<?php
include 'conectaDB.php';
include 'menu.php';

$ver_aviso = array(
	':id' => $_GET['idAviso']
);
echo "<br><br>";
$rs = $pdo->prepare("SELECT * FROM `tb_aviso` WHERE id=:id");
$rs->execute($ver_aviso);
$verAviso = $rs->fetch();

?> <center><h1><?php echo $verAviso['aviso']; ?> </h1><?php 
?> <h6><?php echo $verAviso['responsavel']." ---- ".$verAviso['data_entra_ar'];?> </h6></center><?php 

?>

