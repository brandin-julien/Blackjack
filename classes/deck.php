<?php

class Deck{
    private $cards;
    public function __construct(){
        $this->cards = [];
        $faces = range(1,10);
        $faces = array_merge($faces,["Jack","Queen","King"]);
        $colors = ["HEART","CLUB","DIAMOND","SPADE"];

        foreach($colors as $color){
            foreach($faces as $face){
                $this->cards[] = new Card($color,$face);
            }
        }
    }

    public function shuffle(){
        shuffle($this->cards);
        return $this;
    }

    public function deal($n = 1){
        $cards = array_splice($this->cards, 0, $n);
        return $cards;
    }
}