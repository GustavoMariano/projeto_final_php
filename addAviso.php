<?php
include 'conectaDB.php';
include 'menu.php';
?>
<br><br>
<center>
	<h1>ADICIONAR AVISO:</h1>
	<br><br>
	<form action="QAddAviso.php" method="POST">
		<p>Aviso: <br>
			<input type="text" name="aviso" required="" >
		</p>

		<p>
			Data que vai ao ar:<br>
			<input type="text" name="data_entra_ar" maxlength="19" value="<?php echo date("d/m/Y H:i:s")?>">
		</p>

		<p>
			Data que sai do ar:<br>
			<input type="text" name="data_sai_ar" maxlength="19" value="<?php echo date("d/m/Y H:i:s")?>">
		</p>

		<br>
		<p>
			<input type="submit" name="btnAddAviso">
		</p>
	</form>
</center>
