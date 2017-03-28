<?php


// URL config
define('BASE_URL', 'http://www.cbp-exercises.local/toepen');

// DB config 
define('DBNAME', 'toepen');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASSWORD', '');
define('DBCHARSET', 'utf8');


// bootstrapping

function my_autoload($class)
{
    require_once('lib/'.$class.'.class.php');
}

spl_autoload_register('my_autoload');