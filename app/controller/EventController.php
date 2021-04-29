<?php

namespace app\controller;
use app\entity\Event;
use app\model\EventModel;

class EventController{
    private $eventModel;

    function __construct(){
        $this->eventModel = new EventModel();
    }
    
    function insert($data = null){
        $event = $this->convertDataToEventJson($data);
        $result = $this->validate($event);

        if ($result != "") {
            echo json_encode(["erro" => $result]);
        }
        
        if($this->eventModel->create($event) == "ok"){
            echo "ok";
        } else {
            echo "error";
        }
    }

    function updateEvent($data = null, $id = 0){
        $event = $this->convertDataToEventJson($data);
        $event->setId($id);
        return $this->eventModel->edit($event, $id);
    }

    function delete($id = 0){
        return json_encode(["name" => "delete"]);
    }

    function getAll(){
        return $this->eventModel->list();
    }

    function getById($id = 0){
        return $this->eventModel->listId($id);
    }

    private function convertDataToEventJson($data){
        return new Event(
            null,
            (isset($data['titulo']) ? $data['titulo'] : null),
            (isset($data['descricao']) ? $data['descricao'] : null),
            (isset($data['userId']) ? $data['userId'] : null),

            (isset($data['start']) ? $data['start'] : null),
            
            (isset($data['end']) ? $data['end'] : null)           
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

        if ($event->getStart() == null) {
            return "invalid start time";
        }
        if ($event->getEnd() == null || $event->getEnd() > $event->getStart()) {
            return "invalid end time";
        }

        return "";
    }
}