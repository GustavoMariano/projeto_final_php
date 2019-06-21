<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>	
<?php
session_start();
require 'validaLogin.php';
include 'conectaDB.php';
include 'menu.php';
if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 3) {
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
				<button class="btn btn-success" input type="submit" name="btnAddAviso">ADICIONAR</button>
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