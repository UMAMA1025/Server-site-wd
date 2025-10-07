<?php 

    class Runner {
        public $name;
        public $code;
        public $races = [];
      
   
    public function __construct($name, $code){
        $this->name=$name;
        $this->code=$code;
        $this->races[] = array();
    }
    public function addRace($times){
        if(count($this->races) >= 5  ){
            throw new Exception("The runner already has 5 races.");      
        }
        if($times < 5){
            throw new Exception("There's a race that is less than 5 seconds. ");
        }
        else{
            $this->races[] = $times;
        }
    }

    public function setName($name){
        $this->name = $name;
    }
    public function setCode($code){
        $this->code = $code;
    }
    public function setRaces($races){
        $this->races = $races;
    }
    public function getName(){
        return $this->name;
    }
    public function getCode(){
        return $this->code;
    }
    public function getRaces(){
        return $this->races ;
    }
}
?>