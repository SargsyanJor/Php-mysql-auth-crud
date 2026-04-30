<?php
session_start();
require_once "../db/db.php";

if (isset($_POST["submit"])) {
    $_SESSION['old'] = $_POST;
    $errors = [];

    $title = $_POST["title"];
    $description = $_POST["description"];
    $user_id = $_SESSION["user_id"];

    if (!$title) {
        $errors['title'] = "Title is required";
    }

    if (!$description) {
        $errors['description'] = "Description is required";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location: ../public/postAddPage.php");
        exit();
    }

    $sql_check = "SELECT * FROM posts WHERE title = '$title'";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        $errors['title'] = "Title is already taken";
        $_SESSION['errors'] = $errors;
        header("location: ../public/postAddPage.php");
        exit();
    }


    $sql = "INSERT INTO posts (title, description, user_id)
            VALUES ('$title', '$description', '$user_id')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        unset($_SESSION['errors']);
        unset($_SESSION['old']);
        $_SESSION['success'] = "Post created successfully";
        header("location: ../public/postPage.php");
        exit();
    } else {
        echo "Error: ";
    }

}