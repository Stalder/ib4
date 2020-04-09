<?php
include_once 'database.php';
include_once "utils.php";

redirectProfileIfAuthorized();

if (isset($_POST['submit'])) {
    $err = [];

    session_start();
    if ($_POST['captcha'] == $_SESSION['digit']) {
        if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['username'])) {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }

        $rawPassword = $_POST['password'];

        $hasUppercase = preg_match('@[A-Z]@', $rawPassword);
        $hasLowercase = preg_match('@[a-z]@', $rawPassword);
        $hasNumber = preg_match('@[0-9]@', $rawPassword);
        $isLongerThan8 = strlen($rawPassword) > 7;

        if (!$hasUppercase || !$hasLowercase || !$hasNumber || !$isLongerThan8) {
            $err[] = "Пароль должен быть минимум 8 символов, содержать строчные и заглавные латинские символы и числа";
        }

        if (strlen($_POST['username']) < 3 || strlen($_POST['username']) > 30) {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        }

        if ($_POST['password'] != $_POST['password_again']) {
            $err[] = "Пароли не совпадают";
        }

        $link = connect_mysql();

        $escapedLogin = mysqli_real_escape_string($link, $_POST['username']);

        $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='" . $escapedLogin . "'");
        if (mysqli_num_rows($query) > 0) {
            $err[] = "Пользователь с таким логином уже существует в базе данных";
        }

        if (count($err) == 0) {
            $password = md5(md5(trim($_POST['password'])));

            mysqli_query($link, "INSERT INTO users SET user_login='" . $escapedLogin . "', user_password='" . $password . "'");
            header("Location: sign_in.php");
            exit();
        }
    } else {
        $err[] = "Неверное значение в поле CAPTCHA";
    }
    session_destroy();
}
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                if (count($err) != 0) {
                    echo "<b>При регистрации произошли следующие ошибки:</b><br>";
                    foreach ($err as $error) {
                        echo $error . "<br>";
                    }
                }
                ?>

                <input placeholder="Имя пользователя" autofocus name="username">
                <input placeholder="Пароль" type="password" name="password">
                <input placeholder="Пароль еще раз" type="password" name="password_again">
                <br>
                <br>
                <img src="/captcha.php" width="120" height="30" alt="CAPTCHA">
                <input placeholder="CAPTCHA" type="text" size="6" maxlength="5" name="captcha" value="">

                <input type="submit" name="submit">
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>