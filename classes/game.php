<?php
require_once "bank.php";

class game{
    public $deck;
    public $player;
    public $bank;
    public $status;

    public function __construct(){
        $this->bank = new Bank();
        $this->deck = new Deck();
        $this->player = new Player();
        $this->deck->shuffle();
        $this->bank->take($this->deck->deal(2));
        $this->player->take($this->deck->deal(2));
        $this->status = 'beginning';
    }
}
?>
