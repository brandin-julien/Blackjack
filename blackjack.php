<?php

require_once "classes/game.php";
session_start();

if(isset($_POST['reset']) && $game->status == 'end') {
    unset($_SESSION['game']);
}

if(!isset($_SESSION['game'])){
    $game = new game();
    $_SESSION['deck'] = serialize($game);
}else{
    $game = unserialize($_SESSION['game']);
}

if(isset($_POST['choice'])){
    if($game->player->getHandValue() <= 21 && $game->status != 'end'){
        $game->player->take($game->deck->deal(1));
    }
}

if($game->player->getHandValue() > 21){
    echo "Vous avez perdu".$game->player->getHandValue();
    $game->status = 'end';
}else{
    echo "Vous avez =>".$game->player->getHandValue();
}

if(isset($_POST['pass']) && $game->status != 'end'){
    $game->status = 'end';
    while ($game->bank->getHandValue() <= $game->player->getHandValue()) {
        if ($game->player->getHandValue() <= 21) {
            $game->bank->take($game->deck->deal(1));
        }
    }
}

if($game->bank->getHandValue() > $game->player->getHandValue() && $game->bank->getHandValue() <= 21 && $game->status == 'end') {
    echo('<br> La banque gagne avec =>'.$game->bank->getHandValue());
}
elseif($game->bank->getHandValue() == $game->player->getHandValue() && $game->bank->getHandValue() <= 21 && $game->status == 'end') {
    echo('<br> égalité =>' . $game->bank->getHandValue());
}
elseif($game->bank->getHandValue() > 21 && $game->status == 'end'){
    echo "<br>La banque perd =>".$game->bank->getHandValue();
}
else{
    echo "<br>La banque =>".$game->bank->getHandValue();
}

$_SESSION['game'] = serialize($game);


