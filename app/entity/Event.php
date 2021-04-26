<?php
    namespace App\Entity;
    class Event{
        
        private $id;
        private $titulo;
        private $descricao;
        private $dataDay;
        private $dataMonth;
        private $dataYear;
        private $userId;
        

        //Construtor
        public function __construct ($id = '', $titulo = '', $descricao = '', $dataDay = '', $dataMonth = '', $dataYear = '', $userId = ''){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descricao = $descricao;
            $this->dataDay = $dataDay;
            $this->dataMonth = $dataMonth;
            $this->dataYear = $dataYear;
            $this->userId = $userId;
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
        public function getDataYear()
        {
                return $this->dataYear;
        }

        public function setDataYear($dataYear)
        {
                $this->dataYear = $dataYear;

                return $this;
        }

         //Setter & Getter 
        public function getDataMonth()
        {
                return $this->dataMonth;
        }

        
        public function setDataMonth($dataMonth)
        {
                $this->dataMonth = $dataMonth;

                return $this;
        }

        //Setter & Getter 
        public function getDataDay()
        {
                return $this->dataDay;
        }

        
        public function setDataDay($dataDay)
        {
                $this->dataDay = $dataDay;

                return $this;
        }
    }
