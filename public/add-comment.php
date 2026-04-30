<?php
session_start();

require_once("db.php");

if(isset($_POST['submit'])) {
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (post_id, user_id, comment) VALUES ('$post_id', '$user_id', '$comment')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("location: ../allPostsPage.php");
        exit();
    }


}