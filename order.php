<?php
define('PAGE', 'order');
define ('TITLE', 'Работа с клиентами');
include_once "header.html";
include_once "config.php";
include_once "menu.php";
include_once "footer.html";

?>

<form method = "post">
    <fieldset>
        <legend>Добавить заказ</legend>
        
        <?php

     $query = mysqli_query($db, "
        SELECT * FROM `staff`
        ORDER BY `last_name`;
     ");
        
     $select = "<div>Сотрудник<select name = 'staff'>
     ";
        
        while ($staff = mysqli_fetch_assoc($query)){
                    $select.= "<option value = '{$staff['id']}'>{$staff['last_name']}</option>";
                }

            $select.="</select></div>";

            echo $select;
        
        $query = mysqli_query($db, "
        SELECT * FROM `client`
        ORDER BY `id_company`;
     ");
     $select = "<div>Клиент<select name = 'client'>
     ";
        
        while ($company = mysqli_fetch_assoc($query)){
        $select.= "<option value = '{$company['id']}'>{$company['last_name']}</option>";
        }

            $select.="</select></div>";

            echo $select;
        ?>
        <div>Сумма<input type = "text" name="sum" required></div>
        <div>Статус<span>*</span><select name="status">
            <option value = "0">Предварительная заявка</option>
            <option value = "1">Выполняется</option>
            <option value = "2">Выполнена</option>
            </select>
        </div>
        <input type = "submit" value = "Записать">
    </fieldset>
</form>

<?php
 if(!empty($_POST)){
   $staff = (int)$_POST['staff'];
   $client = (int)$_POST['client'];
   $sum= (float)$_POST['sum'];
   $status = (int)$_POST['status'];

   mysqli_query($db, "
   INSERT INTO
       `order`
   SET
        `id_staff` = '$staff',
        `id_client` = '$client',
       `sum` = '$sum',
       `status` = '$status';
   ");

   if (mysqli_errno($db) == 0){
       echo '<p>Новый заказ успешно добавлен!</p>';
   }
     echo mysqli_errno($db);
    echo mysqli_error($db);
 }

?>
