<?php

function renderTopMenu()
{
    $topMenu = <<<HTML
        <nav>
            <div class="nav-wrapper">
                <a class="brand-logo">Filopomoyka</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="profile.php">Профиль</a></li>
                    <li><a href="all_files.php">Все файлы</a></li>
                    <li><a href="upload.php">Загрузить файл</a></li>
                    <li><a href="logout.php">Выйти</a></li>
                </ul>
            </div>
        </nav>
HTML;
    echo $topMenu;
}

function renderFile($title, $link)
{
    $fileCard = "";

    if ($link) {
        $fileCard = <<<HTML
        <div class="col s2">
            <a download="$title" href="$link">
                <div class="card-panel teal">
                    <span class="white-text">
                        $title
                    </span>
                    <br>
                    <br>
                    <i class="white-text small material-icons">file_download</i>
                </div>
            </a>
        </div>
HTML;
    } else {
        $fileCard = <<<HTML
        <div class="col s2">
                <div class="card-panel grey">
                    <span class="white-text">
                        $title
                    </span>
                    <br>
                    <br>
                    <i class="white-text small material-icons">lock</i>
                </div>
        </div>
HTML;
    }



    echo $fileCard;
}
