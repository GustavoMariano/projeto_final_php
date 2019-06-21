<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>	
<body>
	<?php
	session_start();
	?>
	<center>
		<?php
		include 'conectaDB.php';
		include 'menu.php';
		if (@$_SESSION['nivel'] == 1) {
			?>
			<a href="editaMenu.php"><button class="btn btn-primary" type='submit'>Editar Site</button></a>
			<a href="addUsuario.php"><button class="btn btn-primary" type='submit'>Adicionar Usuário</button></a>
			<a href="verUsuario.php"><button class="btn btn-primary" type='submit'>Ver Usuários</button></a>
			<?php
		}
		?>
	</center>
	<dl class="row">
		<dl class="col-sm-8">
			<center>
				<h1>Notícias</h1> 
				<br><br>
				<?php if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 2) {?>
					<button class="btn btn-info"><a href="addNoticia.php">Adicionar Noticia</a></button>					
				<?php } ?>
			</center>


			<?php
			if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 2) {
				$rsNoticia = $pdo->prepare("SELECT * from tb_noticia order by id DESC");
			} else {
				$rsNoticia = $pdo->prepare("SELECT * FROM tb_noticia WHERE (data_entra_ar <= CURRENT_TIMESTAMP AND data_sai_ar > CURRENT_TIMESTAMP) order by id DESC");
			}

			if ($rsNoticia->execute()) {
				if ($rsNoticia->rowCount() > 0) {
					while ($mostraNoticia = $rsNoticia->fetch(PDO::FETCH_OBJ)) {
						echo "<p><center>";
						echo "<h3><a href='mostraNoticia.php?idNoticia=$mostraNoticia->id'>{$mostraNoticia->titulo}</h3></a>";
						echo "<p>{$mostraNoticia->resumo}</p>";
						echo "<p>{$mostraNoticia->data_entra_ar}</p>";
						echo "</p><br>";


						if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 2) {
							?>
							<form action="editaNoticia.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraNoticia->id ?>">
								<button class="btn btn-warning" type='submit'>Alterar</button>
							</form>

							<form action="QDelNoticia.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraNoticia->id ?>">
								<button class="btn btn-danger" type='submit'>Deletar</button>
							</form>

							<?php
						}

					}
				}
			}
			?>
		</dl>
		<span class="border-left"></span>
		<dl class="col-sm-3">

			<center>
				<h1>Avisos</h1>
				<br><br>
				<?php if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 3) {?>
					<button class="btn btn-info"><a href="addAviso.php">Adicionar Aviso</a></button>					
				<?php } ?>
			</center>


			<?php
			if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 3) {
				$rs2 = $pdo->prepare("SELECT * from tb_aviso order by id DESC");
			} else {
				$rs2 = $pdo->prepare("SELECT * FROM tb_aviso WHERE (data_entra_ar <= CURRENT_TIMESTAMP AND data_sai_ar > CURRENT_TIMESTAMP) order by id desc");
			}

			if ($rs2->execute()) {
				if ($rs2->rowCount() > 0) {
					while ($mostraAvisos = $rs2->fetch(PDO::FETCH_OBJ)) {
						echo "<p><center>";
						echo "<h3><a href='mostraAviso.php?idAviso=$mostraAvisos->id'>{$mostraAvisos->aviso}</h3></a>";
						echo "<p>{$mostraAvisos->data_entra_ar}</p>";
						echo "</p><br>";

						if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 3) {
							?>
							<form action="editaAviso.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraAvisos->id ?>">
								<button class="btn btn-warning" type='submit'>Alterar</button>
							</form>

							<form action="QDelAviso.php" method="POST">
								<input type="hidden" name="levaId" value="<?php echo $mostraAvisos->id ?>">
								<button class="btn btn-danger" type='submit'>Deletar</button>
							</form>
							<?php
						}							
					}
				}
			}
			?>
		</dl>
	</dl>
	<br>

</body>
</html>