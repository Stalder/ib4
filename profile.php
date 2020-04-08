<?php
include_once "components.php";
include_once "utils.php";

redirectSignInIfUnauthorized();

$link = connect_mysql();

$user_id = $_COOKIE['id'];

$query = mysqli_query($link, "SELECT user_login FROM users WHERE user_id='" . mysqli_real_escape_string($link, $user_id) . "' LIMIT 1");
$data = mysqli_fetch_assoc($query);

$username = $data['user_login']
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Профиль</title>
</head>

<body>
    <div class="container">
        <?php renderTopMenu() ?>
        <h3>Профиль</h3>
        <span>Привет, <?php echo $username ?>! У тебя 4 файла:</span>
        <div class="row">
            <?php renderFile("Файл1", "vdsvd") ?>
            <?php renderFile("Файл2", "vdsvd") ?>
            <?php renderFile("Файл3", "vdsvd") ?>
            <?php renderFile("Файл4", "vdsvd") ?>
        </div>

        <div class="row">
            <form class="col s8" action="change_password.php" method="POST">
                <h4>Сменить пароль</h4>

                <input placeholder="Текущий пароль" name="old_password">
                <input placeholder="Новый пароль" name="new_password">
                <input placeholder="Новый пароль еще раз" name="new_password_again">
                <input type="hidden" name="username" value="<?php echo $username ?>">
                <br>

                <input type="submit">
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>