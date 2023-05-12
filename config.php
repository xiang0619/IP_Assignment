<?php

if (!defined('DB_SERVER')||!defined('DB_USERNAME')||!defined('DB_NAME')) {
    define('DB_SERVER','localhost');
    define('DB_USERNAME', 'root');
    define('DB_NAME', 'ip');
    $dbc= mysqli_connect(DB_SERVER,DB_USERNAME,"",DB_NAME);

if($dbc == false){
    
    die("ERROR: Could not connect. ".mysqli_conect_error());
}
}



        



?>