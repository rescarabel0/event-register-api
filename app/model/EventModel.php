<?php
namespace app\model;
session_start();
include '../../app/dbApp/conection.php';

use app\entity\Event;

class EventModel{
    private $data;
    private $eventList = [];
    private $eventEdit = [];
    
    function __construct(){
        $this->data = "";
    }

    function create(Event $event){
        $this->eventList[0] = $event;
        if($this->save() != "erro")
            echo "ok";
        else 
            echo "erro";
    }

    function edit(Event $event, $id = 0){
        $this->eventEdit[] = $event;
        $this->update($event, $id);
        
    }

    function list(){
        $this->load();
    }

    function listId($id){
        $this->loadById($id);
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
        $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
        $idUser = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 1;
        $eventos = "SELECT * from event where userId = '$idUser'";
        $res = mysqli_query($conexao, $eventos);
        $row = mysqli_fetch_all($res);

        $temp;
        
        foreach ($row as $e) {
            $temp[] = array(
                "id" => $e[0],
                "userId" => $e[1],
                "titulo" => $e[2],
                "descricao" => $e[3],
                "start" => $e[4],
                "end" => $e[5]
            );
        }
        echo json_encode($temp);
    }

    private function loadById($id){
        $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
        $idUser = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 1;
        
        $eventos = "SELECT * from event where userId = '$idUser' and id = '$id'";
        $res = mysqli_query($conexao, $eventos);
        $row = mysqli_fetch_all($res);

        $temp;

        foreach ($row as $e) {
            $temp[] = array(
                "id" => $e[0],
                "userId" => $e[1],
                "titulo" => $e[2],
                "descricao" => $e[3],
                "start" => $e[4],
                "end" => $e[5]
            );
        }

        echo json_encode($temp);
    }

    private function update(Event $event, $id){
        $temp;
        

        foreach ($this->eventEdit as $e) {
            $temp[] = array(
                "titulo" => $e->getTitulo(),
                "descricao" => $e->getDescricao(),
                "start" => $e->getStart(),
                "end" => $e->getEnd(),
                "userId" => $e->getUserId(),
                "id" => $e->getId()
            );
        }

        $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

        $titulo = mysqli_real_escape_string($conexao, trim($temp[0]['titulo']));
        $descricao = mysqli_real_escape_string($conexao, trim($temp[0]['descricao']));
        $userId = mysqli_real_escape_string($conexao, $temp[0]['userId']);
        $start = mysqli_real_escape_string($conexao, $temp[0]['start']);
        $end = mysqli_real_escape_string($conexao, $temp[0]['end']);
        $idEvento = $temp[0]['id'];
        $sql = "select count(*) as total from event where id = '$idEvento' and userId = '$userId'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['total'] == 1) {
            $sql = "UPDATE event SET titulo = '$titulo', descricao = '$descricao', start='$start', end='$end' WHERE userId='$userId' and id='$idEvento'";
            if ($conexao->query($sql) === True) {
                echo "foi";
            } else {
                exit();
            }
            $conexao->close();
        } 
    }
}

