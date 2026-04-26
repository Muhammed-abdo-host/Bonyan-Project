<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "bonyan_db";

$conn = mysqli_connect($host, $user, $pass, $db_name);

if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}
?>