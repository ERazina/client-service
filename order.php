<?php
define('PAGE', 'order');
include_once "header.html";
include_once "config.php";
include_once "menu.php";
include_once "footer.html";

?>

<form method = "post">
    <fieldset>
        <legend>Добавить заказ</legend>
        <div>ID сотрудника<span>*</span><input type = "text" name="staff_id" required></div>
        <div>ID клиента<span>*</span><input type = "text" name="client_id" required></div>
        <div>Сумма<span>*</span><input type = "text" name="sum" required></div>
        <div>Статус<span>*</span><input type = "text" name="status" required></div>
        <input type = "submit" value = "Записать">
    </fieldset>
</form>

<?php
 if(!empty($_POST)){
   $staff_id = trim(htmlspecialchars($_POST['staff_id']));
   $client_id = trim(htmlspecialchars($_POST['client_id']));
   $sum= trim(htmlspecialchars($_POST['sum']));
   $status = trim(htmlspecialchars($_POST['status']));

   mysqli_query($db, "
   INSERT INTO
       `order`
   SET
       `sum` = '$sum',
       `status` = '$status';
   ");

   if (mysqli_errno($db) == 0){
       echo 'Новая компания успешно добавлена!';
   }
   echo mysqli_errno($db);
 }

?>
