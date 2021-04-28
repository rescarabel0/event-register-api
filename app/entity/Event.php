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
            
            $this->end = $end;
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
