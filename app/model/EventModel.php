<?php
namespace app\model;
session_start();
include '../../app/dbApp/conection.php';

use app\entity\Event;

class EventModel{
    private $data;
    private $eventList = [];
    
    function __construct(){
        $this->data = "";
    }

    function create(Event $event){
        $this->eventList[] = $event;
        if($this->save() != "erro")
            return "ok";
        else 
            return "erro";
    }

    function update(Event $event, $id){

    }

    private function save(){
        $temp;

        foreach ($this->eventList as $e) {
            $temp = array(
                "titulo" => $e->getTitulo(),
                "descricao" => $e->getDescricao(),
                "start" => $e->getStart(),
                "end" => $e->getEnd(),
                "userId" => $e->getUserId()
            );
        }

        $string = json_encode($temp);

        $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

        $titulo = mysqli_real_escape_string($conexao, trim($temp['titulo']));
        $descricao = mysqli_real_escape_string($conexao, trim($temp['descricao']));
        $userId = mysqli_real_escape_string($conexao, $temp['userId']);
        $start = mysqli_real_escape_string($conexao, $temp['start']);
        $end = mysqli_real_escape_string($conexao, $temp['end']);

        $sql = "select count(*) as total from event where titulo = '$titulo' and descricao = '$descricao' and start = '$start' and end = '$end'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['total'] == 1) {
            return "erro";
        } else {
            $sql = "INSERT INTO event (userId, titulo, descricao, start, end) VALUES ('$userId','$titulo','$descricao', '$start', '$end')";
            if ($conexao->query($sql) === True) {
                $_SESSION['evento_cadastrado'] = true;
            }
            $conexao->close();
        }

        
    }
    private function load(){

    }
}