<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/postAdd.css">
</head>
<body>
<div class="form-container">
    <div class="form-card">
        <div class="section-header">
            <h2 style="margin: 0; font-size: 20px;">New Post</h2>
        </div>

        <form action="../actions/postAdd.php" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       id="title"
                       name="title"
                       class="form-input"
                       placeholder="Enter title"
                       value="<?= $_SESSION['old']['title'] ?? '' ?>">
                <?php if (isset($_SESSION['errors']['title'])): ?>
                    <span class="error-text"><?= $_SESSION['errors']['title'] ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description"
                          name="description"
                          class="form-input"
                          placeholder="Write the description here..."
                          rows="6"><?= $_SESSION['old']['description'] ?? '' ?></textarea>
                <?php if (isset($_SESSION['errors']['description'])): ?>
                    <span class="error-text"><?= $_SESSION['errors']['description'] ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" name="submit" class="btn-submit">Add a post</button>
            <a href="postPage.php" class="btn-back">Go back</a>
        </form>
    </div>
</div>
</body>
</html>

