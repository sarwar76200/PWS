<?php
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "drugs_db";

$connection = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if (!$connection) {
    die("Error while connecting");
}