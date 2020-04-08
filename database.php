<?php

/**
 * This file allows to connect to database and execute SQL queries.
 * Vars bellow are credentials for local database, created for this lab.
 */


function connect_mysql()
{
    return mysqli_connect("localhost", "ib4", "ib4", "ib4", 8889);
}
