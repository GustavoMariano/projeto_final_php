<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>	
<?php
session_start();
require 'validaLogin.php';
include 'conectaDB.php';
include 'menu.php';
if (@$_SESSION['nivel'] == 1) {
	?>
	<center>
		<h1> ADICIONAR USUÁRIO: </h1>
		<br><br>

		<form action="QAddUsuario.php" method="POST">

			<p>Nome: <br>
				<input type="text" name="nome" required="" >
			</p>

			<p>User: <br>
				<input type="text" name="usuario" required="" >
			</p>

			<p>Senha: <br>
				<input type="password" name="senha" required="" >
			</p>

			<p>Nivel de conta: <br>
				<select name='nivel' required="" placeholder=""> 
					<option value="1"> ADMINISTRADOR GERAL</option>
					<option value="2"> ADMINISTRADOR DE NOTICIAS</option>
					<option value="3"> ADMINISTRADOR DE AVISOS</option>
				</select>
			</p>

			<p>
				<button class="btn btn-success" input type="submit" name="AddUsuario">ADICIONAR</button>
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