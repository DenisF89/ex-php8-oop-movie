<?php

class Genre {
    private $nome;                      //private = proprietà non raggiungibile fuori dalla classe

    function __construct($_nome){
        $this->nome = $_nome;
    }

    public function getName(): string {
        return $this->nome;             //metooo che restituisce la proprietà nome
    }
}

?>