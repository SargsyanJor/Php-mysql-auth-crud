<?php

$localhost = "MySQL-8.4";
$username = "root";
$password = "";
$database = "Lesson-9";


$conn = mysqli_connect($localhost, $username, $password, $database);
if (!$conn) echo "Error: " . mysqli_connect_error();