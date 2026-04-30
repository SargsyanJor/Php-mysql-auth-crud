<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
    <div class="auth-box profile-card">
        <div class="profile-header">
            <h2 class="auth-title">My Profile</h2>
        </div>

        <div class="profile-body">
            <div class="info-group">
                <span class="info-label">User</span>
                <div class="info-value"><?= $_SESSION['first_name'] ?? '' ?></div>
            </div>

            <div class="info-group">
                <span class="info-label">Email</span>
                <div class="info-value"><?= $_SESSION['email'] ?? '' ?></div>
            </div>
        </div>

        <div class="profile-footer">
            <a href="postPage.php" class="btn-edit-profile">My posts</a>
            <a href="allPostsPage.php" class="btn-edit-profile">All posts</a>
            <a href="public/logout.php" class="have-acc logout-text">Logout</a>
        </div>
    </div>
</div>
</body>
</html>