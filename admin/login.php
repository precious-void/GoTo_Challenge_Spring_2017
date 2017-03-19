<?php
session_start();
require('password.php');
// получаем данные из формы с авторизацией
$login = $_POST['username'];
$password = $_POST['password'];
//проверка пароля и логина
if (($login==str_replace(' ', '', $login1))&& ($password==str_replace(' ', '', $password1))){
$_SESSION["name"]=$login;
// идем на страницу для авторизованного пользователя
echo ("Логин и пароль верны ");
echo'<script>window.location.href="main/index.php";</script>';
}
else
{die('Такой логин с паролем не найдены в базе данных.');
}

?>
