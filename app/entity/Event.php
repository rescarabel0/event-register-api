<?php
    namespace App\Entity;
    class Event{
        
        private $id;
        private $titulo;
        private $descricao;
        private $userId;
        private $startHour;
        private $startMinute;
        private $startSeconds;
        private $endHour;
        private $endMinute;
        private $endSeconds;

        //Construtor
        public function __construct ($id = '', $titulo = '', $descricao = '', $userId = '', $startHour = '', $startMinute = '', $startSeconds = '', $endHour = '', $endMinute = '', $endSeconds = ''){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descricao = $descricao;
            $this->userId = $userId;
            $this->startHour = $startHour;
            $this->startMinute = $startMinute;
            $this->startSeconds = $startSeconds;
            $this->endHour = $endHour;
            $this->endMinute = $endMinute;
            $this->endSeconds = $endSeconds;
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
        public function getEndHour()
        {
                return $this->endHour;
        }

        
        public function setEndHour($endHour)
        {
                $this->endHour = $endHour;

                return $this;
        }

        //Setter & Getter  
        public function getStartHour()
        {
                return $this->startHour;
        }

        
        public function setStartHour($startHour)
        {
                $this->startHour = $startHour;

                return $this;
        }

        
        public function getStartMinute()
        {
                return $this->startMinute;
        }

        
        public function setStartMinute($startMinute)
        {
                $this->startMinute = $startMinute;

                return $this;
        }

        
        public function getStartSeconds()
        {
                return $this->startSeconds;
        }

        
        public function setStartSeconds($startSeconds)
        {
                $this->startSeconds = $startSeconds;

                return $this;
        }

        
        public function getEndMinute()
        {
                return $this->endMinute;
        }

        
        public function setEndMinute($endMinute)
        {
                $this->endMinute = $endMinute;

                return $this;
        }

        
        public function getEndSeconds()
        {
                return $this->endSeconds;
        }

        
        public function setEndSeconds($endSeconds)
        {
                $this->endSeconds = $endSeconds;

                return $this;
        }
    }
