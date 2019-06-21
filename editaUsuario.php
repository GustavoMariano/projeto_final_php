<?php
session_start();
require 'validaLogin.php';
include 'conectaDB.php';
include 'menu.php';
if (@$_SESSION['nivel'] == 1) {
	?>
	<center>
		<p> <h3> ID DO USUARIO A SER EDITADO: <?php echo @$_POST['levaId']; ?>
	</h3>
</p>
<form action="QEditUsuario.php" method="POST">

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

	<input name="levaId" type="hidden" value="<?php echo @$_POST['levaId']; ?>" />

	<p>
		<input type="submit" name="AddUsuario">
	</p>
</form>
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