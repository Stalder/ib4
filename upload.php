<?php
include_once "utils.php";

redirectSignInIfUnauthorized();

$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["username"] && $_POST["password"]) {

        // Authentication  

        header('Location: ../index.php');
        exit();
    } else {
        $error = "Введите имя пользователя и пароль";
    }
}

include_once "components.php"

?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Загрузить файл</title>
</head>

<body>
    <div class="container">
        <?php renderTopMenu() ?>

        <div class="row">
            <form class="col s8" action="sign_in.php" method="POST">
                <h3>Загрузить файл</h3>
                <?php
                if ($error) {
                    echo $error;
                }
                ?>

                <input placeholder="Псевдоним" autofocus name="name">
                <br>
                <br>
                <input type="file" name="file">
                <br>
                <br>

                <input type="submit">
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>