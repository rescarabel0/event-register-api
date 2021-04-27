<?php
session_start();
include('../../app/db.app/conection.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: ../index.html');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = mysqli_real_escape_string($conexao, $_POST['password']);

$query = "select usuario_id, username from users where username = '{$usuario}' and password = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
$row_b = mysqli_fetch_array($result);

if($row == 1) {
    $_SESSION['user'] = $usuario;
    $_SESSION['usuario_id'] = $row_b[0];
    $_SESSION['autenticado'] = true;

    header('Location: ../index.html');
    exit();
} else {
    $_SESSION['autenticado'] = false;
    header('Location: ../index.html');
    exit(1);
}