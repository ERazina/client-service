<?php
 if(!isset($_COOKIE['id']) || $_COOKIE['id'] <=0){
        header('Location: index.php');
    }
$id = $_COOKIE['id'];
include_once "header.html";
?>

<nav>
    <ul>
        <li <?php if (PAGE == 'staff') echo 'class = "active"'; ?>><a href = "staff.php">Сотрудники</a></li>
        <li <?php if (PAGE == 'company') echo 'class = "active"'; ?>><a href = "company.php">Компании</a></li>
        <li <?php if (PAGE == 'clients') echo 'class = "active"'; ?>><a href = "clients.php">Клиенты</a></li>
        <li <?php if (PAGE == 'order') echo 'class = "active"'; ?>><a href = "order.php">Договоры</a></li>
    </ul>

</nav>