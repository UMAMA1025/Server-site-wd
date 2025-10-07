<?php
    class Movie{
        public $ISAN;
        public $name;
        public $year;
        public $punctuation;

        public function __Construct($ISAN, $name, $year, $punctuation){
            $this -> ISAN = $ISAN;
            $this -> name = $name;
            $this -> year = $year;
            $this -> punctuation = $punctuation;
        }
    }
?>