<?php

class Movie {

    use HasGenres;                        //usa trait

    //proprietà di classe
    protected string $titolo;             //dichiarazione tipo di variabile: string/int/array...
    protected string $regista;            //public = proprietà accessibile da tutti i file dove esistono istanze di Movie
    protected string $locandina;          //protected = proprietà accessibile dalla classe o dalle sue sottoclassi (ereditarietà Sequel "is a" Movie)
    protected int $anno;                  //private = proprietà accessibile solo all'interno della classe
    protected array $generi;

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

    //Getter $titolo
    public function getTitle():string{
        return $this->titolo; 
    }
    //Setter $titolo
    public function setTitle(string $_newTitle):void{
        $this->titolo = $_newTitle;
    } 

    //Getter $regista
    public function getDirector():string{
        return $this->regista; 
    }
    //Setter $regista
    public function setDirector(string $_newDirector):void{
        $this->regista = $_newDirector;
    }
    //Getter $locandina
    public function getImage():string{
        return $this->locandina; 
    }
    //Setter $locandina
    public function setImage(string $_newImage):void{
        $this->locandina = $_newImage;
    }
    //Getter $anno
    public function getYear():int{
        return $this->anno; 
    }
    //Setter $anno
    public function setYear(int $_newYear):void{
        $this->anno = $_newYear;
    }
   
    //Setter $generi
    public function setGenres(array $_newGenres):void{
        $this->generi = $_newGenres;
    }

    //Getter $generi
    public function getGenres():array{
        return $this->generi;
    }
}

?>