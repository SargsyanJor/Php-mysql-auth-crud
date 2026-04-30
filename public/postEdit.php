<?php
session_start();
require_once "db.php";


if (isset($_POST['submit'])) {

    $post_id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE posts 
            SET title = '$title', description = '$description'
            WHERE id = '$post_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['success'] = "Post Updated";
        header("Location: ../postPage.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}