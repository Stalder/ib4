<?php
include_once "components.php";
include_once "utils.php";

redirectSignInIfUnauthorized();

$link = connect_mysql();

$userId = $_COOKIE['id'];

$files = mysqli_query($link, "SELECT * from files")
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Все файлы</title>
</head>

<body>
    <div class="container">
        <?php renderTopMenu() ?>

        <h3>Все файлы</h3>

        <div class="row">
            <?php
            while ($row = $files->fetch_assoc()) {
                renderFile($row['file_name'], $row['owner_id'] == $userId ? $row['file_path'] : '');
            }
            ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>