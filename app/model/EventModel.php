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
        $this->save();
        return "ok";
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

        $sql = "select count(*) as total from event where titulo = '$titulo'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['total'] == 1) {
            $sql = "UPDATE event SET userId = '$userId', titulo = '$titulo', descricao = '$descricao', start = '$start', end = '$end' WHERE titulo = '$titulo'";
            if ($conexao->query($sql) === True) {
                $_SESSION['event_updated'] = true;
            }
            $conexao->close();
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