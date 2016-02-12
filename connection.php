<?php
$host = "uscitp.com";
$username = "chen884_course";
$password = "trojan";
$db = "chen884_course_db";

$conn = mysqli_connect($host, $username, $password, $db);

if(mysqli_connect_errno())
{
    exit("DB Connection Error: " . mysqli_connect_error());
}
?>