<?php session_start(); ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>

    <div class="container">
        <div class="auth-box">
        <?php if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        }
        unset($_SESSION['success']);
        ?>

        <h2 class="auth-title">Registration Page</h2>

        <form action="public/register.php" method="post" class="registration-form">

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" placeholder="Enter your first name"
                       class="form-control"
                       value="<?= $_SESSION['old']['first_name'] ?? '' ?>">
                <span class="error-message"><?= $_SESSION['errors']['first_name'] ?? '' ?></span>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" placeholder="Enter your last name"
                       class="form-control"
                       value="<?= $_SESSION['old']['last_name'] ?? '' ?>">
                <span class="error-message"><?= $_SESSION['errors']['last_name'] ?? '' ?></span>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" placeholder="Enter your age name"
                       class="form-control"
                       value="<?= $_SESSION['old']['age'] ?? '' ?>">
                <span class="error-message"><?= $_SESSION['errors']['age'] ?? '' ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your last name"
                       class="form-control"
                       value="<?= $_SESSION['old']['email'] ?? '' ?>">
                <span class="error-message"><?= $_SESSION['errors']['email'] ?? '' ?></span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="******"
                       class="form-control">
                <span class="error-message"><?= $_SESSION['errors']['password'] ?? '' ?></span>
            </div>

            <div class="form-group">
                <label for="password_confirm">Repeat password</label>
                <input type="password" name="password_confirm" placeholder="******"
                       class="form-control">
                <span class="error-message"><?= $_SESSION['errors']['password_confirm'] ?? '' ?></span>
            </div>

            <a href="loginPage.php" class="have-acc" >I already have an account</a>

            <button name="submit" class="btn-submit">Register</button>

        </form>
    </div>
    </div>

    </body>
    </html>

<?php
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>