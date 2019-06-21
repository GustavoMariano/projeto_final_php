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
		?>
		<br><br>
		<h1>EDITAR SITE</h1>
		<br><br>
		<form action="QAddMenu.php" method="POST" enctype="multipart/form-data">
			<p>Nome: <br>
				<input type="text" name="nome" required="" >
			</p>

			<p>Telefone: <br>
				<input type="text" name="telefone" maxlength="19" required="" >
			</p>

			<p>E-Mail: <br>
				<input type="email" name="email" required="" >
			</p>

			<p><br>
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