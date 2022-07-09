<?php
include 'form.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сокращение ссылок</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style> 
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <div class="container text-center">
        <div class="row" style="margin-top: 20%;">
            <a href="/">
                <h1>Сокращение ссылок</h1>
            </a>
        </div>
        <div class="row">
            <form name="cutLinkForm" action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" value="<?=$_GET['cutLinkInput'];?>" name="cutLinkInput" id="cutLinkInput" class="form-control" placeholder="Вставьте ссылку" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="cutLinkSubmit">Выполнить</button>
                    <button id="copyText">Скопировать</button>
                </div>
            </form>
        </div>
    </div>
    <script src='main.js'></script>
</body>

</html>