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

parse_str(file_get_contents('php://input'), $data); 
//TRATAMENTO DE URI
$ex = explode("/", $uri);

for($i = 0; $i < $auxCounter; $i++){
    unset($ex[$i]);
}

$ex = array_filter(array_values($ex));

if (isset($ex[0])) {
    $controller = $ex[0];
}
if (isset($ex[1])) {
    $id = $ex[1];
}

$userEventController = new \app\controller\EventController();
switch ($method) {

    case 'GET':
        if ($controller != null && $id == null) {
            echo $userEventController->getAll();
        }
        else echo json_encode(["erro" => "true"]);
        break;

    case 'POST':
        if ($controller != null && $id == null) {
            echo $userEventController->insert($data);
        }
        else echo json_encode(["erro" => "true"]);
        break;

    case 'PUT':
        if ($controller != null && $id != null) {
            echo $userEventController->update($id, $data);
        }
        else echo json_encode(["erro" => "true"]);
        break;

    case 'DELETE':
        if ($controller != null && $id != null) {
            echo $userEventController->delete($id);
        }
        else echo json_encode(["erro" => "true"]);
        break;
    
    default:
        echo json_encode(["erro" => "true"]);
        break;
}



?>