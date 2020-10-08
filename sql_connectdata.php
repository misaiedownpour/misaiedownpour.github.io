<?php
$host = 'localhost'; // адрес сервера
$database = 'mysite'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'misai'; // пароль

$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
//mysqli_set_charset($link, "cp1251");
//mysqli_query($link, "SET NAMES 'cp1251'");
//mysqli_query($link, "SET NAMES 'cp1251';");
//mysqli_query($link, "SET CHARACTER SET 'cp1251';");
//mysqli_query($link, "SET SESSION collation_connection = 'cp1251';");
?>
