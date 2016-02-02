<?php

class Player{
    protected $hand;
    protected $pseudo;

    public function __construct(){
        $this->hand = [];
    }

    public function take($cards){
        foreach($cards as $card)
            $this->hand[] = $card;
    }

    public function getHandValue(){
        $total = 0;
        foreach ($this->hand as $card) {
            $total += $card->getValue();
        }
        return $total;
    }

}