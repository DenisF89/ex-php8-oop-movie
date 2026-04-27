<?php

trait HasGenres {
    
    protected string $separatore = ", ";        //protected accessibile da classe e figlie (extends)
                                                //la classe che contiene il trait accede sia a protected che a private

    public function getString(): string{
        $nomiGeneri = [];
        $array = $this->getGenres();
        foreach( $array as $genere){
            $nomiGeneri[] = $genere->getName();
        }
        $stringa = "<b>Gener".(count($nomiGeneri)>1 ? "i":"e").": </b>"; 
        return $stringa . implode($this->separatore, $nomiGeneri);
    }

}

?>