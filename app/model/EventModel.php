<?php
namespace app\model;
session_start();
include '../../app/dbApp/conection.php';

use app\entity\Event;

class EventModel{
    private $data;
    private $eventList = [];
    private Event $eventEd;
    
    function __construct(){
        $this->data = "";
    }

    function create(Event $event){
        $this->eventList[] = $event;
        if($this->save() != "erro")
            echo "ok";
        else 
            echo "erro";
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
        $idUser = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 2;
        $eventos = "SELECT * from event where userId = '$idUser'";
        $res = mysqli_query($conexao, $eventos);
        $row = mysqli_fetch_all($res);

        $temp;
        
        foreach ($row as $e) {
            $temp = array(
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
        $idEvento = $id['id'];
        $eventos = "SELECT * from event where userId = '$idUser' and id = '$idEvento'";
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

    function update(Event $event, $id){
        $eventEdit[] = $event;

        $temp;

        foreach ($this->eventEdit as $e) {
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

        $sql = "select count(*) as total from event where id = '$id' and userId = '$userId'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['total'] == 1) {
            $sql = "UPDATE event SET titulo = '$titulo', descricao = '$descricao', start='$start', end='$end' WHERE userId='$userId' and id='$id'";
            if ($conexao->query($sql) === True) {
                $_SESSION['evento_editado'] = true;
            }
            $conexao->close();
        } 
    }
}

