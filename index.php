<?php
include 'includes/connection.php';
include 'includes/functions.php';

session_start();

$user = $_SESSION['user'];
if (!isset($user)) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $user['id'];
    $categoryId = $_POST['category'];
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $imgFile = isset($_FILES['img']) ? $_FILES['img'] : null;

    $result = addPost($conn, $userId, $categoryId, $title, $content, $imgFile);
    echo "<script>alert('" . $result['message'] . "');</script>";
}

$allPosts = getAllPosts($conn);
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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <title>Home | Issue Sedunia</title>
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

    <article class="btn-upload-modal flex gap-6 items-center mb-6 cursor-pointer">
        <div class="avatar white shadow border rounded-full">
            <img src="https://ui-avatars.com/api/?name=<?= $user['username'] ?>" alt="Avatar">
        </div>
        <div class="w-full p-c cream shadow border rounded-full">Hi Raana! What's new?</div>
    </article>

    <dialog class="dialog cream shadow border rounded-lg">
        <div class="p-c border-b grid grid-cols-3">
            <div class="flex gap-3 items-center">
                <div class="w-5 h-5 rounded-full shadow border red"></div>
                <div class="w-5 h-5 rounded-full shadow border yellow"></div>
                <div class="w-5 h-5 rounded-full shadow border green"></div>
            </div>
            <h2 class="text-center font-bold">New Post</h2>
            <button type="button" class="cancel-post text-end font-medium">Cancel</button>
        </div>
        <div class="p-c flex gap-6">
            <div class="avatar white shadow border rounded-full">
                <img src="https://ui-avatars.com/api/?name=<?= $user['username'] ?>" alt="Avatar">
            </div>
            <form action="" class="w-full" enctype="multipart/form-data" method="POST">
                <div class="mb-6">
                    <label for="category" class="heading block mb-2">Category</label>
                    <select name="category" id="category" class="px-6 py-2 purple rounded shadow border w-full">
                        <option value="1" selected>Front-End</option>
                        <option value="2">Back-End</option>
                        <option value="3">Full-Stack</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="title" class="heading block mb-2">Title Post</label>
                    <input type="text" name="title" id="title" placeholder="Raana! What's new? (Max 50 characters!)" class="w-full blue p-c rounded-lg border shadow" required maxlength="50">
                </div>
                <div class="mb-6">
                    <label for="content" class="heading block mb-2">Description Post</label>
                    <input type="text" name="content" id="content" placeholder="What's your describe about this post" class="w-full yellow p-c rounded-lg border shadow">
                </div>
                <div class="mb-10">
                    <label for="img" class="heading block mb-2">Photo Post</label>
                    <input type="file" name="img" id="img" class="mb-6 w-full light-green p-c rounded-lg border shadow">
                    <button type="button" class="btn px-4 py-2 red rounded shadow border font-medium">Delete Photo Post</button>
                </div>
                <button type="submit" class="btn auth w-full px-6 font-bold py-2 flex text-center justify-center border shadow rounded-lg">Post</button>
            </form>
        </div>
    </dialog>

    <?php foreach ($allPosts as $post): ?>
        <article class="flex gap-6 mb-6">
            <div class="post-avatar-desktop avatar mt-3 white shadow border rounded-full">
                <img src="https://ui-avatars.com/api/?name=<?= $post['author']['username'] ?>" alt="Avatar">
            </div>
            <div class="w-full cream shadow border rounded-lg">
                <div class="p-c flex items-center justify-between border-b flex-wrap gap-3">
                    <div class="flex items-center gap-3">
                        <div class="post-avatar-mobile avatar white shadow border rounded-full">
                            <img src="https://ui-avatars.com/api/?name=<?= $post['author']['username'] ?>" alt="Avatar">
                        </div>
                        <a href="profile.php?id=<?= $post['user_id'] ?>" class="heading capitalize"><?= $post['author']['username']; ?></a>
                        <p class="text-sm"><?= explode(' ', $post['created_at'])[0]; ?></p>
                    </div>
                    <div class="flex items-center gap-3 flex-wrap">
                        <div class="capitalize px-6 py-1 font-medium border rounded shadow <?= $post['category']; ?>"><?= $post['category'] ?></div>
                        <div class="px-6 py-1 font-medium border rounded shadow <?= $post['isSolve'] ? 'green' : 'red' ?>"><?= $post['isSolve'] ? 'Solved' : 'Not Solve'; ?></div>
                        <?php if ($user['id'] == $post['user_id']): ?>
                            <div class="w-10 h-10 flex items-center justify-center light-green border shadow rounded">
                                <img src="assets/icons/menu.svg" alt="menu">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <h3 class="px-6 py-4 heading"><?= $post['title']; ?></h3>
                <div class="px-6 text-justify"><?= $post['content']; ?></div>
                <?php if ($post['photo']): ?>
                    <div class="px-6">
                        <div class="post-photo w-full rounded shadow border">
                            <img src="<?= $post['photo'] ?>" alt="Post Image">
                        </div>
                    </div>
                <?php endif ?>
                <div class="p-c flex items-center gap-3 flex-wrap">
                    <a href="post.php?id=<?= $post['id'] ?>" class="px-6 py-1 flex gap-1 font-medium border shadow rounded pink">
                        <img src="assets/icons/comment.svg" alt="comment">
                        <div><?= $post['comment_count'] ?></div>
                    </a>
                    <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded blue">
                        <img src="assets/icons/views.svg" alt="views">
                        <div><?= $post['watching_counter'] ?></div>
                    </div>
                    <button onclick="shareLink(<?= $post['id'] ?>)" class="share-btn px-6 py-1 flex gap-1 font-medium border shadow rounded green">
                        <img src="assets/icons/share.svg" alt="share">
                        <div><?= $post['watching_counter'] ?></div>
                    </button>
                </div>
            </div>
        </article>
    <?php endforeach; ?>

    <script src="js/script.js"></script>
</body>

</html>