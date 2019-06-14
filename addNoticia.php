<?php
include 'conectaDB.php';
include 'menu.php';
?>
<br><br>
<center>
	<h1>ADICIONAR NOTICIA:</h1>
	<br><br>
	<form action="QAddNoticia.php" method="POST" enctype="multipart/form-data">
		<p>Titulo: <br>
			<input type="text" name="titulo" required="" >
		</p>

		<p>Resumo: <br>
			<input type="text" name="resumo" maxlength="255" required="" >
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

		<br>
		<p>
			<input type="submit" name="btnAddNoticia">
		</p>
	</form>
</center>
