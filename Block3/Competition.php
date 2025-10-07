<?php
     class Competition{
        public $runners = [];

        public function addRunner($code, Runner $runner){
            $this->runners[$code] = $runner;
        }
        public function addRaceToRunner($code, $runner){
            if(isset($this->runners[$code])){
                $this->runners[$code]->addRace($runner);
            }
        } 
        public function findAvgFirstRace(){
            $count;
            $sum;
            foreach($runners as $runner){
                
            }
            
        }
        public function QuickestRace(){
            $findFastest= [];
            foreach($this->runners as $runner){

                foreach($runner ->getName() as $name){

                }
            }
        }
        public function Sec15_in2Races(){

            $result;
            foreach($this->runners as $runner){
                $count =0;
                foreach($runner->getRaces() as $time){
                    if($time > 15){
                        $count++;
                    }
                }
                if($count < 2){
                    $result =+ $runner->$name;
                }
            }
            return $result;
        }
        public function namesEnd_E(){

        }
     }
?>