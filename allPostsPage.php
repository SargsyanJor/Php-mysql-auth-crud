<?php
require_once("public/db.php");

$sql = "SELECT 
            posts.id,
            posts.user_id,
            CONCAT(users_reg.first_name, ' ', users_reg.last_name) AS author,
            posts.title,
            posts.description
        FROM posts
        JOIN users_reg ON users_reg.id = posts.user_id
        ORDER BY posts.id DESC";

$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Posts</title>
    <link rel="stylesheet" href="css/allPostsPage.css">
</head>
<body>

<div class="container">
    <div class="feed-wrapper">

        <div class="header-inline">
            <h2 class="auth-title">Recent Posts</h2>
            <a href="../profilePage.php" class="minimal-back-btn">Back to Profile</a>
        </div>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="post-card">
                <div class="post-header">
                    <span class="post-author">
                        Author: <?= htmlspecialchars($row['author']) ?>
                    </span>
                </div>

                <div class="post-body">
                    <h3 class="post-title"><?= htmlspecialchars($row['title']) ?></h3>
                    <p class="post-text"><?= htmlspecialchars($row['description']) ?></p>
                    <hr>
                    <span>Comments💬</span>
                </div>

                <div class="comments-section-list">
                    <?php
                    $post_id = (int)$row['id'];
                    $sql_comm = "SELECT 
                                    CONCAT(users_reg.first_name, ' ', users_reg.last_name) AS name,
                                    comments.comment
                                 FROM comments
                                 JOIN users_reg ON users_reg.id = comments.user_id
                                 WHERE comments.post_id = $post_id
                                 ORDER BY comments.id ASC";

                    $result_comm = mysqli_query($conn, $sql_comm);

                    while ($row_comm = mysqli_fetch_assoc($result_comm)):
                        ?>
                        <div class="comment-item">
                            <strong><?= htmlspecialchars($row_comm['name']) ?>:</strong>
                            <span><?= htmlspecialchars($row_comm['comment']) ?></span>
                        </div>
                    <?php endwhile; ?>
                </div>

                <hr class="post-divider">

                <form method="POST" action="public/add-comment.php" class="comment-form">
                    <input type="hidden" name="post_id" value="<?= $row['id'] ?>">
                    <div class="comment-group">
                        <input type="text" name="comment"
                               placeholder="Write a comment..."
                               class="comment-input"
                               required>
                        <button type="submit" name="submit" class="btn-send">Send</button>
                    </div>
                </form>
            </div>
        <?php endwhile; ?>

    </div>
</div>

</body>
</html>