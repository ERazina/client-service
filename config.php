<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'company');

    $db = mysqli_connect('localhost', 'root', '', 'company');
    mysqli_set_charset($db, "UTF8");
?>