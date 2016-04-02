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
        <div>Имя сотрудника<span>*</span><input type = "text" name="first_name" required></div>
        <div>Фамилия сотрудника<span>*</span><input type = "text" name="last_name" required></div>
                    
        
        <?php 
            $query = mysqli_query($db, "
                SELECT * FROM `company`
                ORDER BY `name`
                ");

            $select = "<div>Компания<select name = 'company'>
        <option>Без компании</option>";

                while ($company = mysqli_fetch_assoc($query)){
                    $select.= "<option value = '{$company['id']}'>{$company['name']}</option>";
                }

            $select.="</select></div>";

            echo $select;
        
        ?>
        <input type = "submit" value = "Записать">
    </fieldset>
</form>

<?php
if(!empty($_POST)){
    $company = (int) $_POST ['company'];
    $company = $company > 0 ? $company : 'NULL';
    $first_name = trim(htmlspecialchars($_POST['first_name']));  
    //trim - обрезает пробелы в начале и конце строки
    $last_name = trim(htmlspecialchars($_POST['last_name']));

    mysqli_query($db, "
    INSERT INTO
        `client`
    SET
        `id_company`= $company,
        `first_name` = '$first_name',
        `last_name` = '$last_name';
    ");

    if (mysqli_errno($db) == 0){
        echo 'Новый клиент успешно добавлен!';
    }
    echo mysqli_error($db);
}
?>
