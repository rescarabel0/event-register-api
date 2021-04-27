<?php

namespace app\controller;
use app\entity\Event;

class EventController{

    function insert($data = null){
        $event = $this->convertDataToEventJson($data);
        $result = $this->validate($event);

        if ($result != "") {
            echo json_encode(["erro" => $result]);
        }
    }

    function update($data = null, $id = 0){
        $event = $this->convertDataToEventJson($data);
        $event->setId($id);

        $result = $this->validate($event, true);

        if ($result != "") {
            echo json_encode(["erro" => $result]);
        }
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
            return "invalid id";
        }

        if (strlen($event->getTitulo()) <= 3 || strlen($event->getTitulo()) > 100) {
            return "invalid title";
        }

        if (strlen($event->getDescricao()) < 10 || strlen($event->getDescricao()) > 250) {
            return "invalid description";
        }

        if ($event->getStartDay() > 31 || $event->getStartDay() <= 0) {
            return "invalid start day";
        }
        if ($event->getEndDay() > 31 || $event->getEndDay() <= 0) {
            return "invalid end day";
        }
        if ($event->getEndMonth() > 12 || $event->getEndMonth() < 0) {
            return "invalid end Month";
        }
        if ($event->getStartMonth() > 12 || $event->getStartMonth() <= 0) {
            return "invalid start Month";
        }
        if ($event->getStartYear() < 2021) {
            return "invalid start Year";
        }
        if ($event->getEndYear() < 2021) {
            return "invalid end Year";
        }

        if ($event->getUserId() <= 0) {
            return "invalid user id";
        }
        return "";
    }
}