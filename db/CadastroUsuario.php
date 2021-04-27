<?php
session_start();
include('conexao.php');

$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: index.html');
    exit();
}

$sql = "INSERT INTO usuario (email, usuario, senha, data_cadastro) VALUES ('$email', '$usuario', '$senha', NOW())";

if($conexao->query($sql) === TRUE) {
    $_SESSION['cadastrado'] = true;
}

$conexao->close();

header('Location: ../public/index.html');
exit;
?>