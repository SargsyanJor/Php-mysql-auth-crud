<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body>
<div class="container">
    <div class="auth-box">
        <h2 class="auth-title">Login Page</h2>

        <form action="../actions/login.php" method="post" class="registration-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    value="<?= $_SESSION['old']['email'] ?? '' ?>"
                    type="email" name="email"
                    placeholder="Enter your email"
                    class="form-control">
                <span class="error-message"><?= $_SESSION['errors']['email'] ?? '' ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="******"
                    class="form-control">
                <span class="error-message"><?= $_SESSION['errors']['password'] ?? '' ?></span>
            </div>
            <a href="../index.php" class="have-acc">Create new account</a>
            <button name="submit" class="btn-submit">Login</button>
        </form>
    </div>
</div>
</body>
</html>