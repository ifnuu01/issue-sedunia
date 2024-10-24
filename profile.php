<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Issue Sedunia</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/components.css">
</head>

<body>
    <?php
    include 'components/navbar.php';
    echo navbar();
    ?>
    <h2 class="heading text-center mb-6">Profile</h2>
    <section class="mb-6 p-c cream border rounded-lg shadow">
        <div class="flex items-center justify-between mb-2">
            <div>
                <h3 class="heading text-lg">Raana Fuyu</h3>
                <div>Raana</div>
            </div>
            <div class="avatar-lg white border shadow rounded-full"></div>
        </div>
        <div class="mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem sit numquam optio nemo perferendis odit quisquam accusantium distinctio, earum corporis. Hic, quibusdam saepe! Soluta atque magnam vero nostrum maxime nisi?</div>
        <div class="mb-6 text-sm">Joined at 2024-10-17</div>
        <a href="" class="btn px-6 py-2 flex text-center justify-center border shadow rounded-lg">Edit Profile</a>
    </section>

    <h2 class="heading text-center mb-6">Posts</h2>
    <article class="flex gap-6 mb-6">
        <div class="post-avatar-desktop avatar mt-3 white shadow border rounded-full"></div>
        <div class="w-full cream shadow border rounded-lg">
            <div class="p-c flex items-center justify-between border-b flex-wrap gap-3">
                <div class="flex items-center gap-3">
                    <div class="post-avatar-mobile avatar white shadow border rounded-full"></div>
                    <h3 class="heading">Raana</h3>
                    <p class="text-sm">2024-10-17</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <div class="px-6 py-1 font-medium border rounded shadow yellow">Front-End</div>
                    <div class="px-6 py-1 font-medium border rounded shadow red">Not Solved</div>
                    <div class="w-10 h-10 flex items-center justify-center light-green border shadow rounded">
                        <img src="assets/icons/menu.svg" alt="menu">
                    </div>
                </div>
            </div>
            <h3 class="px-6 py-4 heading">Lorem ipsum dolor sit amet</h3>
            <div class="px-6 text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil ipsam ea laudantium, vero hic praesentium molestiae quia reprehenderit accusantium. Culpa porro ullam consequatur incidunt similique necessitatibus, officia nemo mollitia autem.</div>
            <div class="p-c flex items-center gap-3 flex-wrap">
                <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded pink">
                    <img src="assets/icons/comment.svg" alt="comment">
                    <div>9</div>
                </div>
                <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded blue">
                    <img src="assets/icons/views.svg" alt="views">
                    <div>9</div>
                </div>
                <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded green">
                    <img src="assets/icons/share.svg" alt="share">
                    <div>9</div>
                </div>
            </div>
        </div>
    </article>

    <article class="flex gap-6 mb-6">
        <div class="post-avatar-desktop avatar mt-3 white shadow border rounded-full"></div>
        <div class="w-full cream shadow border rounded-lg">
            <div class="p-c flex items-center justify-between border-b flex-wrap gap-3">
                <div class="flex items-center gap-3">
                    <div class="post-avatar-mobile avatar white shadow border rounded-full"></div>
                    <h3 class="heading">Raana</h3>
                    <p class="text-sm">2024-10-17</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <div class="px-6 py-1 font-medium border rounded shadow yellow">Front-End</div>
                    <div class="px-6 py-1 font-medium border rounded shadow red">Not Solved</div>
                    <div class="w-10 h-10 flex items-center justify-center light-green border shadow rounded">
                        <img src="assets/icons/menu.svg" alt="menu">
                    </div>
                </div>
            </div>
            <h3 class="px-6 py-4 heading">Lorem ipsum dolor sit amet</h3>
            <div class="px-6 text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil ipsam ea laudantium, vero hic praesentium molestiae quia reprehenderit accusantium. Culpa porro ullam consequatur incidunt similique necessitatibus, officia nemo mollitia autem.</div>
            <div class="p-c flex items-center gap-3 flex-wrap">
                <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded pink">
                    <img src="assets/icons/comment.svg" alt="comment">
                    <div>9</div>
                </div>
                <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded blue">
                    <img src="assets/icons/views.svg" alt="views">
                    <div>9</div>
                </div>
                <div class="px-6 py-1 flex gap-1 font-medium border shadow rounded green">
                    <img src="assets/icons/share.svg" alt="share">
                    <div>9</div>
                </div>
            </div>
        </div>
    </article>
</body>

</html>