<?php
session_start();
include('../../app/db.app/conection.php');

$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['username']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['password'])));

$sql = "select count(*) as total from users where username = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: index.html');
    exit();
}

$sql = "INSERT INTO users (email, username, password, data_cadastro) VALUES ('$email', '$usuario', '$senha', NOW())";

if($conexao->query($sql) === TRUE) {
    $_SESSION['cadastrado'] = true;
}

$conexao->close();

header('Location: ../index.html');
exit;
?>