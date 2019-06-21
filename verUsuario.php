<?php
session_start();
require 'validaLogin.php';
include 'conectaDB.php';
include 'menu.php';
if (@$_SESSION['nivel'] == 1) {
	?>
	<?php
	$rsUsuario = $pdo->prepare("SELECT * from tb_usuario");
	echo "<br><br>";

	if ($rsUsuario->execute()) {
		if ($rsUsuario->rowCount() > 0) {
			while ($mostraUsuario = $rsUsuario->fetch(PDO::FETCH_OBJ)) {
				?>
				<p><div><center>

					<div class="card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title"><?php echo "<h3>ID: {$mostraUsuario->id}</h3>"; ?></h5>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo "Nome: {$mostraUsuario->nome}"; ?></h6>
							<h7 class="card-text"><?php echo "Usuario: {$mostraUsuario->login}"; ?></h7><br>
							<h7 class="card-text"><?php echo "Nivel: {$mostraUsuario->nivel}"; ?></h7>
						</div>
						<table>
							<form action="QDelUsuario.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraUsuario->id ?>">
								<button class="btn btn-danger" type='submit'>Deletar</button>
							</form>
							<form action="editaUsuario.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraUsuario->id ?>">
								<button class="btn btn-warning" type='submit'>Alterar</button>
							</form>
						</div>
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