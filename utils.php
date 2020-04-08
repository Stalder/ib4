<?php
include_once 'database.php';

function generateCode($length = 6)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}

function redirectProfileIfAuthorized()
{
    $link = connect_mysql();

    if (isset($_COOKIE['id']) && isset($_COOKIE['hash'])) {
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query);

        if ($userdata['user_hash'] == $_COOKIE['hash'] && $userdata['user_id'] == $_COOKIE['id']) {
            header("Location: profile.php");
            exit();
        }
    }
}

function redirectSignInIfUnauthorized()
{
    $link = connect_mysql();

    if (!isset($_COOKIE['id']) || !isset($_COOKIE['hash'])) {
        header("Location: sign_in.php");
        exit();
    } else {
        $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
        $userdata = mysqli_fetch_assoc($query);

        if ($userdata['user_hash'] !== $_COOKIE['hash'] || $userdata['user_id'] !== $_COOKIE['id']) {
            header("Location: logout.php");
            exit();
        }
    }
}
