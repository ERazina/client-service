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
        <div>Название компании <span>*</span><input type = "text" name="company_name" required></div>
        <input type = "submit" value = "Записать">
    </fieldset>
</form>

<?php
 if(!empty($_POST)){
   $name = trim(htmlspecialchars($_POST['company_name']));

   mysqli_query($db, "
   INSERT INTO
       `company`
   SET
       `name` = '$name';
   ");

   if (mysqli_errno($db) == 0){
       echo 'Новая компания успешно добавлена!';
   }
 }

?>
