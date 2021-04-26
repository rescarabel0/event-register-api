<?php

namespace app\controller;
use app\entity\Event;

class EventController{

    function create($data = null){
        $event = $this->convertDataToEventJson($data);
        var_dump($event);
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

    private function convertDataToEventJson($data){
        return new Event(
            null,
            (isset($data['titulo']) ? $data['titulo'] : null),
            (isset($data['descricao']) ? $data['descricao'] : null),
            (isset($data['data']) ? $data['data'] : null),
            (isset($data['userId']) ? $data['userId'] : null),
        );
    }
    
}