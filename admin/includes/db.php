<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quotations";

// create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check if connection is successful
if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
?>