<?php
require_once("../db/db.php");
session_start();

if (isset($_POST["submit"])) {
    $_SESSION['old'] = $_POST;
    $errors = [];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!$email) {
        $errors['email'] = "Email is required";
    }

    if (!$password) {
        $errors['password'] = "Password is required";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../loginPage.php");
        exit();
    }

    $sql = "SELECT * FROM users_reg WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            $_SESSION["first_name"] = $row["first_name"];
            $_SESSION["last_name"] = $row["last_name"];
            $_SESSION["email"] = $row["email"];
            $_SESSION['user_id'] = $row['id'];
            unset($_SESSION['errors']);
            header("location: ../public/profilePage.php");
            exit();
        } else {
            $errors['password'] = "Wrong password";
        }

    } else {
        $errors['email'] = "User not found";
    }

    $_SESSION['errors'] = $errors;
    header("Location: ../loginPage.php");
    exit();
}


