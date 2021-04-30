<?php
session_start();
include('../../app/dbApp/conection.php');

$usuario = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = mysqli_real_escape_string($conexao, $_POST['password']);

$query = "select usuario_id, username from users where username = '{$usuario}' and password = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
$row_b = mysqli_fetch_array($result);

if($row == 1) {
    
    $_SESSION['usuario_id'] = $row_b[0];
    $_SESSION['autenticado'] = true;
    
    $status = array(
        'status' => 'ok'
    );
    if (isset($_POST)) echo json_encode($status); exit;
} else {
    $status = array(
        'status' => 'error'
    );
    if (isset($_POST)) echo json_encode($status); return;
}