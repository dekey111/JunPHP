<?php

$connect = mysqli_connect('localhost', 'root', '', 'cutlink');

if(!$connect)
    die("Ошибка подключения в базе данных! \n" . mysqli_connect_error());
?>