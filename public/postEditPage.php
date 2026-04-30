<?php
session_start();
require_once "../db/db.php";
$user_id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/postEdit.css">
</head>
<body>
<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h2>Edit post</h2>
        </div>

        <form action="../actions/postEdit.php" method="post">
            <input type="hidden" name="id" value="<?= $user_id ?>">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       id="title"
                       name="title"
                       class="form-input"
                       value="<?= htmlspecialchars($row['title']) ?>"
                       required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description"
                          name="description"
                          class="form-input"
                          rows="8"
                          required><?= htmlspecialchars($row['description']) ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn-submit">Save changes</button>
            <a href="postPage.php" class="btn-back">Cancel</a>
        </form>
    </div>
</div>
</body>
</html>