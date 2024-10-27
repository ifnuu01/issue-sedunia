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

    <title>Edit Profile | Issue Sedunia</title>
</head>

<body>
    <?php
    include 'components/navbar.php';
    echo navbar();
    ?>
    <h2 class="heading text-center mb-6">Edit Profile</h2>
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
    </section>

    <form action="" method="POST" class="mb-6 p-c w-full cream border shadow rounded-lg" enctype="multipart/form-data">
        <div class="mb-6">
            <label for="username" class="heading block mb-2">Username</label>
            <input type="text" name="username" id="username" placeholder="Ex: fuyu" class="w-full red p-c rounded-lg border shadow">
        </div>
        <div class="mb-6">
            <label for="fullname" class="heading block mb-2">Fullname</label>
            <input type="text" name="fullname" id="fullname" placeholder="Ex: Raana Fuyu" class="w-full yellow p-c rounded-lg border shadow">
        </div>
        <div class="mb-6">
            <label for="bio" class="heading block mb-2">Bio</label>
            <textarea name="bio" id="bio" class="w-full light-green p-c rounded-lg border shadow" placeholder="Your Bio"></textarea>
        </div>
        <div class="mb-6">
            <label for="newPassword" class="heading block mb-2">New Password</label>
            <input type="password" name="newPassword" id="newPassword" placeholder="New password min 4 characters" class="w-full pink p-c rounded-lg border shadow">
        </div>
        <div class="mb-6">
            <label for="password" class="heading block mb-2">Current Password</label>
            <input type="password" name="password" id="password" placeholder="Current password min 4 characters" class="w-full blue p-c rounded-lg border shadow">
        </div>
        <div class="mb-10">
            <label for="photoProfile" class="heading block mb-2">Photo Profile</label>
            <input type="file" name="photoProfile" id="photoProfile" class="mb-6 w-full purple p-c rounded-lg border shadow">
            <button type="button" class="btn px-4 py-2 red rounded shadow border font-medium">Delete Photo Profile</button>
        </div>
        <div class="flex items-center justify-between">
            <button type="button" class="btn px-4 py-2 red rounded shadow border font-medium">Delete Account</button>
            <div class="flex items-center gap-3">
                <a href="/issue-sedunia" class="btn px-4 py-2 purple rounded shadow border font-medium">Cancel</a>
                <button type="submit" class="btn px-4 py-2 green rounded shadow border font-medium">Update Profile</button>
            </div>
        </div>
    </form>

    <script src="js/script.js"></script>
</body>

</html>