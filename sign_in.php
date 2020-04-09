<?php
include_once "utils.php";

$error = false;

$link = connect_mysql();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["username"] && $_POST["password"]) {
        $escapedUsername = mysqli_real_escape_string($link, $_POST['username']);
        $query = mysqli_query($link, "SELECT user_id, user_password FROM users WHERE user_login='" . $escapedUsername . "' LIMIT 1");
        $data = mysqli_fetch_assoc($query);

        if ($data['user_password'] === md5(md5($_POST['password']))) {
            $hash = md5(generateCode(10));

            mysqli_query($link, "UPDATE users SET user_hash='" . $hash . "' WHERE user_id='" . $data['user_id'] . "'");

            setcookie("id", $data['user_id'], time() + 60 * 60 * 24 * 30, "/");
            setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, "/", null, null, true); // httponly !!!

            header("Location: profile.php");
            exit();
        } else {
            $error = "Вы ввели неправильное имя пользователя или пароль";
        }
    } else {
        $error = "Введите имя пользователя и пароль";
    }
}

redirectProfileIfAuthorized();

?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Авторизация</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form class="center-align col s4 offset-s4" action="sign_in.php" method="POST">
                <h2>Авторизация</h2>
                <?php
                if ($error) {
                    echo $error;
                }
                ?>

                <input placeholder="Имя пользователя" autofocus name="username">
                <input placeholder="Пароль" type="password" name="password">

                <input type="submit" name="submit">
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>