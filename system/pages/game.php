<?php

// do some magic

// mock data :
$user_id = 1;
$game_id = 1;

$game = game::getOrCreate($game_id, 'New game name');


// include the view
include __DIR__.'/../views/game.php';