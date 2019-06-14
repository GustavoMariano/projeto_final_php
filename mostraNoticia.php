<?php
include 'conectaDB.php';
include 'menu.php';

$ver_noticia = array(
	':id' => $_GET['idNoticia']
);
echo "<br><br>";
$rs = $pdo->prepare("SELECT * FROM `tb_noticia` WHERE id=:id");
$rs->execute($ver_noticia);
$verNoticia = $rs->fetch();

?> <center><h1><?php echo $verNoticia['titulo']; ?> </h1><?php 
?> <img src="<?php echo $verNoticia['imagem']; ?>"width="700" height="475"><?php 
?> <h3><?php echo $verNoticia['texto']; ?> </h3><?php 
?> <h6><?php echo $verNoticia['responsavel']." ---- ".$verNoticia['data_entra_ar'];?> </h6></center><?php 

?>