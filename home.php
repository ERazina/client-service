<link rel = "stylesheet" href="css/main.css" />
<?php

    define('PAGE', 'home');
    define('TITLE', 'Домашняя страница');
    include_once "config.php";
    include_once "menu.php";

    $query = mysqli_query($db, "
    SELECT `login` FROM `user`
    WHERE `id` = $id;
    ");
    
    $user = mysqli_fetch_assoc($query);
    echo "<p>Привет {$user['login']}</p>";

?>