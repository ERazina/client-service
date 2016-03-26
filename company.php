<?php
define('PAGE', 'company');
include_once "header.html";
include_once "config.php";
include_once "menu.php";
include_once "footer.html";

?>
<form method = "post">
    <fieldset>
        <legend>Добавить компанию</legend>
        <div>Название компании <span>*</span><input type = "text" name="last_name" required></div>
        <input type = "submit" value = "Записать">
    </fieldset>
</form>
