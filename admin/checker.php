<?php
//Запуск сессий
session_start();
//если пользователь не авторизован
$a=(isset($_SESSION["name"]));
if (!$a){
//идем на страницу авторизации
echo'<script>window.location.href="/admin";</script>';
echo $_SESSION["name"];
}
?>
