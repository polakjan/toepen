<?php

// config 



// bootstrapping

function my_autoload($class)
{
    require_once('lib/'.$class.'.class.php');
}

spl_autoload_register('my_autoload');