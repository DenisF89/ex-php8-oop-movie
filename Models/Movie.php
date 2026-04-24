<?php

class Movie {

    use hasGenres;              //usa trait

    public string $titolo;             //variabili di classe = proprietà
    public string $regista;            //dichiarazione tipo di variabile: string/int/array...
    public string $locandina;          //public = proprietà accessibile da tutti i file dove esistono istanze di Movie
    public int $anno;
    public array $generi;

    //costruttore di istanza
    function __construct(string $_titolo, string $_regista, string $_locandina, int $_anno, array $_generi){
        $this->titolo = $_titolo;       //$this si riferisce all'istanza
        $this->regista = $_regista;     //assegnazione valori dei parametri alle proprietà di classe
        $this->locandina = $_locandina;
        $this->anno = $_anno;
        $this->generi = $_generi;
    }

    public function isRecent(): bool {  //metodo di classe di tipo booleano
        return $this->anno >= 2000;
    }
}

?>