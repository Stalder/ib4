<?php
include_once "utils.php";

redirectSignInIfUnauthorized();

$error = false;

$userId = $_COOKIE['id'];

if (isset($_FILES["file"])) {
    $link = connect_mysql();

    $prettyFilename = $_FILES['file']["name"];
    $file = $_FILES['file'];

    $ext = pathinfo($prettyFilename, PATHINFO_EXTENSION);
    $filenameToSave = generateCode(42);

    $filePath = "uploads/" . $filenameToSave . "." . $ext;

    move_uploaded_file($file['tmp_name'], $filePath);

    mysqli_query($link, "INSERT INTO files SET file_name='" . $prettyFilename . "', file_path='" . $filePath . "', owner_id='" . $userId . "'");

    header('Location: profile.php');
    exit();
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
            <form class="col s8" enctype="multipart/form-data" action="upload.php" method="POST">
                <h3>Загрузить файл</h3>
                <?php
                if ($error) {
                    echo $error;
                }
                ?>

                <input type="file" name="file" required>
                <br>
                <br>

                <input type="submit">
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>