<?php

namespace app\controller;
use app\entity\Event;

class EventController{

    function create($data = null){
        return json_encode(["name" => "create"]);
    }

    function update($data = null, $id = 0){
        return json_encode(["name" => "update"]);
    }

    function delete($id = 0){
        return json_encode(["name" => "delete"]);
    }

    function getById($id = 0){
        return json_encode(["name" => "getbyid - {$id}"]);
    }

    function getAll(){
        return json_encode(["name" => "getall"]);
    }


    
}