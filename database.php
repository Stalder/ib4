<?php

/**
 * This file allows to connect to database and execute SQL queries.
 * Vars bellow are credentials for local database, created for this lab.
 */


function createConnection()
{
    $user = 'ib4';
    $password = 'ib4';
    $db = 'ib4';
    $host = 'localhost';
    $port = 8889;

    $mysqli = new mysqli($host, $user, $password, $db, $port);
    if ($mysqli->connect_errno) {
        die('Cannot connect to mySQL');
    }

    return $mysqli;
}
