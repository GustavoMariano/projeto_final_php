<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>	
<center>
	<?php
	session_start();
	require 'validaLogin.php';
	include 'conectaDB.php';
	include 'menu.php';
	if (@$_SESSION['nivel'] == 1) {

		$rs = $pdo->prepare("SELECT * FROM `tb_site` WHERE id=1");
		$rs->execute();
		$qedmenu = $rs->fetch(PDO::FETCH_OBJ);
		?>
		<br><br>
		<h1>EDITAR SITE</h1>
		<br><br>
		<form action="QAddMenu.php" method="POST" enctype="multipart/form-data">
			<p>Nome: <br>
				<input type="text" name="nome" required="" value="<?php echo $qedmenu->nome ?>">
			</p>

			<p>Telefone: <br>
				<input type="text" name="telefone" maxlength="19" required="" value="<?php echo $qedmenu->telefone ?>" >
			</p>

			<p>E-Mail: <br>
				<input type="email" name="email" required="" value="<?php echo $qedmenu->email ?>">
			</p>

			<p><br>
				<img src="<?php echo $qedmenu->logo ?>"width="125" height="100">
				<input type="file" name="imagem" required="" />
			</p>

			<br>
			<p><br>
				<button class="btn btn-success" input type="submit" name="btnEditMenu">ATUALIZAR </button>
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