<?php
include 'connect.php';

$req = trim($_GET['cutLinkInput']);
$req = mysqli_real_escape_string($connect, $req);


if (isset($_GET['cutLinkInput'])) {
    $abr = genAbbreviation();
    //Поиск нужной ссылки
    $sel = mysqli_query($connect, "SELECT * FROM `links` WHERE `link` = '" . $req . "'");

    //не нашёл такую ссылку
    if (!mysqli_num_rows($sel)) {
        //Добавление в таблицу
        $ins = mysqli_query($connect, "INSERT INTO `links` (`link`, `abr`)
        VALUES ('" . $req . "', '" . $abr . "')");

        if ($ins) {
            //Вывод сокращенной ссылки добавленой записи
            $result = mysqli_query($connect, "SELECT `abr` FROM `links` WHERE `link` = '" . $req . "'");
            while ($rowData = $result->fetch_assoc()) {
               // $_GET['cutLinkInput'] = $_SERVER['SERVER_NAME'] . '/' . $rowData['abr'];
               echo $_SERVER['SERVER_NAME'] . '/' . $rowData['abr'];
            }
        }
    } else { //Если такую ссылку нашёл, то вывод ее сокращенной версии
        $result = mysqli_query($connect, "SELECT `abr` FROM `links` WHERE `link` = '" . $req . "'");
        while ($rowData = $result->fetch_assoc()) {
           // $_GET['cutLinkInput'] = $_SERVER['SERVER_NAME'] . '/' . $rowData['abr'];
            echo $_SERVER['SERVER_NAME'] . '/' . $rowData['abr'];
        }
    }
} else {
    $URL = $_SERVER['REQUEST_URI'];
    $abr = substr($URL, 1);

    if (iconv_strlen($abr)) {

        $sel = mysqli_query($connect, "SELECT * FROM `links` WHERE `abr` = '" . $abr . "'");
        if (mysqli_num_rows($sel)) {
            $row = mysqli_fetch_assoc($sel);

            header("Location:" . $row['link']);
        } else {
            die("Ссылка не найдена!");
        }
    }
}

//генерация уникальной ссылки
function genAbbreviation()
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDFEGHIJKLMNOPRSTUVWXYZ0123456789';
    $new_chars = str_split($chars);

    $abr = "";
    for ($i = 0; $i < 8; $i++) {
        $abr .= $new_chars[mt_rand(0, sizeof($new_chars) - 1)];
    }
    return $abr;
}
