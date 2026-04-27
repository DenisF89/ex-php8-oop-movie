<?php

//Usa immagine default 

trait HasImagePlaceholder {

    protected string $placeholder = "./img/placeholder.png";

    public function testImage(): string {
        return trim($this->getImage()) !== ""    //se l'url non è vuoto
            ? $this->getImage()                  //carica l'url
            : $this->getPlaceholder();           //usa metodo getter ph
    }
    public function getPlaceholder():string{
        return $this->placeholder;              //restituisce url placeholder. Lo chiamo anche all' onerror di img
    }
}
?>