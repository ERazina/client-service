<link rel = "stylesheet" href="css/main.css" />

<form method = "post">
    <fieldset>
        <legend>Регистрация</legend>
        <div>Логин<input type = "text" name = "login" required></div>
        <div>Пароль<input type = "password" name = "pass" required></div>
        <input type = "submit" value = "Записать">
    </fieldset>
        <fieldset>
        <legend>Авторизация</legend>
            <a href = "reg.php">Войти в систему</a>
    </fieldset>
</form>

<?php

    include_once "config.php";

    if(!empty($_POST)){
        $login = trim(htmlspecialchars($_POST['login']));
        $pass = md5($_POST['pass']);

            $query = mysqli_query($db, "
            SELECT `id` FROM `user`
            WHERE `login` = '$login';
            ");

        if(mysqli_num_rows($query) > 0){
            echo '<p>Такой логин уже занят</p>';
        
        }
        else{
            mysqli_query($db, "
            INSERT INTO `user`
            SET `login` = '$login', `pass` = '$pass';
            ");

            if(mysqli_errno($db) == 0){
               setcookie('id', mysqli_insert_id($db)); 
               header("Location: home.php");
            }

            else {echo '<p>Ошибка авторизации!</p>';}

        }
    
}
?>