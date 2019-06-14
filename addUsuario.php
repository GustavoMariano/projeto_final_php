<?php
include 'conectaDB.php';
include 'menu.php';
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
			<input type="submit" name="AddUsuario">
		</p>
	</form>
</center>