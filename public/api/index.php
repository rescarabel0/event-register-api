<?php
require_once("../../vendor/autoload.php");

// HEADER BASICS

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,DELETE");
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

if (array_key_exists('id', $data)) {
    $id = $data['id'];
}



$userEventController = new \app\controller\EventController();
switch ($method) {

    case 'GET':
        if ($controller != null && $id == null) {
            echo $userEventController->getAll();
        }
        else if ($controller != null && $id != null) {
            echo $userEventController->getById($id);
        }
        else echo json_encode(["erro" => "true"]);
        break;

    case 'POST':
        if ($controller != null && $id == null) {
            echo $userEventController->insert($data);
        } else if ($controller != null && $id != null){
            echo $userEventController->updateEvent($data, $id);
        }
        else echo json_encode(["erro" => "true"]);
        break;

    case 'DELETE':
        echo $userEventController->delete($id);
        break;
    
    default:
        echo json_encode(["erro" => "true"]);
        break;
}



?>