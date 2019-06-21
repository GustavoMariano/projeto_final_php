<?php
session_start();
require 'validaLogin.php';
include 'conectaDB.php';
include 'menu.php';

if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 2) {

	$qatnot = array(
		':id' => $_POST['levaId']
	);

	$rs = $pdo->prepare("SELECT * FROM `tb_noticia` WHERE id=:id");
	$rs->execute($qatnot);
	$qatnot = $rs->fetch(PDO::FETCH_OBJ);

	?>
	<center>
		<h1>EDITAR AVISO:</h1>
		<br><br>
		<form action="QEditNoticia.php" method="POST" enctype="multipart/form-data">

			<p> <h3> ID DA NOTICIA A SER EDITADA: <?php echo $_POST['levaId']; ?>
		</h3>
	</p>
	<p>Titulo: <br>
		<input type="text" name="titulo" required="" value="<?php echo $qatnot->titulo ?>">
	</p>

	<p>Resumo: <br>
		<input type="text" name="resumo" required="" value="<?php echo $qatnot->resumo ?>">
	</p>

	<p>
		Texto:
		<br>
		<textarea name="texto" rows="10" cols="100" maxlength="1000" required=""><?php echo $qatnot->texto ?> </textarea>
	</p>

	<p>
		Data que vai ao ar:<br>
		<input type="text" name="data_entra_ar" maxlength="19" value="<?php echo $qatnot->data_entra_ar ?>">
	</p>

	<p>
		Data que sai do ar:<br>
		<input type="text" name="data_sai_ar" maxlength="19" value="<?php echo $qatnot->data_sai_ar ?>">
	</p>


	<p>
		<input type="file" name="imagem" required=""/>
	</p>

	<input name="levaId" type="hidden" value="<?php echo $_POST['levaId']; ?>" />
	<br>
	<p>
		<input type="submit" name="btnEditNoticia">
	</p>
</form>
</center>
<?php
}
else{
	?>
	<br><br>
	<center> <h1> Você não possui as permissões necessárias para acessar essa pagina!</h1>
	</center>
	<?php
}
?>