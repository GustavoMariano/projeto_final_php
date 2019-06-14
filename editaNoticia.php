<?php
include 'conectaDB.php';
include 'menu.php';
?>
<center>
	<h1>EDITAR AVISO:</h1>
	<br><br>
	<form action="QEditNoticia.php" method="POST" enctype="multipart/form-data">

		<p> <h3> ID DA NOTICIA A SER EDITADA: <?php echo $_POST['levaId']; ?>
		</h3>
		</p>
		<p>Titulo: <br>
			<input type="text" name="titulo" required="" >
		</p>

		<p>Resumo: <br>
			<input type="text" name="resumo" required="" >
		</p>

		<p>
			Texto:
			<br>
			<textarea name="texto" rows="10" cols="100" maxlength="1000" required=""> </textarea>
		</p>

		<p>
			Data que vai ao ar:<br>
			<input type="text" name="data_entra_ar" maxlength="19" value="<?php echo date("d/m/Y H:i:s")?>">
		</p>

		<p>
			Data que sai do ar:<br>
			<input type="text" name="data_sai_ar" maxlength="19" value="<?php echo date("d/m/Y H:i:s")?>">
		</p>


		<p>
			<input type="file" name="imagem" required="" />
		</p>

		<input name="levaId" type="hidden" value="<?php echo $_POST['levaId']; ?>" />
		<br>
		<p>
			<input type="submit" name="btnEditNoticia">
		</p>
	</form>
</center>