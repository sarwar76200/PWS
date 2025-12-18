<?php
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "pws";

$conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
$conn->set_charset("utf8mb4");

if (!$conn) {
    die("Error while connecting");
}

?>