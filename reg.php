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
            WHERE `login` = '$login'
            AND `pass` = '$pass';
            ");

        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            setcookie('id', $user['id']);
            header("Location: home.php");
        
        }
        
        else{
           echo '<p>Неверная пара логин/пароль</p>';
            }


            }
    
?>