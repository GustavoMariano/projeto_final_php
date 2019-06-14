<?php

include 'conectaDB.php';

$localizaUsuario = $pdo->prepare("SELECT * from tb_usuario where login = :login and senha = :password ");
$localizaUsuario->bindValue(':login', $_POST['usuario'], PDO::PARAM_STR);
$localizaUsuario->bindValue(':password', $_POST['senha'], PDO::PARAM_STR);
$localizaUsuario->execute();
$nivelUsuario = $localizaUsuario->fetch();

if ($nivelUsuario) {
    session_start();
    $_SESSION['autor'] = $nivelUsuario['nome'];
    $_SESSION['nivel'] = $nivelUsuario['nivel'];
    header("location: index.php");
} else {
    echo "Usuário Inválido!";
    header("location: login.php");
}