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

	$qatnot = array(
		':id' => $_POST['levaId']
	);

	$rs = $pdo->prepare("SELECT * FROM `tb_usuario` WHERE id=:id");
	$rs->execute($qatnot);
	$qatnot = $rs->fetch(PDO::FETCH_OBJ);
	?>
	<center>
		<p> <h3> ID DO USUARIO A SER EDITADO: <?php echo @$_POST['levaId']; ?>
	</h3>
</p>
<form action="QEditUsuario.php" method="POST">

	<p>Nome: <br>
		<input type="text" name="nome" required="" value="<?php echo $qatnot->nome ?>" >
	</p>

	<p>User: <br>
		<input type="text" name="usuario" required="" value="<?php echo $qatnot->login ?>" >
	</p>

	<p>Senha: <br>
		<input type="password" name="senha" required="" value="<?php echo $qatnot->senha ?>" >
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
		<button class="btn btn-success" input type="submit" name="AddUsuario">ATUALIZAR</button>
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