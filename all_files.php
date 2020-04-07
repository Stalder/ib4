<?php
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
    <title>Все файлы</title>
</head>

<body>
    <div class="container">
        <?php renderTopMenu() ?>

        <h3>Все файлы</h3>

        <div class="row">
            <?php renderFile("Файл1", "vdsvd") ?>
            <?php renderFile("Файл1", "") ?>
            <?php renderFile("Файл1", "") ?>
            <?php renderFile("Файл1", "dvsdvsdv") ?>
            <?php renderFile("Файл1", "") ?>
            <?php renderFile("Файл1", "") ?>
            <?php renderFile("Файл1", "vsdvsd") ?>
            <?php renderFile("Файл1", "") ?>
            <?php renderFile("Файл1", "") ?>
            <?php renderFile("Файл1", "") ?>
            <?php renderFile("Файл1", "") ?>
            <?php renderFile("Файл1", "") ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>