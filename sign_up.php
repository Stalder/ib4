<?php

$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["username"] && $_POST["password"] && $_POST["password_repeat"]) {

        // Signing up  

        header('Location: ../index.php');
        exit();
    } else {
        $error = "Эу, форму заполни";
    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Регистрация</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form class="center-align col s4 offset-s4" action="sign_up.php" method="POST">
                <h2>Регистрация</h2>
                <?php
                if ($error) {
                    echo $error;
                }
                ?>

                <input placeholder="Имя пользователя" autofocus name="username">
                <input placeholder="Пароль" type="password" name="password">
                <input placeholder="Пароль еще раз" type="password" name="password_repeat">

                <input type="submit">
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>