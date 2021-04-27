<?php
    namespace App\Entity;
    class Event{
        
        private $id;
        private $titulo;
        private $descricao;
        private $userId;
        private $startDay;
        private $startMonth;
        private $startYear;
        private $endDay;
        private $endMonth;
        private $endYear;

        //Construtor
        public function __construct ($id = '', $titulo = '', $descricao = '', $userId = '', $startDay = '', $startMonth = '', $startYear = '', $endDay = '', $endMonth = '', $endYear = ''){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descricao = $descricao;
            $this->userId = $userId;
            $this->startDay = $startDay;
            $this->startMonth = $startMonth;
            $this->startYear = $startYear;
            $this->endDay = $endDay;
            $this->endMonth = $endMonth;
            $this->endYear = $endYear;
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
        public function getEndDay()
        {
                return $this->endDay;
        }

        
        public function setEndDay($endDay)
        {
                $this->endDay = $endDay;

                return $this;
        }

        //Setter & Getter  
        public function getStartDay()
        {
                return $this->startDay;
        }

        
        public function setStartDay($startDay)
        {
                $this->startDay = $startDay;

                return $this;
        }

        
        public function getStartMonth()
        {
                return $this->startMonth;
        }

        
        public function setStartMonth($startMonth)
        {
                $this->startMonth = $startMonth;

                return $this;
        }

        
        public function getStartYear()
        {
                return $this->startYear;
        }

        
        public function setStartYear($startYear)
        {
                $this->startYear = $startYear;

                return $this;
        }

        
        public function getEndMonth()
        {
                return $this->endMonth;
        }

        
        public function setEndMonth($endMonth)
        {
                $this->endMonth = $endMonth;

                return $this;
        }

        
        public function getEndYear()
        {
                return $this->endYear;
        }

        
        public function setEndYear($endYear)
        {
                $this->endYear = $endYear;

                return $this;
        }
    }
