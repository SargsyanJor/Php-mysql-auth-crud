<?php
session_start();
require_once "../db/db.php";

if (isset($_POST["submit"])) {

    $errors = [];
    $_SESSION['old'] = $_POST;

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];
    // First_name validation
    if (!$first_name) {
        $errors['first_name'] = "First name is required";
    } elseif (!preg_match('/^[A-Z][a-z]{1,29}$/', $first_name)) {
        $errors['first_name'] = "First letter uppercase, only letters (2-30)";
    }
    // Last_name validation
    if (!$last_name) {
        $errors['last_name'] = "Last name is required";
    } elseif (!preg_match('/^[A-Z][a-z]{1,29}$/', $last_name)) {
        $errors['last_name'] = "First letter uppercase, only letters (2-30)";
    }
    // Age validation
    if (!is_numeric($age) || $age < 18) {
        $errors['age'] = "Age must be a number and at least 18";
    }
    // Email validation
    if (!$email) {
        $errors['email'] = "Email is required";
    } elseif (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
        $errors['email'] = "Invalid email format";
    }
    // Password validation
    if (!$password) {
        $errors['password'] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }
    // Confirm password
    if ($password != $password_confirm) {
        $errors['password_confirm'] = "Passwords do not match";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../index.php");
        exit();
    }

    $sql_check = "SELECT id FROM users_reg WHERE email = '$email'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        $_SESSION['errors']['email'] = "This email already exists";
        header("Location: ../index.php");
        exit();
    }


    $password_hash = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO users_reg (first_name, last_name, age, email, password)
            VALUES ('$first_name', '$last_name', '$age', '$email', '$password_hash')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        unset($_SESSION['old']);
        unset($_SESSION['errors']);
        $_SESSION['success'] = "Successfully registered!";
        header("Location: ../index.php");
        exit();
    } else {
        echo "ERROR";
    }

}