<?php

$page = isset($_GET['page']) ? $_GET['page'] : null;

switch($page)
{
    default: 
    case null:
        include('system/pages/homepage.php');
        break;
    case 'new-game':
        include('system/pages/new-game.php');
        break;
    case 'login':
        include('system/pages/login.php');
        break;
    case 'game':
        include('system/pages/game.php');
        break;
}