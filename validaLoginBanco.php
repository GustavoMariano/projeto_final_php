<?php

include 'conectaDB.php';

$localizaUsuario = $pdo->prepare("SELECT * from tb_usuario where login = :login and senha = :password ");
$localizaUsuario->bindValue(':login', $_POST['usuario'], PDO::PARAM_STR);
$localizaUsuario->bindValue(':password', $_POST['senha'], PDO::PARAM_STR);
$localizaUsuario->execute();
$nivelUsuario = $localizaUsuario->fetch();

if (isset($_SESSION['nivel'])) { //verifica se a sessão já não estava aberta e destrói a sessão

session_start();
$_SESSION = array();
session_unset();
session_destroy();

}

if ($nivelUsuario) {
    session_start();
    $_SESSION['autor'] = $nivelUsuario['nome'];
    $_SESSION['nivel'] = $nivelUsuario['nivel'];
    header("location: index.php");
    if ($_SESSION['nivel'] == '1') {
    	$_SESSION['admin'] = 'admin';
    }
    elseif ($_SESSION['nivel'] == '2') {
    	$_SESSION['noticia'] = 'noticia';
    }
    elseif ($_SESSION['nivel'] == '3') {
    	$_SESSION['aviso'] = 'aviso';
    }
} else {
    echo "Usuário Inválido!";
    header("location: login.php");
}