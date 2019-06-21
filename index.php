	
<?php
session_start();
?>
<center>
	<?php
	include 'conectaDB.php';
	include 'menu.php';
	if (@$_SESSION['nivel'] == 1) {
		?>
		<a href="editaMenu.php"><button type='submit'>Editar Site</button></a>
		<a href="addUsuario.php"><button type='submit'>Adicionar Usuário</button></a>
		<a href="verUsuario.php"><button type='submit'>Ver Usuários</button></a>
		<?php
	}
	?>
</center>
<div class="container">
	<div class="row">
		<br>

		<div class="col-9" id="coluna_esquerda">
			<center>
				<h1>Notícias</h1> 
				<?php if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 2) {?>
					<button><a href="addNoticia.php">Adicionar Noticia</a></button>					
				<?php } ?>
			</center>


			<?php
			if (@$_SESSION['nivel'] == 1) {
				$rsNoticia = $pdo->prepare("SELECT * from tb_noticia order by id DESC");
			} else {
				$rsNoticia = $pdo->prepare("SELECT * FROM tb_noticia WHERE (data_entra_ar <= CURRENT_TIMESTAMP AND data_sai_ar > CURRENT_TIMESTAMP)");
			}

			if ($rsNoticia->execute()) {
				if ($rsNoticia->rowCount() > 0) {
					while ($mostraNoticia = $rsNoticia->fetch(PDO::FETCH_OBJ)) {
						echo "<p><div><center>";
						echo "<h3><a href='mostraNoticia.php?idNoticia=$mostraNoticia->id'>{$mostraNoticia->titulo}</h3></a>";
						echo "<p>{$mostraNoticia->resumo}</p>";
						echo "<p>{$mostraNoticia->data_entra_ar}</p>";
						echo "</p>";


						if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 2) {
							?>
							<form action="editaNoticia.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraNoticia->id ?>">
								<button type='submit'>Alterar</button>
							</form>

							<form action="QDelNoticia.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraNoticia->id ?>">
								<button type='submit'>Deletar</button>
							</form>

							<?php
						}

						echo "</div>";
					}
				}
			}
			?>

		</div>
	</div>

	<div class="col-3" id="coluna_direita">
		<center>
			<h2>Avisos</h2>
			<?php if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 3) {?>
				<button class="btn btn-secondary"><a href="addAviso.php">Adicionar Aviso</a></button>					
			<?php } ?>
		</center>

		<div>
			<?php
			if (@$_SESSION['nivel'] == 1) {
				$rs2 = $pdo->prepare("SELECT * from tb_aviso order by id DESC");
			} else {
				$rs2 = $pdo->prepare("SELECT * FROM tb_aviso WHERE (data_entra_ar <= CURRENT_TIMESTAMP AND data_sai_ar > CURRENT_TIMESTAMP) order by id desc LIMIT 5");
			}

			if ($rs2->execute()) {
				if ($rs2->rowCount() > 0) {
					while ($mostraAvisos = $rs2->fetch(PDO::FETCH_OBJ)) {
						echo "<p><div><center>";
						echo "<h3><a href='mostraAviso.php?idAviso=$mostraAvisos->id'>{$mostraAvisos->aviso}</h3></a>";
						echo "<p>{$mostraAvisos->data_entra_ar}</p>";
						echo "</p>";

						if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 3) {
							?>
							<form action="editaAviso.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraAvisos->id ?>">
								<button type='submit'>Alterar</button>
							</form>

							<form action="QDelAviso.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraAvisos->id ?>">
								<button type='submit'>Deletar</button>
							</form>
							<?php
						}							
						echo "</div>";
					}
				}
			}
			?>
		</div>
	</div>

</div>
<br>

</body>
</html>