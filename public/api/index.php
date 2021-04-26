<?php
require_once("../../vendor/autoload.php");

// HEADER BASICS

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//============

$controller = null;
$id = null;
$data = null;
$method = $_SERVER["REQUEST_METHOD"]; //POST, PUT, GET ou DELETE

$uri = $_SERVER["REQUEST_URI"];
$auxCounter = 2;

//TRATAMENTO DE URI
$ex = explode("/", $uri);

for($i = 0; $i < $auxCounter; $i++){
    unset($ex[$i]);
}

if (isset($ex[0])) {
    $controller = $ex[0];
}
if (isset($ex[1])) {
    $id = $ex[1];
}

$ex = array_filter(array_values($ex));

parse_str(file_get_contents('php://input'), $data); 
echo json_encode(["controller" => $controller, "id" => $id]);

?>