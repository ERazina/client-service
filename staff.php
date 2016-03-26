<?php
define('PAGE', 'staff');
include_once "header.html";
include_once "config.php";
include_once "menu.php";
include_once "footer.html";

?>

<form method = "post">
    <fieldset>
        <legend>Добавить сотрудника</legend>
        <div>Фамилия <span>*</span><input type = "text" name="last_name" required></div>
        <div>Имя <span>*</span><input type = "text" name="first_name" required></div>
        <div>Должность <select name="position">
            <option value = "1" selected>Администратор</option>
            <option value = "2">Менеджер</option>
            <option value = "3">Разработчик</option>
            </select>
        </div>
        <input type = "submit" value = "Записать">
    </fieldset>
</form>
<?php

if(!empty($_POST)){
    $firstName = trim(htmlspecialchars($_POST['first_name'])); //htmlspecialchars - экранировать специальные символы
    $lastName = trim(htmlspecialchars($_POST['last_name']));   //trim - обрезает пробелы в начале и конце строки
    $position = (int)$_POST['position'];



    mysqli_query($db, "
    INSERT INTO
        `staff`
    SET
        `last_name` = '$lastName',
        `first_name` = '$firstName',
        `position` = $position;
    ");

    if (mysqli_errno($db) == 0){
        echo 'Новый сотрудник успешно добавлен!';
    }
}
?>
