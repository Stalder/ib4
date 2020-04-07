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
                    <li><a href="sign_in.php">Выйти</a></li>
                </ul>
            </div>
        </nav>
HTML;
    echo $topMenu;
}
