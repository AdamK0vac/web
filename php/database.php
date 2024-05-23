<?php

$host = "localhost";
$dbname = "dbskola";
$username = "SM";
$password = "Heslo123";

$mysqli = new mysqli(hostname : $host,
                     username : $username,
                     password : $password,
                     database : $dbname);

if($mysqli->connect_errno)
{
    die("Connection error: " . $mysqli->connect_errno);
}

return $mysqli;