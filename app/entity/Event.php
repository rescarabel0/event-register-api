<?php
    namespace App\Entity;
    class Event{
        
        private $id;
        private $titulo;
        private $descricao;
        private $userId;

        private $start;
        private $startHour;
        private $startMinute;
        private $startSeconds;

        private $end;
        private $endHour;
        private $endMinute;
        private $endSeconds;

        //Construtor
        public function __construct ($id = '', $titulo = '', $descricao = '', $userId = '', $start = '', $end = ''){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descricao = $descricao;
            $this->userId = $userId;
            $this->start = $start;
            
            preg_match("/([0-9]{1,2}):([0-9]{1,2}) ([a-zA-Z]+)/", $start, $match);
            $this->startHour = $match[1];
            $this->startMinute = $match[2];
            $this->startSeconds = $match[3];
            $this->end = $end;

            preg_match("/([0-9]{1,2}):([0-9]{1,2}) ([a-zA-Z]+)/", $end, $matchB);
            $this->endHour = $matchB[1];
            $this->endMinute = $matchB[2];
            $this->endSeconds = $matchB[3];
        }
        
        //Setter & Getter 
        public function getId()
        {
                return $this->id;
        }
        
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        //Setter & Getter 
        public function getTitulo()
        {
                return $this->titulo;
        }

         
        public function setTitulo($titulo)
        {
                $this->titulo = $titulo;

                return $this;
        }

        //Setter & Getter 
        public function getDescricao()
        {
                return $this->descricao;
        }

        
        public function setDescricao($descricao)
        {
                $this->descricao = $descricao;

                return $this;
        }

        //Setter & Getter 
        public function getUserId()
        {
                return $this->userId;
        }

        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }

        //Setter & Getter  
        public function getStart()
        {
                return $this->start;
        }

        
        public function setStart($start)
        {
                $this->start = $start;

                return $this;
        }

        
        public function getEnd()
        {
                return $this->end;
        }

        
        public function setEnd($end)
        {
                $this->end = $end;

                return $this;
        }

        
        
    }
