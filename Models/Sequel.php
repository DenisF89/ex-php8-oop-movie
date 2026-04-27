<?php

class Sequel extends Movie {

    protected Movie $prequel;

    //costruttore di istanza
    function __construct(string $_titolo, string $_regista, string $_locandina, int $_anno, array $_generi, Movie $_prequel){
        parent::__construct($_titolo, $_regista, $_locandina, $_anno, $_generi);
        $this->prequel = $_prequel;      
    }

    public function hasPrequel(){
        return isset($this->prequel);
    }

    public function getPrequelName(){
        return $this->prequel->getTitle();
    }
}

?>