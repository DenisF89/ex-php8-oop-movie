<?php

trait HasGenres {
    
    protected string $separatore = ", ";        //protected accessibile da classe e figlie (extends)
                                                //la classe che contiene il trait accede sia a protected che a private

    public function getGenres(): string{
        $nomiGeneri = [];
        foreach($this->generi as $genere){
            $nomiGeneri[] = $genere->getName();
        }
        $titolo = "<b>Gener".(count($nomiGeneri)>1 ? "i":"e").": </b>"; 
        return $titolo . implode($this->separatore, $nomiGeneri);
    }
}

?>