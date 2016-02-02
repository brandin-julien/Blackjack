<?php

class Card{

    private $face,$color;

    public function __construct($color,$face){
        $this->face = $face;
        $this->color = $color;
    }

    public function getFace(){
        return $this->face;
    }
    public function getColor(){
        return $this->color;
    }

    public function getValue(){
        if(is_int($this->face)){
            return $this->face;
        }
        elseif($this->face == 'ACE'){
            return 11;
        }else{
            return 10;
        }
    }

    public function __toString(){
        return $this->face." de ".$this->color;
    }
}