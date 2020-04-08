<?php

include_once "utils.php";

$error = false;

if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['new_password_again'])) {
    echo $_POST['old_password'] . "<br>" . $_POST['new_password'] . "<br>" . $_POST['new_password_again'] . "<br>";

    if ($_POST['new_password'] !== $_POST['new_password_again']) {
        echo "<span>Пароли не совпадают. Ну как так-то?</span>";
        exit();
    }

    $link = connect_mysql();

    $query = mysqli_query($link, "SELECT user_id, user_password FROM users WHERE user_login='" . mysqli_real_escape_string($link, $_POST['username']) . "' LIMIT 1");
    $data = mysqli_fetch_assoc($query);


    if ($data['user_password'] !== md5(md5($_POST['old_password']))) {
        echo $data['user_password'] . "<br>" . $_POST['old_password'] . "<br>";
        echo "<span>Введен неверный пароль. Ну как так-то?</span>";
        exit();
    }

    $new_password = md5(md5($_POST['new_password']));

    mysqli_query($link, "UPDATE users SET user_password='" . $new_password . "' WHERE user_id='" . $data['user_id'] . "'");

    header("Location: profile.php");
} else {
    echo "<span>Введены не все значения. Ну как так-то?</span>";
}
