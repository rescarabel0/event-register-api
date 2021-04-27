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

            (isset($data['startHour']) ? $data['startHour'] : null),
            (isset($data['startMinute']) ? $data['startMinute'] : null),
            (isset($data['startSeconds']) ? $data['startSeconds'] : null),

            (isset($data['endHour']) ? $data['endHour'] : null),
            (isset($data['endMinute']) ? $data['endMinute'] : null),
            (isset($data['endSeconds']) ? $data['endSeconds'] : null),
            
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

        if ($event->getStartHour() == null && $event->getStartMinute() == null && $event->getStartSeconds() == null) {
            return "invalid start time";
        }
        if ($event->getEndHour() == null && $event->getEndMinute() == null && $event->getEndSeconds() == null) {
            return "invalid end time";
        }

        if ($event->getUserId() <= 0) {
            return "invalid user id";
        }
        return "";
    }
}