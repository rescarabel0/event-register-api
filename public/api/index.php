<?php
require_once("../../vendor/autoload.php");

// HEADER BASICS

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF=-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//============

$controller = null;
$id = null;
$data = null;
$method = $_SERVER["REQUEST_METHOD"]; //POST, PUT, GET ou DELETE

echo json_encode(["type" => $method]);

?>