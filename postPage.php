<?php
session_start();
require_once("public/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$full_name = $first_name . " " . $last_name;
$sql = "SELECT * FROM posts WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/post.css">
</head>
<body>

<div class="container">

    <aside class="profile-sidebar">
        <div class="profile-card">
            <div class="avatar-circle">
                <?= strtoupper(substr($first_name ?? '', 0, 1)) ?>
            </div>
            <p class="user-role"><?= $full_name ?? '' ?></p>

            <hr style="border: 0; border-top: 1px solid #f0f2f5; margin: 15px 0;">

            <a href="public/logout.php" class="logout-link">Logout</a>
        </div>

        <?php if (isset($_SESSION['success'])): ?>
            <div
                style="margin-top: 15px; padding: 12px; background: #e6f6e6; color: #00a400; border-radius: 8px; font-size: 13px; text-align: center; font-weight: 500;">
                <?= $_SESSION['success'] ?>
            </div>
        <?php endif; ?>
    </aside>

    <main class="posts-feed">
        <div class="section-header">
            <div class="header-left">
                <h3>My posts</h3>
                <a href="profilePage.php" class="btn-back-styled">Back to Profile</a>
            </div>
            <a href="postAddPage.php" class="btn-add">Add</a>
        </div>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="post-card">
                    <span class="post-title"><?= htmlspecialchars($row['title']) ?></span>
                    <div class="post-description"><?= nl2br(htmlspecialchars($row['description'])) ?></div>

                    <div class="post-footer">
                        <div class="post-actions">
                            <a href="postEditPage.php?id=<?= $row['id'] ?>" class="btn-edit">
                                Edit
                            </a>
                            <a href="public/postDelete.php?id=<?= $row['id'] ?>"
                               class="btn-delete">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="post-card" style="text-align: center; color: #8d949e;">
                There are no posts yet.
            </div>
        <?php endif; ?>
    </main>

</div>

<?php unset($_SESSION['success']); ?>
</body>
</html>