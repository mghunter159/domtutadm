<?php 
$title = "Ошибка доступа";
include("header.php"); 
echo "<div class='alert alert-danger'>
    <strong>Внимание!</strong> Вход запрещён! Зайдите под другим пользователем или обратитесь к администратору! <a href='/logout' class='alert-link'>Выйти из аккаунта.</a> или <a href='/' class='alert-link'>вернуться на главную страницу.</a>
  </div>";
  include("footer.php");
  ?>