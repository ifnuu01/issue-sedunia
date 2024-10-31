<?php
include 'includes/connection.php';
include 'includes/functions.php';

session_start();

$user = $_SESSION['user'];
if (!isset($user)) {
    header('Location: login.php');
}

if (isset($_POST['comment'])) {
    $postId = $_GET['id'];
    $userId = $user['id'];
    $content = $_POST['content'];

    $result = addComment($conn, $postId, $userId, $content);
    echo "<script>alert('" . $result['message'] . "');</script>";
}

incrementWatchingCounter($conn, $_GET['id']);
$post = getSinglePost($conn, $_GET['id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/components.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">

    <title><?= $post['post']['title']; ?> | Issue Sedunia</title>
</head>

<body>
    <?php
    include 'components/navbar.php';
    echo navbar();
    ?>
    <h2 class="heading text-center mb-6">Posts</h2>

    <div class="music-container hidden p-c cream border shadow rounded-lg">
        <h2 class="font-bold mb-6">Soundboard</h2>
    </div>

    <?php if ($post['status']): ?>
        <article class="flex gap-6 mb-6">
            <div class="post-avatar-desktop avatar mt-3 white shadow border rounded-full">
                <img src="https://ui-avatars.com/api/?name=<?= $post['post']['author']['username'] ?>" alt="Avatar">
            </div>
            <div class="w-full cream shadow border rounded-lg">
                <div class="p-c flex items-center justify-between border-b flex-wrap gap-3">
                    <div class="flex items-center gap-3">
                        <div class="post-avatar-mobile avatar white shadow border rounded-full">
                            <img src="https://ui-avatars.com/api/?name=<?= $post['post']['author']['username'] ?>" alt="Avatar">
                        </div>
                        <a href="profile.php?id=<?= $post['post']['user_id'] ?>" class="heading capitalize"><?= $post['post']['author']['username']; ?></a>
                        <p class="text-sm"><?= explode(' ', $post['post']['created_at'])[0]; ?></p>
                    </div>
                    <div class="flex items-center gap-3 flex-wrap">
                        <div class="capitalize px-6 py-1 font-medium border rounded shadow <?= $post['post']['category']; ?>"><?= $post['post']['category'] ?></div>
                        <div class="px-6 py-1 font-medium border rounded shadow <?= $post['post']['isSolve'] ? 'green' : 'red' ?>"><?= $post['post']['isSolve'] ? 'Solved' : 'Not Solve'; ?></div>
                        <?php if ($user['id'] == $post['post']['user_id']): ?>
                            <button type="button" class="relative btn-floating w-10 h-10 flex items-center justify-center light-green border shadow rounded">
                                <img src="assets/icons/menu.svg" alt="menu">
                                <div class="floating-action cream border shadow rounded">
                                    <a href="deletePost.php?id=<?= $post['post']['id'] ?>" class="block px-6 py-2 font-medium" onclick="return confirm('Are you sure want to delete this post?')">Delete</a>
                                </div>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
                <h3 class="px-6 py-4 heading"><?= $post['post']['title']; ?></h3>
                <div class="px-6 text-justify"><?= $post['post']['content']; ?></div>
                <?php if ($post['post']['photo']): ?>
                    <div class="px-6">
                        <div class="post-photo w-full rounded shadow border">
                            <img src="<?= $post['post']['photo'] ?>" alt="Post Image">
                        </div>
                    </div>
                <?php endif ?>
                <div class="p-c flex items-center gap-3 flex-wrap">
                    <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded pink">
                        <img src="assets/icons/comment.svg" alt="comment">
                        <div><?= count($post['comments']) ?></div>
                    </div>
                    <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded blue">
                        <img src="assets/icons/views.svg" alt="views">
                        <div><?= $post['post']['watching_counter'] ?></div>
                    </div>
                    <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded green">
                        <img src="assets/icons/share.svg" alt="share">
                        <div><?= $post['post']['share_counter'] ?></div>
                    </div>
                </div>
            </div>
        </article>
        <article class="flex gap-6 mb-6">
            <?php if (!$post['post']['isSolve']): ?>
                <div class="post-avatar-desktop avatar mt-3 white shadow border rounded-full">
                    <img src="https://ui-avatars.com/api/?name=<?= $user['username'] ?>" alt="Avatar">
                </div>
                <div class="comment-line p-c w-full cream shadow border rounded-lg">
                    <form action="" method="POST">
                        <div class="mb-6 flex items-center gap-3">
                            <div class="post-avatar-mobile avatar white shadow border rounded-full">
                                <img src="https://ui-avatars.com/api/?name=<?= $user['username'] ?>" alt="Avatar">
                            </div>
                            <label for="content" class="heading block">Add Comment</label>
                        </div>
                        <textarea id="content" name="content" rows="2" cols="30" class="px-4 py-4 blue w-full rounded shadow border" required placeholder="Add comment..."></textarea>
                        <button type="submit" name="comment" class="border shadow rounded purple px-4 py-1">Submit</button>
                    </form>
                </div>
            <?php endif; ?>
        </article>
        <?php foreach ($post['comments'] as $comment): ?>
            <article class="flex gap-6 mb-6">
                <div class="post-avatar-desktop avatar white shadow border rounded-full">
                    <img src="https://ui-avatars.com/api/?name=<?= $comment['commenter']['username'] ?>" alt="Avatar">
                </div>
                <div class="comment-line w-full cream shadow border rounded-lg">
                    <div class="p-c flex items-center justify-between border-b flex-wrap gap-3">
                        <div class="flex items-center gap-3">
                            <div class="post-avatar-mobile avatar white shadow border rounded-full">
                                <img src="https://ui-avatars.com/api/?name=<?= $comment['commenter']['username'] ?>" alt="Avatar">
                            </div>
                            <a href="profile.php?id=<?= $comment['commenter']['id']; ?>" class="heading capitalize"><?= $comment['commenter']['username']; ?></a>
                            <p class="text-sm"><?= explode(' ', $comment['created_at'])[0]; ?></p>
                        </div>
                        <?php if ($user['id'] == $comment['commenter']['id']): ?>
                            <button type="button" class="relative btn-floating w-10 h-10 flex items-center justify-center light-green border shadow rounded">
                                <img src="assets/icons/menu.svg" alt="menu">
                                <div class="floating-action cream border shadow rounded">
                                    <a href="deleteComment.php?id=<?= $post['post']['id'] ?>&commentId=<?= $comment['id'] ?>" class="block px-6 py-2 font-medium" onclick="return confirm('Are you sure want to delete this post?')">Delete</a>
                                </div>
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="px-6 py-4 text-justify"><?= $comment['content']; ?></div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="p-c rounded-lg shadow border capitalize text-center">No post!</div>
    <?php endif; ?>

    <script src="js/music.js"></script>
    <script src="js/script.js"></script>
</body>

</html>