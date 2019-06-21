<?php
session_start();
require 'validaLogin.php';
include 'conectaDB.php';
include 'menu.php';
if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 3) {
	?>
	<center>
		<h1>EDITAR AVISO:</h1>
		<br><br>
		<form action="QEditAviso.php" method="POST">

			<p> <h3> ID DO AVISO A SER EDITADO: <?php echo $_POST['levaId']; ?>
		</h3>
	</p>
	<p>Titulo: <br>
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


	<input name="levaId" type="hidden" value="<?php echo $_POST['levaId']; ?>" />
	<br>
	<p>
		<input type="submit" name="btnEditAviso">
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