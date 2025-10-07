<?php

class Person{
    public $personID ;
    public $name;
    public $lastName;

    public function __construct($ID, $name, $lastName){
        $this -> ID = $ID;
        $this -> name = $name;
        $this -> lastName = $lastName;
    }

    public function setID($ID){
        $this-> ID = $ID;
    }
    public function setName($name){
        $this-> name = $name;
    }
    public function setlastName($lastName){
        $this-> lastName= $lastName;
    }
    public function getID(){
        $this-> ID ;
    }
    public function getName(){
        $this-> name ;
    }
    public function getlastName(){
        $this-> lastName ;
    }

    public function info($name, $lastName){
        return("Person: " + $name  + " " + $lastName);
    }

}
?>