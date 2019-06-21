<?php
session_start();
require 'validaLogin.php';
include 'conectaDB.php';
include 'menu.php';
if (@$_SESSION['nivel'] == 1) {
	?>
	<?php
	$rsUsuario = $pdo->prepare("SELECT * from tb_usuario");


	if ($rsUsuario->execute()) {
		if ($rsUsuario->rowCount() > 0) {
			while ($mostraUsuario = $rsUsuario->fetch(PDO::FETCH_OBJ)) {
				echo "<p><div><center>";
				echo "<p>ID: {$mostraUsuario->id}</p>";
				echo "<p>NOME: {$mostraUsuario->nome}</p>";
				echo "<p>USUÁRIO: {$mostraUsuario->login}</p>";
				echo "<p>NIVEL: {$mostraUsuario->nivel}</p>";
				echo "</p>";

				?>
				<br>
				<form action="QDelUsuario.php" method="POST">
					<input type="hidden" name="levaId" value="<?php echo $mostraUsuario->id ?>">
					<button type='submit'>Deletar</button>
				</form>
				<form action="editaUsuario.php" method="POST">
					<input type="hidden" name="levaId" value="<?php echo $mostraUsuario->id ?>">
					<button type='submit'>Alterar</button>
				</form>
				<br><br>
				<?php

			}
		}
	}
}
else{
	?>
	<br><br>
	<center> <h1> Você não possui as permissões necessárias para acessar essa pagina!</h1>
	</center>
	<?php
}