<?php
session_start();
require_once "db.php";
$user_id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$_SESSION['success'] = "Post Deleted";
header("Location: ../postPage.php");
exit();