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
					<div class="card" style="width: 18rem;">
					<button class="btn btn-info"><a href="addNoticia.php"><font color="white">Adicionar Noticia</font></a></button>	
					</div>				
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
						?>
						<center>
							<div class="card" style="width: 18rem;">
								<div class="card-body">
									<h5 class="card-title"><?php echo "<h3><a href='mostraNoticia.php?idNoticia=$mostraNoticia->id'>{$mostraNoticia->titulo}</h3></a>"; ?></h5>
									<h6 class="card-subtitle mb-2 text-muted"><?php echo "{$mostraNoticia->resumo}"; ?></h6>
									<p class="card-text"><?php echo "{$mostraNoticia->data_entra_ar}"; ?> </p>
								</div>
							</div>

							<?php
							if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 2) {
								?>
								<table>
									<form action="editaNoticia.php" method="POST">
										<input type="hidden" name="levaId" value="<?php echo $mostraNoticia->id ?>">
										<button class="btn btn-warning" type='submit'>Alterar</button>
									</form>
									<form action="QDelNoticia.php" method="POST">
										<input type="hidden" name="levaId" value="<?php echo $mostraNoticia->id ?>">
										<button class="btn btn-danger" type='submit'>Deletar</button>
									</form>
								</table>
							</center>
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
					<div class="card" style="width: 18rem;">
					<button class="btn btn-info"><a href="addAviso.php"><font color="white">Adicionar Aviso</font></a></button>	
					</div>				
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
					while ($mostraAvisos = $rs2->fetch(PDO::FETCH_OBJ)) {?>
						<center>

							<div class="card" style="width: 18rem;">
								<div class="card-body">
									<h5 class="card-title"><?php echo "<h3><a href='mostraAviso.php?idAviso=$mostraAvisos->id'>{$mostraAvisos->aviso}</h3></a>"; ?></h5>
									<p class="card-text"><?php echo "{$mostraAvisos->data_entra_ar}"; ?> </p>
								</div>
							</div>

							<?php
							if (@$_SESSION['nivel'] == 1 || @$_SESSION['nivel'] == 3) {
								?>
								<table>
								<form action="editaAviso.php" method="POST">
									<input type="hidden" name="levaId" value="<?php echo $mostraAvisos->id ?>">
									<button class="btn btn-warning" type='submit'>Alterar</button>
								</form>

								<form action="QDelAviso.php" method="POST">
									<input type="hidden" name="levaId" value="<?php echo $mostraAvisos->id ?>">
									<button class="btn btn-danger" type='submit'>Deletar</button>
								</form>
								</table>
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