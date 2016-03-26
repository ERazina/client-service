<?php
define('PAGE', 'clients');
include_once "header.html";
include_once "config.php";
include_once "menu.php";
include_once "footer.html";

?>
<form method = "post">
    <fieldset>
        <legend>Добавить клиента</legend>
        <div>ID компании<span>*</span><input type = "text" name="company_id" required></div>
        <div>Имя сотрудника<span>*</span><input type = "text" name="first_name" required></div>
        <div>Фамилия сотрудника<span>*</span><input type = "text" name="last_name" required></div>
        <input type = "submit" value = "Записать">
    </fieldset>
</form>

<?php
if(!empty($_POST)){
    $company_id = trim(htmlspecialchars($_POST['company_id'])); //htmlspecialchars - экранировать специальные символы
    $first_name = trim(htmlspecialchars($_POST['first_name']));   //trim - обрезает пробелы в начале и конце строки
    $last_name = trim(htmlspecialchars($_POST['last_name']));

    mysqli_query($db, "
    INSERT INTO
        `client`
    SET
        `id_company`= '$company_id',
        `first_name` = '$first_name',
        `last_name` = '$last_name';
    ");

    if (mysqli_errno($db) == 0){
        echo 'Новый клиент успешно добавлен!';
    }
}
?>
