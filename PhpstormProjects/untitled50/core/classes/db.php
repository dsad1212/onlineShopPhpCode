<?php

$servername ="ihavenohomecom.domaincommysql.com";
$username = "jew";
$password = "Dsad1234?";
$dbname = "jewish";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");

?>