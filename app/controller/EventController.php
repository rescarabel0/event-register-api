<?php

namespace app\controller;
use app\entity\Event;

class EventController{

    function insert($data = null){
        $event = $this->convertDataToEventJson($data);
    }

    function update($data = null, $id = 0){
        $event = $this->convertDataToEventJson($data);
        $event->setId($id);
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
            (isset($data['dataDay']) ? $data['dataDay'] : null),
            (isset($data['dataMonth']) ? $data['dataMonth'] : null),
            (isset($data['dataYear']) ? $data['dataYear'] : null),
            (isset($data['userId']) ? $data['userId'] : null),
        );
    }
    
    private function validate(Event $event, $update = false){

        if ($update && $event->getId() <= 0) {
            return json_encode(["error" => "true"]);
        }

        if (strlen($event->getTitulo()) <= 3 || strlen($event->getTitulo()) > 100) {
            return json_encode(["error" => "true"]);
        }

        if (strlen($event->getDescricao()) < 10 || strlen($event->getDescricao()) > 250) {
            return json_encode(["error" => "true"]);
        }

        if ($event->getDataDay() <= 0 || $event->getDataDay() > 31) {
            return json_encode(["error" => "true"]);
        }
        if ($event->getDataMonth() <= 0 || $event->getDataMonth() > 12) {
            return json_encode(["error" => "true"]);
        }
        if ($event->getDataYear() < 2021) {
            return json_encode(["error" => "true"]);
        }

        if ($event->getUserId() <= 0) {
            return json_encode(["error" => "true"]);
        }
    }
}